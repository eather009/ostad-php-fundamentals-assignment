<?php
namespace Classes;

use Abstracts\UserAbstract;
use UserInterfaces\UserInterface;

class UserManagements extends UserAbstract implements UserInterface
{
    private string $userFile = ROOT_DIR . "/data/user-list.txt";

    public function __construct(){
        session_start();
        if($this->isLoggedIn()){
            $this->setName($_SESSION['username']);
            $this->setEmail($_SESSION['email']);
            $this->setRole($_SESSION['role']);
        }
    }

    public function isLoggedIn(){

        if(!empty($_SESSION['username'])){

            return true;
        }

        return false;
    }
    protected function checkPassword(string $password, string $hashPassword): bool
    {
        return password_verify($password, $hashPassword);
    }

    public function getUsers(){
        if($this->getRole() !== 'Admin'){
            header(LOGIN_URL['success']);
        }

        $allUsers = [];
        $fp = fopen($this->userFile, 'rb');
        while ($line = fgets($fp)) {
            $values = explode(",", $line);
            $username = trim($values[0]);
            $email = trim($values[2]);

            $allUsers[] = [
                'username' => $username,
                'email' => $email
            ];
        }
        fclose($fp);


        return $allUsers;
    }

    public function setName($name): void
    {
        $this->username = $name;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" &&
            !empty($_POST['email']) && !empty($_POST['password'])) {

            $emailPost = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $passwordPost = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

            $fp = fopen($this->userFile, 'rb');
            while ($line = fgets($fp)) {
                $values = explode(",", $line);
                $username = trim($values[0]);
                $password = trim($values[1]);
                $email = trim($values[2]);
                $role = trim($values[3]);

                if($email === $emailPost &&
                    $this->checkPassword($passwordPost, $password)) {
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $role;
                    $_SESSION['loggedIn'] = true;
                    header(LOGIN_URL['success']);
                    exit;
                }
            }
            fclose($fp);
            session_destroy();
            header(LOGIN_URL['error0']);
        }
    }

    public function logout()
    {
        session_destroy();
        header('location: index.php');
    }

    public function registerUser(){

        if ($_SERVER["REQUEST_METHOD"] === "POST" &&
            !empty($_POST['username']) && !empty($_POST['email'])  && !empty($_POST['password'])) {

            $usernamePost = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $emailPost = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $passwordPost = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            if (
                ($usernamePost === false || $usernamePost === null) ||
                ($emailPost === false || $emailPost === null) ||
                ($passwordPost === false || $passwordPost === null)
            ) {
                header(REGISTER_URL['error0']);
                exit;
            }

            $fp = fopen($this->userFile, 'ab+');

            while ($line = fgets($fp)) {
                $values = explode(",", $line);
                $username = trim($values[0]);
                $email = trim($values[2]);
                if($username === $usernamePost ||
                    $email === $emailPost){

                    header(REGISTER_URL['error1']);
                    exit;
                }
            }
            $hashPassword = $this->hashPassword($passwordPost);

            fwrite($fp, "{$usernamePost}, {$hashPassword}, {$emailPost}, User\n");
            fclose($fp);

            header(REGISTER_URL['success']);
            exit;
        }
    }
}