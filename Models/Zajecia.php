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
    var $data = []; // dzien, godzina, sala
    var $cena = 0;
    var $promocja = 0;
    var $obecnosc = 0;

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
                $stmt = $pdo->prepare("SELECT `dzien`,`godzina`,`sala` FROM `terminarz` WHERE `id_zajecia`=:id");
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
        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return $zajecia;
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
     * @param int $cena
     */
    public function setCena($cena)
    {
        $this->cena = $cena;
    }

    /**
     * @return int
     */
    public function getPromocja()
    {
        return $this->promocja;
    }

    /**
     * @param int $promocja
     */
    public function setPromocja($promocja)
    {
        $this->promocja = $promocja;
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
     * Zajecia constructor.
     * @param int $id
     * @param int $obecnosc
     * @param int $promocja
     * @param int $cena
     * @param array $data
     * @param int $idInstruktor
     * @param string $opis
     * @param string $nazwa
     */
    public function __construct($id, $obecnosc, $promocja, $cena, array $data, $idInstruktor, $opis, $nazwa)
    {
        $this->id = $id;
        $this->obecnosc = $obecnosc;
        $this->promocja = $promocja;
        $this->cena = $cena;
        $this->data = $data;
        $this->idInstruktor = $idInstruktor;
        $this->opis = $opis;
        $this->nazwa = $nazwa;
    }

}