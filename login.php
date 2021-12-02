<?php

require_once "Clovek.php";
require_once "Sklad.php";

global $storage;
$hlaska = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST["meno"])) {
        if (preg_match('@^(?:://)?([^/]+)@', $_POST["meno"])) {
            if (!empty($_POST["heslo"])) {
                $newClovek = new Clovek();
                $newClovek->setMeno($_POST["meno"]);
                $newClovek->setHeslo($_POST["heslo"]);
                $storage->skontrolujUzivatela($newClovek);
            } else {
                $hlaska = "Nezadane heslo";
            }
        } else {
            $hlaska = "Boli zadane nepovolene znaky v mene";
        }
    } else {
        $hlaska = "Nezadane meno";
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
    <link rel="stylesheet" href="cssLogin.css" type="text/css">
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
                    <a class="nav-link" href="pridat.php">Pridat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Prihlasenie</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<form method="post" name="pridat" enctype="multipart/form-data">
    <div class="prihlasenie">
        <input type="text" id="pwd" name="meno"><br>
        <input type="password" id="pwd" name="heslo"><br><br>
        <input type="submit" value="prihlasit">
    </div>
</form>

<p class="odstavec"><?php echo $hlaska;?></p>
<p class="odstavec"><?php echo $storage->getHlaska();?></p>


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