<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 17.05.16
 * Time: 17:28
 */

namespace Accounts;


abstract class Account
{
    var $login = '';
    var $haslo = '';
    var $email = '';
    var $nrTel = 0;
    var $imie = '';
    var $nazwisko = '';
    var $miejscowosc = '';
    var $NrDomu = 0;
    var $NrMieszkania = 0;
    var $kodPocztowy = '';
    var $dataUrodzenia = '';
    var $dataUtworzenia = '';

    
    
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
     * @return int
     */
    public function getNrDomu()
    {
        return $this->NrDomu;
    }

    /**
     * @param int $NrDomu
     */
    public function setNrDomu($NrDomu)
    {
        $this->NrDomu = $NrDomu;
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
        return $this->NrMieszkania;
    }

    /**
     * @param int $NrMieszkania
     */
    public function setNrMieszkania($NrMieszkania)
    {
        $this->NrMieszkania = $NrMieszkania;
    }

    /**
     * @return string
     */
    public function getDataUrodzenia()
    {
        return $this->dataUrodzenia;
    }

    /**
     * @param string $dataUrodzenia
     */
    public function setDataUrodzenia($dataUrodzenia)
    {
        $this->dataUrodzenia = $dataUrodzenia;
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
}