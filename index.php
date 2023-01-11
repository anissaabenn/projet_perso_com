<?php 

require_once "controller/ProductController.php";
$productController = new ProductController();

if (empty($_GET['page'])) {
    $productController->displayFavProducts();
}else{
    switch($_GET['page']){
        case "accueil" : $productController->displayFavProducts();
        break;
        case "lips" : require_once "view/pageProductView/lips.view.php";
        break;
        case "eyes" : require_once "view/pageProductView/eyes.view.php";
        break;
        case "face" : require_once "view/pageProductView/face.view.php";
        break;
        case "cleaners" : require_once "view/pageProductView/cleaners.view.php";
        break;
        case "moisturizers" : require_once "view/pageProductView/moisturizers.view.php";
        break;
        case "serums" : require_once "view/pageProductView/serums.view.php";
        break;
    }
}