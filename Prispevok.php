<?php

class Prispevok
{
    private $id;
    private $nazov;
    private $obrazok;
    private $popis;

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
    public function getNazov()
    {
        return $this->nazov;
    }

    /**
     * @param mixed $nazov
     */
    public function setNazov($nazov): void
    {
        $this->nazov = $nazov;
    }

    /**
     * @return mixed
     */
    public function getObrazok()
    {
        return $this->obrazok;
    }

    /**
     * @param mixed $obrazok
     */
    public function setObrazok($obrazok): void
    {
        $this->obrazok = $obrazok;
    }

    /**
     * @return mixed
     */
    public function getPopis()
    {
        return $this->popis;
    }

    /**
     * @param mixed $popis
     */
    public function setPopis($popis): void
    {
        $this->popis = $popis;
    }

    /**
     * @return mixed
     */
    public function getPriradeny()
    {
        return $this->priradeny;
    }

    /**
     * @param mixed $priradeny
     */
    public function setPriradeny($priradeny): void
    {
        $this->priradeny = $priradeny;
    }
    private $priradeny;
}