<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 17.05.16
 * Time: 17:28
 */

namespace Accounts;
require_once "../autoload.php";
use Util\Database;
use PDO;

abstract class Account
{
    var $id = 0;
    var $login = '';
    var $haslo = '';
    var $email = '';
    var $nrTel = 0;
    var $imie = '';
    var $nazwisko = '';
    var $miejscowosc = '';
    var $ulica = '';
    var $nrDomu = 0;
    var $nrMieszkania = 0;
    var $kodPocztowy = '';
    var $dataUrodzin = '';
    var $dataUtworzenia = '';
    var $activated = false;
    var $level = 0;

    public static function fetchPasswordByLogin($login)
    {
            try {
                $pdo = Database::getInstance()->getConnection();

                $stmt = $pdo->prepare("SELECT `haslo` FROM `Account` WHERE `login`=:login LIMIT 1");
                $stmt->bindValue(':login', $login, PDO::PARAM_STR); 

                $stmt->execute();
                $haslo = $stmt->fetch();
                $haslo = $haslo[0];
            } catch (PDOException $exception) {
                // TODO: log database errors
                $haslo="error";
                throw $exception;
            }

            return $haslo;
    }
    
    public static function fetchAccountByLoginAndPass($login, $pass)
    {
            try {
                $pdo = Database::getInstance()->getConnection();

                $stmt = $pdo->prepare("SELECT * FROM `Account` WHERE `login`=:login AND `haslo`=:pass");
                $stmt->bindValue(':login', $login, PDO::PARAM_STR);       
                $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);

                $stmt->execute();
                $konto = new User;
                $konto = $stmt->fetch(5);
            } catch (PDOException $exception) {
                // TODO: log database errors
                $haslo="error";
                throw $exception;
            }

            return $konto;
    }
    
    public function insertAccountIntoSQL(){
        try{
            $pdo = Database::getInstance()->getConnection();
            $stmt = $pdo->prepare("
            INSERT INTO `Account` 
            (`login`,`haslo`,`email`,`nrTel`,`imie`,`nazwisko`,`miejscowosc`,`ulica`,`nrDomu`,`nrMieszkania`,`kodPocztowy`,`dataUrodzin`,`dataUtworzenia`,`activated`,`level`) 
            VALUES
            (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
            ");
            $stmt->bindValue(1, $this->getLogin(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->getHaslo(), PDO::PARAM_STR);
            $stmt->bindValue(3, $this->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(4, $this->getNrTel(), PDO::PARAM_STR);
            $stmt->bindValue(5, $this->getImie(), PDO::PARAM_STR);
            $stmt->bindValue(6, $this->getNazwisko(), PDO::PARAM_STR);
            $stmt->bindValue(7, $this->getMiejscowosc(), PDO::PARAM_STR);
            $stmt->bindValue(8, $this->getUlica(), PDO::PARAM_STR);
            $stmt->bindValue(9, $this->getNrDomu(), PDO::PARAM_INT);
            $stmt->bindValue(10, $this->getNrMieszkania(), PDO::PARAM_INT);
            $stmt->bindValue(11, $this->getKodPocztowy(), PDO::PARAM_STR);
            $stmt->bindValue(12, $this->getDataUrodzin(), PDO::PARAM_STR);
            $stmt->bindValue(13, $this->getDataUtworzenia(), PDO::PARAM_STR);
            $stmt->bindValue(14, $this->isActivated(), PDO::PARAM_BOOL);
            $stmt->bindValue(15, $this->getLevel(), PDO::PARAM_INT);

            $stmt->execute();
        }
        catch (PDOException $exception) {
            // TODO: log database errors
            $haslo="error";
            throw $exception;
        }
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
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getters&&Setters \\
    /**
     * @return string
     */
    public function getHaslo()
    {
        return $this->haslo;
    }

    /**
     * @param string $haslo
     */
    protected function setHaslo($haslo)
    {
        $this->haslo = $haslo;

    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    protected function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return int
     */
    public function getNrTel()
    {
        return $this->nrTel;
    }

    /**
     * @param int $nrTel
     */
    protected function setNrTel($nrTel)
    {
        $this->nrTel = $nrTel;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    protected function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * @param string $imie
     */
    protected function setImie($imie)
    {
        $this->imie = $imie;
    }

    /**
     * @return string
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * @param string $nazwisko
     */
    protected function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;
    }

    /**
     * @return string
     */
    public function getMiejscowosc()
    {
        return $this->miejscowosc;
    }

    /**
     * @param string $miejscowosc
     */
    protected function setMiejscowosc($miejscowosc)
    {
        $this->miejscowosc = $miejscowosc;
    }

    /**
     * @return string
     */
    public function getUlica()
    {
        return $this->ulica;
    }

    /**
     * @param string $ulica
     */
    protected function setUlica($ulica)
    {
        $this->ulica = $ulica;
    }

    /**
     * @return int
     */
    public function getNrDomu()
    {
        return $this->nrDomu;
    }

    /**
     * @param int $nrDomu
     */
    protected function setNrDomu($nrDomu)
    {
        $this->nrDomu = $nrDomu;
    }

    /**
     * @return string
     */
    public function getKodPocztowy()
    {
        return $this->kodPocztowy;
    }

    /**
     * @param string $kodPocztowy
     */
    protected function setKodPocztowy($kodPocztowy)
    {
        $this->kodPocztowy = $kodPocztowy;
    }

    /**
     * @return int
     */
    public function getNrMieszkania()
    {
        return $this->nrMieszkania;
    }

    /**
     * @param int $nrMieszkania
     */
    protected function setNrMieszkania($nrMieszkania)
    {
        $this->nrMieszkania = $nrMieszkania;
    }
    /**
     * @return string
     */
    public function getDataUtworzenia()
    {
        return $this->dataUtworzenia;
    }

    /**
     * @param string $dataUtworzenia
     */
    protected function setDataUtworzenia($dataUtworzenia)
    {
        $this->dataUtworzenia = $dataUtworzenia;
    }

    /**
     * @return string
     */
    public function getDataUrodzin()
    {
        return $this->dataUrodzin;
    }

    /**
     * @param string $dataUrodzin
     */
    public function setDataUrodzin($dataUrodzin)
    {
        $this->dataUrodzin = $dataUrodzin;
    }

    /**
     * @return boolean
     */
    public function isActivated()
    {
        return $this->activated;
    }

    /**
     * @param boolean $activated
     */
    protected function setActivated($activated=false)
    {
        $this->activated = $activated;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    protected function setLevel($level=0)
    {
        $this->level = $level;
    }

}