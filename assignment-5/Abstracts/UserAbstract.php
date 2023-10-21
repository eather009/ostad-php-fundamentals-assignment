<?php
namespace Abstracts;
abstract class UserAbstract
{
    public string $username;
    public string $email;
    public string $password;

    public string $role;

    public function getName():string{

        return $this->username;
    }
    public function getEmail():string{

        return $this->email;
    }

    public function getRole():string{

        return $this->role;
    }

    protected function hashPassword(string $password):string{

        return password_hash($password,PASSWORD_BCRYPT);
    }

    abstract protected function checkPassword(string $password, string $hashPassword):bool;
}