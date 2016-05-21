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
    'default' => 'Knightlik\\Knightlik\\Controller\\ActionIndex',
    'addTeam' => 'Knightlik\\Knightlik\\Controller\\ActionTeamAdd',
    'showTeam' => 'Knightlik\\Knightlik\\Controller\\ActionTeamShow',
    'addTournament' => 'Knightlik\\Knightlik\\Controller\\ActionTournamentAdd',
    'listTournament' => 'Knightlik\\Knightlik\\Controller\\ActionTournamentList',
    'treeTournament' => 'Knightlik\\Knightlik\\Controller\\ActionTournamentTree',
    'teamTournament' => 'Knightlik\\Knightlik\\Controller\\ActionTeamTournament'

];
