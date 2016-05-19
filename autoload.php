<?php
require_once 'Autoload/Autoloader.php';
require_once "Validators/ALLvalidators.php";

use Autoload\Autoloader;

$autoloader = new Autoloader(__DIR__ . DIRECTORY_SEPARATOR); // wysyłamy do autoloada główną ścieżkę

spl_autoload_register(array($autoloader, 'autoload'));

