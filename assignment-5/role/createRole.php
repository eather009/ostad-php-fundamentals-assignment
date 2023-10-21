<!DOCTYPE html>
<html lang="en">
<head>
    <title>Role Create Page</title>
</head>
<body>
<?php
require_once '../constants/globals.php';
require_once '../autoloader.php';

use Classes\UserManagements;
use Classes\RoleManagements;

$userObj = new UserManagements();
if(!$userObj->isLoggedIn() || $userObj->getRole() !== 'Admin'){
    header('location: /index.php');
}

$roleObj = new RoleManagements();

if(isset($_GET['err'])){
    echo ERROR_REGISTER[$_GET['err']];
}
?>
<form action="createRole.php" method="post">
    <label>
        <input type="text" name="rolename" placeholder="Role Name" required>
    </label>
    <button type="submit">Save</button>
</form>

</body>
</html>
