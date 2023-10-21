<?php

require_once './constants/globals.php';
require_once './autoloader.php';

use Classes\UserManagements;

$userObj = new UserManagements();
$userObj->logout();

