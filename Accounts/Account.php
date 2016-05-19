<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 17.05.16
 * Time: 17:28
 */

namespace Accounts;

require_once "Validators/ALLvalidators.php";
abstract class Account
{
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
    var $dzienUrodzin = '';
    var $miesiacUrodzin = '';
    var $rokUrodzin = '';
    var $dataUtworzenia = '';
    var $activated = false;
    var $level = 0;

    
    
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
    public function getDzienUrodzin()
    {
        return $this->dzienUrodzin;
    }

    /**
     * @param string $dzienUrodzin
     */
    protected function setDzienUrodzin($dzienUrodzin)
    {
        $this->dzienUrodzin = $dzienUrodzin;
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
    public function getMiesiacUrodzin()
    {
        return $this->miesiacUrodzin;
    }

    /**
     * @param string $miesiacUrodzin
     */
    protected function setMiesiacUrodzin($miesiacUrodzin)
    {
        $this->miesiacUrodzin = $miesiacUrodzin;
    }

    /**
     * @return string
     */
    public function getRokUrodzin()
    {
        return $this->rokUrodzin;
    }

    /**
     * @param string $rokUrodzin
     */
    protected function setRokUrodzin($rokUrodzin)
    {
        $this->rokUrodzin = $rokUrodzin;
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
    protected function setActivated($activated)
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
    protected function setLevel($level)
    {
        $this->level = $level;
    }
    
}