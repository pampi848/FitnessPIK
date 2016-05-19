<?php

namespace Autoload;


class Autoloader
{
    /**
     * @var string
     */
    protected $basePath = '';

    /**
     * @param string $basePath
     */ //
    public function __construct($basePath)
    {  // przy tworzeniu obiektu __construkt przypisuje atrybut funkcji jako atrybut obiektu
        $this->basePath = $basePath;
    }

    /**
     * @param string $className
     */
    public function autoload($className)
    {
        $baseDir = $this->basePath . DIRECTORY_SEPARATOR;
        $fileName = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        if (file_exists($fileName)) {
            require $fileName;
        }
    }
}