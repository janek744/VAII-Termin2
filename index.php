<?php

require "Prispevok.php";

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
    <link rel="stylesheet" href="cssIndex.css" type="text/css">
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
                        <a class="nav-link" aria-current="page" href="index.php">Prispevky</a>
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
