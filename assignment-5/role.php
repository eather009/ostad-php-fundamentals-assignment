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
use Classes\RoleManagements;

$userObj = new UserManagements();
if(!$userObj->isLoggedIn() || $userObj->getRole() !== 'Admin'){
    header('location: /index.php');
}
echo sprintf("Your Role is %s. Go to <a href='./index.php'>Index Page</a><hr/>",$userObj->getRole());

$roleObj = new RoleManagements();

if(!empty($roleObj->roleList)):
?>
<table>
    <thead>
    <tr>
        <th colspan="3">
            Roles
        </th>
    </tr>
    <tr>
        <th>Role</th>
        <th>Last Update</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($roleObj->roleList as $role):
    ?>
    <tr>
        <td><?php echo $role['name'] ?></td>
        <td><?php echo $role['created'] ?></td>
        <td>
            <form action="./role/editRole.php?name=<?php echo $role['name'] ?>" method="post">
                <input type="hidden" value="Edit" name="actionType">
                <button type="submit">Edit</button>
            </form>
            <form action="./role.php?name=<?php echo $role['name'] ?>" method="post">
                <input type="hidden" value="Delete" name="actionType">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>
<?php
endif;
?>
<div>
    <a href="./role/createRole.php">Create New</a>
</div>


</body>
</html>
