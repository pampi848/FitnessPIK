<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 17.05.16
 * Time: 17:28
 */

namespace Accounts;

require_once "autoload.php";

use PDO;
use Util\Database;

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
    var $activationCode = '';

    public static function fetchPasswordByLogin($login)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `haslo` FROM `account` WHERE `login`=:login LIMIT 1");
            $stmt->bindValue(':login', $login, PDO::PARAM_STR);

            $stmt->execute();
            $haslo = $stmt->fetch();
            $haslo = $haslo[0];
        } catch (PDOException $exception) {
            // TODO: log database errors
            $haslo = "error";
            throw $exception;
        }

        return $haslo;
    }
    public static function fetchAllAccounts()
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT * FROM `account`");

            $stmt->execute();
            $konta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            // TODO: log database errors
            $konta = "error";
            throw $exception;
        }

        return $konta;
    }
    public static function fetchAllInstruktors()
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `id`,`imie`,`nazwisko` FROM `account` WHERE `level`=2");

            $stmt->execute();
            $konta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            // TODO: log database errors
            $konta = "error";
            throw $exception;
        }

        return $konta;
    }
    public static function fetchUczestniczacy($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT * FROM `uczestniczacy` WHERE ");// TODO:

            $stmt->execute();
            $konta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            // TODO: log database errors
            $konta = "error";
            throw $exception;
        }

        return $konta;
    }
    public static function fetchNamesById($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `imie`,`nazwisko` FROM `account` WHERE `id`=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
            $names = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            // TODO: log database errors
            $names = "error";
            throw $exception;
        }
        $names = $names['imie'].' '.$names['nazwisko'];
        return $names;
    }
    public static function ban($id,$admin = false)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("UPDATE `account` SET `activated`=0 WHERE `id`=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            if($admin == true) {
                $stmt = $pdo->prepare("UPDATE `account` SET `activationCode`='disable' WHERE `id`=:id");
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
            }
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
    }
    public static function unban($id,$code)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("UPDATE `account` SET `activated`=1 WHERE `id`=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $pdo->prepare("UPDATE `account` SET `activationCode`=:code WHERE `id`=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':code', $code, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
    }
    public static function isActivatedInDatabase($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `activated`,`activationCode` FROM `account` WHERE `id`=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $aktywne = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        return $aktywne;
    }
    public static function checkLevel($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `level` FROM `account` WHERE `id`=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $level = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        $level = $level['level'];
        return $level;
    }
    public static function changePremissions($id,$level)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("UPDATE `account` SET `level`=:lvl WHERE `id`=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':lvl', $level, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
    }
    public static function fetchIdByLogin($login)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `id` FROM `account` WHERE `login`=:login LIMIT 1");
            $stmt->bindValue(':login', $login, PDO::PARAM_STR);

            $stmt->execute();
            $id = $stmt->fetch();
            $id = $id[0];
        } catch (PDOException $exception) {
            // TODO: log database errors
            $haslo = "error";
            throw $exception;
        }
        
        return $id;
    }

    public static function fetchAccountByLoginAndPass($login, $pass)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT * FROM `account` WHERE `login`=:login AND `haslo`=:pass");
            $stmt->bindValue(':login', $login, PDO::PARAM_STR);
            $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);

            $stmt->execute();
            $konto = new User();
            $konto = $stmt->fetch(5); // zwraca obiekt

        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return $konto;
    }

    public static function fetchUserProfile($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `id`,`login`,`level`,`email`,`nrTel`,`imie`,`nazwisko`,`miejscowosc`,`ulica`,`nrDomu`,`nrMieszkania`,`kodPocztowy`,`dataUrodzin` FROM `account` WHERE `id`=:id");

            $stmt->bindValue(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            $konto = new User();
            $konto = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return $konto;
    }


    public function insertAccountIntoSQL()
    {
        try {
            $pdo = Database::getInstance()->getConnection();
            $stmt = $pdo->prepare("
            INSERT INTO `account` 
            (`login`,`haslo`,`email`,`nrTel`,`imie`,`nazwisko`,`miejscowosc`,`ulica`,`nrDomu`,`nrMieszkania`,`kodPocztowy`,`dataUrodzin`,`dataUtworzenia`,`activated`,`level`,`activationCode`) 
            VALUES
            (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
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
            $stmt->bindValue(16, $this->getActivationCode(), PDO::PARAM_STR);
            
            $stmt->execute();
        } catch (PDOException $exception) {
            // TODO: log database errors
            $haslo = "error";
            throw $exception;
        }
    }
    public function updateAccountIntoSQL($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();
            $stmt = $pdo->prepare(" UPDATE `account` SET `email`=?,`nrTel`=?,`imie`=?,`nazwisko`=?,`miejscowosc`=?,`ulica`=?,`nrDomu`=?,`nrMieszkania`=?,`kodPocztowy`=?,`dataUrodzin`=? WHERE `id`=?");
            
            $stmt->bindValue(1, $this->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->getNrTel(), PDO::PARAM_STR);
            $stmt->bindValue(3, $this->getImie(), PDO::PARAM_STR);
            $stmt->bindValue(4, $this->getNazwisko(), PDO::PARAM_STR);
            $stmt->bindValue(5, $this->getMiejscowosc(), PDO::PARAM_STR);
            $stmt->bindValue(6, $this->getUlica(), PDO::PARAM_STR);
            $stmt->bindValue(7, $this->getNrDomu(), PDO::PARAM_INT);
            $stmt->bindValue(8, $this->getNrMieszkania(), PDO::PARAM_INT);
            $stmt->bindValue(9, $this->getKodPocztowy(), PDO::PARAM_STR);
            $stmt->bindValue(10, $this->getDataUrodzin(), PDO::PARAM_STR);

            $stmt->bindValue(11, $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $exception) {
            // TODO: log database errors
            $haslo = "error";
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
    public function setHaslo($haslo)
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
    public function setLogin($login)
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
    public function setNrTel($nrTel)
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
    public function setEmail($email)
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
    public function setImie($imie)
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
    public function setNazwisko($nazwisko)
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
    public function setMiejscowosc($miejscowosc)
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
    public function setUlica($ulica)
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
    public function setNrDomu($nrDomu)
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
    public function setKodPocztowy($kodPocztowy)
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
    public function setNrMieszkania($nrMieszkania)
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
    public function setDataUtworzenia($dataUtworzenia)
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
    public function setActivated($activated = false)
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
    public function setLevel($level = 0)
    {
        $this->level = $level;
    }

    /**
     * @return string
     */
    public function getActivationCode()
    {
        return $this->activationCode;
    }

    /**
     * @param string $activationCode
     */
    public function setActivationCode($activationCode)
    {
        $this->activationCode = $activationCode;
    }

}