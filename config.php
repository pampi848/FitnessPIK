<?php

$this->database = [
    'user' => "root",
    'pass' => "dev",
    'host' => "localhost",
    'database' => "FitnessPIK"
];

$this->templates = [
    'dir' => 'templates'
];

$this->actions = [
    'default' => 'Actions\\ActionIndex',
    'LogIn' => 'Actions\\ActionTeamAdd'
];
