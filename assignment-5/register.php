<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Page</title>
</head>
<body>
<?php
require_once './constants/globals.php';
require_once './autoloader.php';

use Classes\UserManagements;

$userObj = new UserManagements();
if($userObj->isLoggedIn()){
    header('location: index.php');
}
$userObj->registerUser();

if(isset($_GET['err'])){
    echo ERROR_REGISTER[$_GET['err']];
}
?>
<form action="register.php" method="post">
    <label>
        <input type="text" name="username" placeholder="Username" required>
    </label>
    <label>
        <input type="email" name="email" placeholder="Email" required>
    </label>
    <label>
        <input type="password" name="password" placeholder="Password" required>
    </label>
    <button type="submit">Register</button>
</form>

</body>
</html>
