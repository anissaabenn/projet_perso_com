<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/responsivestyle.css">
    <title>Projet perso cosmétique</title>
</head>
<body>
    <header>
        <nav>
            <a class="navbar-brand navbar-expand-lg" href="#">HOME</a>
            <ul class="navbar-nav">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" id="block1">Beauty</a>
                <div class="dropdown-menu" id="sousblock1">
                    <a class="dropdown-item" href="./view/pageProductView/lips.view.php">Lèvres</a>
                    <a class="dropdown-item" href="./view/pageProductView/eyes.view.php">Yeux</a>
                    <a class="dropdown-item" href="./view/pageProductView/face.view.php">Visage</a>
                </div>
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" id="block2">Skin</a>
                <div class="dropdown-menu" id="sousblock2">
                    <a class="dropdown-item" href="./view/pageProductView/cleaners.view.php">Nettoyants</a>
                    <a class="dropdown-item" href="./view/pageProductView/moisturizers.view.php">Crèmes</a>
                    <a class="dropdown-item" href="./view/pageProductView/serums.view.php">Sérums</a>
                </div>
            </ul>
            <div class="icone">
                <a href="#" class="fa fa-user" role="button" style="font-size:25px;"></a>
                <a href="#" class="fa fa-shopping-cart" role="button" style="font-size:25px;"></a>
            </div>
        </nav>
    </header>

    <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Recherchez un produit...">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit" id="search">Rechercher</button>
    </form>