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

    public function Store(Prispevok $prispevok)
    {
        $st = $this->conn->prepare("INSERT INTO prispevky (obrazok, nazov, popis) VALUES (?,?,?)");
        $st->execute([$prispevok->getObrazok(),$prispevok->getNazov(),$prispevok->getPopis()]);
    }
}