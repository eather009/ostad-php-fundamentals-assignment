<?php

require_once './constants/globals.php';
require_once './autoloader.php';

use Classes\UserManagements;

$userObj = new UserManagements();

if ($userObj->isLoggedIn()) {
    echo sprintf("Welcome Mr %s. <a href='logout.php'>Logout</a>", $userObj->getName());

    if ($userObj->getRole() === 'Admin') {
        echo "<br/><a href='./role.php'>Manage Role</a><hr/>";

        $allUsers= $userObj->getUsers();
        if (!empty($allUsers)):
            ?>
            <table>
                <thead>
                <tr>
                    <th colspan="2">
                        Users
                    </th>
                </tr>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($allUsers as $user):
                    ?>
                    <tr>
                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        <?php
        endif;
    }
} else {
    echo 'Please login from <a href="login.php" >here</a>';
}
