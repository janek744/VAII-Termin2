<?php

class Clovek
{
    private $id;
    private $meno;
    private $heslo;
    private $prihlaseny = false;

    /**
     * @return bool
     */
    public function getPrihlaseny(): bool
    {
        return $this->prihlaseny;
    }

    /**
     * @param mixed $prihlaseny
     */
    public function setPrihlaseny($prihlaseny): void
    {
        $this->prihlaseny = $prihlaseny;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMeno()
    {
        return $this->meno;
    }

    /**
     * @param mixed $meno
     */
    public function setMeno($meno): void
    {
        $this->meno = $meno;
    }

    /**
     * @return mixed
     */
    public function getHeslo()
    {
        return $this->heslo;
    }

    /**
     * @param mixed $heslo
     */
    public function setHeslo($heslo): void
    {
        $this->heslo = $heslo;
    }
}