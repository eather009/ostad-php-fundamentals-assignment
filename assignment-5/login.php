<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
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
$userObj->login();

if(isset($_GET['err'])){
    echo ERROR_LOGIN[$_GET['err']];
}

?>
<form action="login.php" method="post">
    <label>
        <input type="email" name="email" placeholder="Email" required>
    </label>
    <label>
        <input type="password" name="password" placeholder="Password" required>
    </label>
    <button type="submit">Log In</button>
</form>
Sign Up from <a href="register.php">here</a>


</body>
</html>
