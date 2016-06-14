<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 04.06.16
 * Time: 14:35
 */

namespace Models;

require_once "autoload.php";

use PDO;
use Util\Database;

class Zajecia
{
    var $id = 0;
    var $nazwa = '';
    var $opis = '';
    var $idInstruktor = 0;
    var $wynagrodzenieInstruktora = 0;
    var $data = []; // dzien, godzina, sala
    var $cena = [];

    public static function fetchZajeciaByIdAccount($idAccount){
        try {
            $tablicaZajec = [];

            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `id_zajecia`,`id_account`,`obecnosc` FROM `uczeszczajacy` WHERE `id_account`=:idAccount");
            $stmt->bindValue(':idAccount', $idAccount, PDO::PARAM_INT);

            $stmt->execute();
            $zajecia = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $i=0;
            foreach ($zajecia as $zajecie){
                $i++;

                //Dociągnięcie danych z innych tabel

                //zajecia
                $stmt = $pdo->prepare("SELECT `nazwa_zajec`,`id_instruktor`,`opis` FROM `zajecia` WHERE `id`=:id");
                $stmt->bindValue(':id', $zajecie['id_zajecia'], PDO::PARAM_INT);

                $stmt->execute();
                $pobraneDane = $stmt->fetch(PDO::FETCH_ASSOC);
                $zajecie = is_array($pobraneDane) ? array_merge($zajecie,$pobraneDane) : array_merge($zajecie,['nazwa_zajec'=>'','id_instruktor'=>0,'opis'=>'']);

                //terminarz
                $stmt = $pdo->prepare("SELECT `dzienTygodnia`,`godzina`,`sala` FROM `terminarz` WHERE `id_zajecia`=:id");
                $stmt->bindValue(':id', $zajecie['id_zajecia'], PDO::PARAM_INT);

                $stmt->execute();
                $pobraneDane = $stmt->fetch(PDO::FETCH_ASSOC);
                $zajecie['data'] = is_array($pobraneDane) ? $pobraneDane : ['dzien'=>'Brak terminów!','godzina'=>'','sala'=>''];

                //cennik
                $stmt = $pdo->prepare("SELECT `cena`,`promocja` FROM `cennik` WHERE `id_zajecia`=:id");
                $stmt->bindValue(':id', $zajecie['id_zajecia'], PDO::PARAM_INT);

                $stmt->execute();
                $pobraneDane = $stmt->fetch(PDO::FETCH_ASSOC);
                $zajecie = is_array($pobraneDane) ? array_merge($zajecie,$pobraneDane) : array_merge($zajecie,['cena'=>0,'promocja'=>0]);


                //Tworzenie obiektów w tablicy
                $tablicaZajec[$i] = new self((int)$zajecie['id_zajecia'],(int)$zajecie['obecnosc'],(float)$zajecie['promocja'],(float)$zajecie['cena'],(array)$zajecie['data'],(int)$zajecie['id_instruktor'],(string)$zajecie['opis'],(string)$zajecie['nazwa_zajec']);

            }
        } catch (PDOException $exception) {
            // TODO: log database errors
            $haslo = "error";
            throw $exception;
        }

        return $tablicaZajec;
    }

    public static function conductedLessons($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT * FROM `zajecia` WHERE `id_instruktor`=:id");

            $stmt->bindValue(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            $zajecia = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $i = 0;
            foreach ($zajecia as $zajecie) {
                $zajecia[$i]['data'] = self::fetchDateByIdZajecia($zajecia[$i]['id']);
                $j = 0;
                foreach ($zajecia[$i]['data'] as $data) {
                    $frekwencja = self::fetchFrequency($zajecia[$i]['data'][$j]['id']);
                    $zajecia[$i]['data'][$j]['obecnych'] = $frekwencja['obecnych'];
                    $zajecia[$i]['data'][$j]['wszystkich'] = $frekwencja['wszystkich'];
                    $j++;
                }
                unset($j);
                $i++;
            }
            unset($i);
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        return $zajecia;
    }
    public static function fetchAllZajecia()
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT * FROM `zajecia`");

            $stmt->execute();
            $zajecia = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $zajeciaObiekty = [];
            $zajeciaObiekty = &$zajeciaO;
            foreach ($zajecia as $zajecie) {
                $zajeciaO[$zajecie['id']] = new self();
                $zajeciaO[$zajecie['id']]->setId($zajecie['id']);
                $zajeciaO[$zajecie['id']]->setNazwa($zajecie['nazwa_zajec']);
                $zajeciaO[$zajecie['id']]->setIdInstruktor($zajecie['id_instruktor']);
                $zajeciaO[$zajecie['id']]->setOpis($zajecie['opis']);
                $zajeciaO[$zajecie['id']]->setWynagrodzenieInstruktora($zajecie['wynagrodzenie_miesieczne']);
                $zajeciaO[$zajecie['id']]->setData(self::fetchDateByIdZajecia($zajecie['id']));
                $zajeciaO[$zajecie['id']]->setCena(self::fetchCennikByIdZajecia($zajecie['id']));
            }
            unset($zajecia);
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        return $zajeciaObiekty;
    }
    public static function fetchDateByIdZajecia($idZajec)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `id`,`dzienTygodnia`,`godzina`,`sala` FROM `terminarz` WHERE `id_zajecia`=:zajecia");
            $stmt->bindValue(':zajecia', $idZajec, PDO::PARAM_STR);

