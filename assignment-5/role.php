<!DOCTYPE html>
<html lang="en">
<head>
    <title>Role Page</title>
</head>
<body>

<?php
require_once './constants/globals.php';
require_once './autoloader.php';
use Classes\UserManagements;

$userObj = new UserManagements();
if(!$userObj->isLoggedIn() || $userObj->getRole() !== 'Admin'){
    header('location: index.php');
}
echo $userObj->getRole();


?>


</body>
</html>
