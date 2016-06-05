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
    var $imgBlob = '';
    var $imgName = '';
    var $imgSize = 0;
    var $imgType = '';
    var $description = '';

    static public function create($imgType, $imgSize, $imgBlob, $category, $content, $title, $autor, $description, $idAutora){
        $checker = '';
        $checker .= (isset($category) && mb_strlen($category) <= 255 && ($category=='Informacja' || $category=='Ogłoszenie' || $category=='Oferta')) ? '' : 'Niewybrano kategorii!<br/>';
        $checker .= (isset($content) && mb_strlen($content) <= 65535 )? '' : 'Zła treść<br/>';
        $checker .= (isset($title) && mb_strlen($title) <= 255 )? '' : 'Zły tytuł!<br/>';
        $checker .= (isset($autor) && mb_strlen($autor) <= 255 )? '' : 'Zła nazwa autora!<br/>';
        $checker .= (isset($description) && mb_strlen($description) <= 255 )? '' : 'Zły opis!<br/>';
        $checker .= (isset($imgBlob)) ? '' : 'Niezaładowano pliku!<br/>';
        if(isset($imgBlob)) {
            $checker .= (isset($imgType) && ($imgType == 'image/jpeg' || $imgType == 'image/png' || $imgType == 'image/bmp')) ? '' : 'Zły format pliku!<br/>';
            $checker .= (isset($imgSize) && $imgSize <= 8388608) ? '' : 'Przekroczono maksymalny rozmiar pliku!<br/>'; // podane w Bajtach.
        }

        if (empty($checker)) {
            $imgBlob = addslashes($imgBlob);
            $imgType = addslashes($imgType);
            $imgSize = addslashes($imgSize);
            $imgName = "img".time();
            $category = addslashes($category);
            $content = addslashes($content);
            $title = addslashes($title);
            $autor = addslashes($autor);
            $description = addslashes($description);
            $date = date("Y-m-d H:i:s");

            return new self($imgType, $imgSize, $imgName, $imgBlob, $content, $date, $autor, $idAutora, $title, $category, $description);
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
            (`naglowek`,`kategoria`, `opis`,`autor`,`zawartosc`,`data_utworzenia`,`img_blob`,`img_name`,`img_size`,`img_type`,`id_account`) 
            VALUES
            (?,?,?,?,?,?,?,?,?,?,?)
            ");
            $stmt->bindValue(1, $this->getTitle(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->getCategory(), PDO::PARAM_STR);
            $stmt->bindValue(3, $this->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(4, $this->getAutor(), PDO::PARAM_STR);
            $stmt->bindValue(5, $this->getContent(), PDO::PARAM_STR);
            $stmt->bindValue(6, $this->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(7, $this->getImgBlob(), PDO::PARAM_LOB);
            $stmt->bindValue(8, $this->getImgName(), PDO::PARAM_STR);
            $stmt->bindValue(9, $this->getImgSize(), PDO::PARAM_INT);
            $stmt->bindValue(10, $this->getImgType(), PDO::PARAM_STR);
            $stmt->bindValue(11, $this->getIdAutora(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $exception) {
            // TODO: log database errors
            $haslo = "error";
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
            $haslo = "error";
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
    public function getImgType()
    {
        return $this->imgType;
    }

    /**
     * @param string $imgType
     */
    private function setImgType($imgType)
    {
        $this->imgType = $imgType;
    }

    /**
     * @return int
     */
    public function getImgSize()
    {
        return $this->imgSize;
    }

    /**
     * @param int $imgSize
     */
    private function setImgSize($imgSize)
    {
        $this->imgSize = $imgSize;
    }

    /**
     * @return string
     */
    public function getImgName()
    {
        return $this->imgName;
    }

    /**
     * @param string $imgName
     */
    private function setImgName($imgName)
    {
        $this->imgName = $imgName;
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
    public function getImgBlob()
    {
        return $this->imgBlob;
    }

    /**
     * @param string $imgBlob
     */
    private function setImgBlob($imgBlob)
    {
        $this->imgBlob = $imgBlob;
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
    public function __construct($imgType, $imgSize, $imgName, $imgBlob, $content, $date, $autor, $idAutora, $title, $category, $description)
    {
        $this->imgType = $imgType;
        $this->imgSize = $imgSize;
        $this->imgName = $imgName;
        $this->imgBlob = $imgBlob;
        $this->content = $content;
        $this->date = $date;
        $this->autor = $autor;
        $this->idAutora = $idAutora;
        $this->title = $title;
        $this->category = $category;
        $this->description = $description;
    }
}