<?php

namespace Classes;

class RoleManagements
{
    private string $roleFile =  ROOT_DIR ."/data/role-list.txt";
    public array $roleList = [];
    public function __construct(){

        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $allRoles = [];
            $fp = fopen($this->roleFile, 'rb');
            while ($line = fgets($fp)) {
                $values = explode(",", $line);
                $roleName = trim($values[0]);
                $roleCreatedAt = trim($values[1]);

                $allRoles[] = [
                    'name' => $roleName,
                    'created' => date('Y-m-d H:iA', strtotime($roleCreatedAt))
                ];
            }
            fclose($fp);

            $this->roleList = $allRoles;
        }

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $roleNamePost = filter_input(INPUT_POST, 'rolename', FILTER_SANITIZE_SPECIAL_CHARS);
            if(empty($_GET['name'])) {
                $fp = fopen($this->roleFile, 'ab+');

                while ($line = fgets($fp)) {
                    $values = explode(",", $line);
                    $roleName = trim($values[0]);
                    if ($roleName === $roleNamePost) {

                        header('location: /role/createRole.php?err=1', true);
                        exit;
                    }
                }
                $createdDate = date('Y-m-d H:i:s');
                fwrite($fp, "{$roleNamePost}, {$createdDate}\n");
                fclose($fp);
                header('location: /role.php');
                exit;
            }elseif(!empty($_POST['actionType'])){
                $roleNameGet = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
                $actionType = filter_input(INPUT_POST, 'actionType', FILTER_SANITIZE_SPECIAL_CHARS);

                if($actionType === 'Edit'){

                    $this->editRole($roleNamePost,$roleNameGet);
                }else if($actionType === 'Delete'){

                    $this->deleteRole($roleNameGet);
                }
            }
        }
    }

    protected function deleteRole($getRole){
        $tempFile = tempnam(sys_get_temp_dir(), 'temp_file');
        $fp = fopen($this->roleFile, 'r+');
        while ($line = fgets($fp)) {
            $values = explode(",", $line);
            $roleName = trim($values[0]);
            if ($roleName !== $getRole) {
                echo $roleName . ' ' . $getRole . PHP_EOL;
                file_put_contents($tempFile, $line, FILE_APPEND);
            }
        }
        fclose($fp);

        rename($tempFile, $this->roleFile);

        header('location: /role.php');
    }

    protected function editRole($role,$getRole){
        if($role !== $getRole && !empty($role)){
            $tempFile = tempnam(sys_get_temp_dir(), 'temp_file');
            $createdDate = date('Y-m-d H:i:s');
            $fp = fopen($this->roleFile, 'r+');
            while ($line = fgets($fp)) {
                $values = explode(",", $line);
                $roleName = trim($values[0]);
                if ($roleName === $getRole) {
                    $values[0] = $role;
                    $values[1] = $createdDate;
                    $modifiedLine = implode(",", $values);
                    file_put_contents($tempFile, $modifiedLine . PHP_EOL, FILE_APPEND);
                }else{
                    file_put_contents($tempFile, $line, FILE_APPEND);
                }
            }
            fclose($fp);
            rename($tempFile, $this->roleFile);

            header('location: /role.php');
        }

    }
}