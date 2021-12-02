<?php

class DBStorage
{
    /**
     * @var PDO
     */
    private $conn;
    private $hlaska = "";

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

    public function removePrispevok($id)
    {
        $st = $this->conn->prepare("DELETE FROM prispevky WHERE id = ?");
        $st->execute([intval($id)]);
    }

    public function skontrolujUzivatela(Clovek $clovek)
    {

        $stmt = $this->conn->prepare('SELECT * FROM ludia WHERE meno = ?');
        $stmt->execute([$clovek->getMeno()]);
        $result = $stmt->rowCount();

        if($result > 0) {
            $stmt = $this->conn->prepare('SELECT * FROM ludia WHERE heslo = ?');
            $stmt->execute([$clovek->getHeslo()]);
            $result = $stmt->rowCount();

            if($result > 0) {
                $this->hlaska = "Uzivatel bol prihlaseny";
                $clovek->setPrihlaseny(true);
            } else {
                $this->hlaska = "Zadane zle heslo";
            }
        } else {
            $this->hlaska = "Uzivatel bol zaregistrovany";
            $this->StoreClovek($clovek);
        }
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
        return $st->fetchAll(PDO::FETCH_CLASS, Clovek::class);
    }

    /**
     * @return string
     */
    public function getHlaska(): string
    {
        return $this->hlaska;
    }
}