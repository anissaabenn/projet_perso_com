<?php
session_start();
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

require_once "controller/ProductController.php";
$productController = new ProductController();

require_once "controller/UserController.php";
$userController = new UserController();

if (empty($_GET['page'])) {
    $productController->displayFavProducts();
} else {
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    switch ($url[0]) {
        case "accueil":
            $productController->displayFavProducts();
            break;
        case "lips":
            $productController->displayProductsByCategory('lips', 'view/pageProductView/lips.view.php');
            break;
        case "eyes":
            $productController->displayProductsByCategory('eyes', 'view/pageProductView/eyes.view.php');
            break;
        case "face":
            $productController->displayProductsByCategory('face', 'view/pageProductView/face.view.php');
            break;
        case "cleaners":
            $productController->displayProductsByCategory('cleaners', 'view/pageProductView/cleaners.view.php');
            break;
        case "moisturizers":
            $productController->displayProductsByCategory('moisturizers', 'view/pageProductView/moisturizers.view.php');
            break;
        case "serums":
            $productController->displayProductsByCategory('serums', 'view/pageProductView/serums.view.php');
            break;
        case "connexion":
            if(empty($url[1])){
                $userController->newConnexionForm();
            }elseif($url[1] === "cvalid"){
                $userController->connectUserValidation();
            }elseif($url[1] === "account"){
                require_once "view/pageUserView/account.view.php";
            }
            break;
        case "inscription":
            if (empty($url[1])) {
                $userController->newUserForm();
            } elseif ($url[1] === "ivalid") {
                $userController->newUserValidation();
            }
            break;
        case "confidentialite":
            require_once "view/pageConditionGenView/confidentialite.view.php";
            break;
        case "politique":
            require_once "view/pageConditionGenView/politique.view.php";
            break;
        case "termes":
            require_once "view/pageConditionGenView/termes.view.php";
            break;
    }
}
