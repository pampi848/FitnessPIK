<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 05.06.16
 * Time: 02:26
 */

namespace Models;

require_once "autoload.php";

use PDO;
use Util\Database;

class News
{
    var $id = 0;
    var $autor = '';
    var $idAutora = '';
    var $title = '';
    var $content = '';
    var $category = '';
    var $date = '';
    var $img = '';
    var $description = '';

    static public function create($img, $category, $content, $title, $autor, $description, $idAutora){
        $checker = '';
        $checker .= (isset($category) && mb_strlen($category) <= 255 && ($category=='Informacja' || $category=='Ogłoszenie' || $category=='Oferta')) ? '' : 'Niewybrano kategorii!<br/>';
        $checker .= (isset($content) && mb_strlen($content) <= 65535 )? '' : 'Zła treść<br/>';
        $checker .= (isset($title) && mb_strlen($title) <= 255 )? '' : 'Zły tytuł!<br/>';
        $checker .= (isset($autor) && mb_strlen($autor) <= 255 )? '' : 'Zła nazwa autora!<br/>';
        $checker .= (isset($description) && mb_strlen($description) <= 255 )? '' : 'Zły opis!<br/>';
        $checker .= (isset($img)) ? '' : 'Niezaładowano pliku!<br/>';
    
        if (empty($checker)) {
            $img = addslashes($img);
            $category = addslashes($category);
            $content = addslashes($content);
            $title = addslashes($title);
            $autor = addslashes($autor);
            $description = addslashes($description);
            $date = date("Y-m-d H:i:s");

            return new self($img, $content, $date, $autor, $idAutora, $title, $category, $description);
        } else {
            $checker .= 'Spróbuj ponownie.';
            return $checker;
        }
    }
    public function insertIntoDatabase(){
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("
            INSERT INTO `newsy` 
            (`naglowek`,`kategoria`, `opis`,`autor`,`zawartosc`,`data_utworzenia`,`img`,`id_account`) 
            VALUES
            (?,?,?,?,?,?,?,?)
            ");
            $stmt->bindValue(1, $this->getTitle(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->getCategory(), PDO::PARAM_STR);
            $stmt->bindValue(3, $this->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(4, $this->getAutor(), PDO::PARAM_STR);
            $stmt->bindValue(5, $this->getContent(), PDO::PARAM_STR);
            $stmt->bindValue(6, $this->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(7, $this->getImg(), PDO::PARAM_STR);
            $stmt->bindValue(8, $this->getIdAutora(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
    }

    public static function fetchAllNews()
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `kategoria`,`opis`,`naglowek`,`id`,`data_utworzenia` FROM `newsy` ORDER BY `data_utworzenia` DESC LIMIT 20");

            $stmt->execute();
            $newsy = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return $newsy;
    }
    public static function fetchNewsToGallery()
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `opis`,`naglowek`,`id`,`data_utworzenia`, `img` FROM `newsy` ORDER BY `data_utworzenia` ASC LIMIT 4");

            $stmt->execute();
            $newsy = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return $newsy;
    }

    public static function fetchNewsById($id){
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT * FROM `newsy` WHERE `id`=?");

            $stmt->bindValue(1, $id, PDO::PARAM_INT);

            $stmt->execute();
            $newsy = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return $newsy;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    private function setId($id)
    {
        $this->id = $id;
    }



    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    private function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    private function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    private function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    private function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param string $autor
     */
    private function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return string
     */
    public function getIdAutora()
    {
        return $this->idAutora;
    }

    /**
     * @param string $idAutora
     */
    public function setIdAutora($idAutora)
    {
        $this->idAutora = $idAutora;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * News constructor.
     * @param int $id
     * @param string $imgType
     * @param int $imgSize
     * @param string $imgName
     * @param string $imgBlob
     * @param string $content
     * @param string $date
     * @param string $autor
     * @param string $idAutora
     * @param string $title
     * @param string $category
     */
    public function __construct($img, $content, $date, $autor, $idAutora, $title, $category, $description)
    {
        $this->img = $img;
        $this->content = $content;
        $this->date = $date;
        $this->autor = $autor;
        $this->idAutora = $idAutora;
        $this->title = $title;
        $this->category = $category;
        $this->description = $description;
    }
}