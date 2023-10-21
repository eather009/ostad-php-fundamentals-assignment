<?php
CONST ERROR_LOGIN = [
    0 => 'Invalid Username or Password',
    1 => 'User not exists'
];

CONST LOGIN_URL = [
    'success' => 'location: ./index.php',
    'error0' => 'location: ./login.php?err=0',
    'error1' => 'location: ./login.php?err=1'
];
CONST ERROR_REGISTER= [
    0 => 'Invalid Username or Password or Email',
    1 => 'Data already exists'
];

CONST REGISTER_URL= [
    'success' => 'location: ./login.php',
    'error0' => 'location: ./register.php?err=0',
    'error1' => 'location: ./register.php?err=1'
];


