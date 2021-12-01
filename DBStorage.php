<?php

class DBStorage
{
    /**
     * @var PDO
     */
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=prispevok","root", "dtb456");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function StorePrispevok(Prispevok $prispevok)
    {
        $st = $this->conn->prepare("INSERT INTO prispevky (obrazok, nazov, popis) VALUES (?,?,?)");
        $st->execute([$prispevok->getObrazok(),$prispevok->getNazov(),$prispevok->getPopis()]);
    }

    public function StoreClovek(Clovek $clovek)
    {
        $st = $this->conn->prepare("INSERT INTO ludia (meno, heslo) VALUES (?,?)");
        $st->execute([$clovek->getMeno(),$clovek->getHeslo()]);
    }

    /**
     *
     * @return Prispevok[]
     */
    public function getVsetkyPrispevky() {
        $st = $this->conn->prepare("SELECT * FROM prispevky");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_CLASS, Prispevok::class);
    }

    /**
     *
     * @return Clovek[]
     */
    public function getVsetkychLudi() {
        $st = $this->conn->prepare("SELECT * FROM ludia");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_CLASS, Prispevok::class);
    }
}