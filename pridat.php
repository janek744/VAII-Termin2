<?php

require_once "Prispevok.php";
require_once "DBStorage.php";

$storage = new DBStorage();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES["obrazok"]) && $_FILES["obrazok"]["error"] == UPLOAD_ERR_OK) {
        if (!empty($_POST["nazov"])) {
            if (!empty($_POST["popis"])) {
                $tmp_name = $_FILES["obrazok"]["tmp_name"];
                $name = date("Y-m-d-H-i-s_") . $_FILES["obrazok"]["name"];
                $path = "Imgs/$name";
                move_uploaded_file($tmp_name, $path);

                $newPrispevok = new Prispevok();
                $newPrispevok->setObrazok($path);
                $newPrispevok->setNazov($_POST["nazov"]);
                $newPrispevok->setPopis($_POST["popis"]);
                $storage->StorePrispevok($newPrispevok);

                header('Location: /');
                exit;
            } else {
                echo "Nezadal si popis";
            }
        } else {
            echo "Nezadal si nazov";
        }
    } else {
        echo "Nezadal si obrazok";
    }
}

?>


<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <title>Stranka 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cssPridat.css" type="text/css">
</head>
<body>
<nav class="navbar navbar-expand-md">
    <div class="container-fluid">
        <a class="navbar-brand">Stranka</a>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mb-3 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Prispevky</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="pridat.php">Pridat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Prihlasenie</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<form method="post" name="pridat" enctype="multipart/form-data">
    <input type="file" name="obrazok"><br>
    <textarea id="nazov" name="nazov" placeholder="Zadajte nazov prispevku"></textarea><br>
    <textarea id="popis" name="popis" placeholder="Zadate popis k prispevku"></textarea><br>
    <input type="submit" value="odosli">
</form>

<footer class="py-3 my-4">
    <ul class="nav border-bottom">
        <li class="nav-item aaa"><a href="#" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
    </ul>
    <p class="copy">&copy; 2021 Company, Inc</p>
</footer>

</body>
</html>