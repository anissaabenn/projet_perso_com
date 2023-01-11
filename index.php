<?php 

require_once "controller/ProductController.php";
$productController = new ProductController();

if (empty($_GET['page'])) {
    $productController->displayFavProducts();
}else{
    switch($_GET['page']){
        case "accueil" : $productController->displayFavProducts();
        break;
        case "lips" : $productController->displayProductsByCategory('lips', 'view/pageProductView/lips.view.php');
        break;
        case "eyes" : $productController->displayProductsByCategory('eyes', 'view/pageProductView/eyes.view.php');
        break;
        case "face" : $productController->displayProductsByCategory('face', 'view/pageProductView/face.view.php');
        break;
        case "cleaners" : $productController->displayProductsByCategory('cleaners', 'view/pageProductView/cleaners.view.php');
        break;
        case "moisturizers" : $productController->displayProductsByCategory('moisturizers', 'view/pageProductView/moisturizers.view.php');
        break;
        case "serums" : $productController->displayProductsByCategory('serums', 'view/pageProductView/serums.view.php');
        break;
    }
}