            $stmt->execute();
            $terminarz = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return $terminarz;
    }
    public static function fetchCennikByIdZajecia($idZajec)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `cena`,`promocja` FROM `cennik` WHERE `id_zajecia`=:zajecia");
            $stmt->bindValue(':zajecia', $idZajec, PDO::PARAM_STR);

            $stmt->execute();
            $cena = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        return $cena;
    }

    public function pushNewZajeciaToDB()
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("INSERT INTO `zajecia` (`nazwa_zajec`,`id_instruktor`,`opis`,`wynagrodzenie_miesieczne`) VALUES (?,?,?,?);");
            $stmt->bindValue(1, $this->getNazwa(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->getIdInstruktor(), PDO::PARAM_STR);
            $stmt->bindValue(3, $this->getOpis(), PDO::PARAM_STR);
            $stmt->bindValue(4, $this->getWynagrodzenieInstruktora(), PDO::PARAM_STR);

            $stmt->execute();

            $lastId = $pdo->lastInsertId();
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        return $lastId;
    }
    public function pushNewTerminToDB()
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("INSERT INTO `terminarz` (`id_zajecia`,`godzina`,`sala`,`dzienTygodnia`) VALUES (?,?,?,?);");
            $stmt->bindValue(1, $this->getId(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->getData()['godzina'], PDO::PARAM_STR);
            $stmt->bindValue(3, $this->getData()['sala'], PDO::PARAM_STR);
            $stmt->bindValue(4, $this->getData()['dzienTygodnia'], PDO::PARAM_STR);

            $stmt->execute();

            $lastId = $pdo->lastInsertId();
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        return $lastId;
    }
    public static function delZajeciaFromDB($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("DELETE FROM `zajecia` WHERE `id`=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $lastId = $pdo->lastInsertId();
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        return $lastId;
    }
    public static function delCennikFromDB($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("DELETE FROM `cennik` WHERE `id_zajecia`=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $lastId = $pdo->lastInsertId();
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        return $lastId;
    }
    public static function delTerminarzFromDB($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("DELETE FROM `terminarz` WHERE `id_zajecia`=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $lastId = $pdo->lastInsertId();
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        return $lastId;
    }
    public static function delTerminarzFromDBByOwnId($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("DELETE FROM `terminarz` WHERE `id`=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $lastId = $pdo->lastInsertId();
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        return $lastId;
    }
    public function pushNewCennikToDB($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("INSERT INTO `cennik` (`id_zajecia`,`cena`,`promocja`) VALUES (?,?,?);");
            $stmt->bindValue(1, $id, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->getCena()['cena'], PDO::PARAM_STR);
            $stmt->bindValue(3, $this->getCena()['promocja'], PDO::PARAM_STR);

            $stmt->execute();

            $lastId = $pdo->lastInsertId();
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }
        return $lastId;
    }

    public static function fetchFrequency($id)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT COUNT(`id_account`) FROM `uczeszczajacy` WHERE `id_terminarz`=:id");

            $stmt->bindValue(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            $wszystkich = $stmt->fetch(PDO::FETCH_NUM);
            $wszystkich=$wszystkich[0];

            $stmt = $pdo->prepare("SELECT SUM(`obecnosc`) FROM `uczeszczajacy` WHERE `id_terminarz`=:id");

            $stmt->bindValue(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            $obecnych = $stmt->fetch(PDO::FETCH_NUM);
            $obecnych=$obecnych[0];
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return ['obecnych' => $obecnych, 'wszystkich' => $wszystkich];
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

    /**
     * @return string
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * @param string $nazwa
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;
    }

    /**
     * @return string
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * @param string $opis
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;
    }

    /**
     * @return int
     */
    public function getIdInstruktor()
    {
        return $this->idInstruktor;
    }

    /**
     * @param int $idInstruktor
     */
    public function setIdInstruktor($idInstruktor)
    {
        $this->idInstruktor = $idInstruktor;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * @param array $cena
     */
    public function setCena($cena)
    {
        $this->cena = $cena;
    }

    /**
     * @return int
     */
    public function getObecnosc()
    {
        return $this->obecnosc;
    }

    /**
     * @param int $obecnosc
     */
    public function setObecnosc($obecnosc)
    {
        $this->obecnosc = $obecnosc;
    }
    /**
     * @return int
     */
    public function getWynagrodzenieInstruktora()
    {
        return $this->wynagrodzenieInstruktora;
    }

    /**
     * @param int $wynagrodzenieInstruktora
     */
    public function setWynagrodzenieInstruktora($wynagrodzenieInstruktora)
    {
        $this->wynagrodzenieInstruktora = $wynagrodzenieInstruktora;
    }


    /**
     * Zajecia constructor.
     * @param int $id
     * @param array $cena
     * @param array $data
     * @param int $idInstruktor
     * @param string $opis
     * @param string $nazwa
     */
    public function __construct($id = 0, array $cena = [0,0], array $data = [0,0,0], $idInstruktor = 0, $opis = '', $nazwa = '')
    {
        $this->id = $id;
        $this->cena = $cena;
        $this->data = $data;
        $this->idInstruktor = $idInstruktor;
        $this->opis = $opis;
        $this->nazwa = $nazwa;
    }

}