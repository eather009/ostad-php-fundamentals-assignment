<?php

namespace UserInterfaces;

interface UserInterface
{
    public function setName($name): void;

    public function setEmail($email): void;

    public function setRole($role): void;

    public function login();

    public function logout();

    public function registerUser();
}