<?php
session_start();
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

require_once "controller/ProductController.php";
$productController = new ProductController();

require_once "controller/UserController.php";
$userController = new UserController();

require_once "controller/CategoryController.php";
$categoryController = new CategoryController();

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
            }elseif($url[1] == "updateinfos"){
                $userController->editInfosUserForm($url[2]);
            }elseif($url[1] == "editinfosvalid"){
                $userController->editInfosValidation();
            }elseif($url[1] == "disconnected"){
                session_destroy();
                header('Location: ' . URL . "accueil");
            }elseif($url[1] == "editpassword"){
                $userController->newPasswordForm();
            }elseif($url[1] == "editpvalid"){
                $userController->editPasswordValidation();
            }elseif($url[1] == "deleteaccount"){
                $userController->deleteUser($url[2]);
            }
            break;
        case "inscription":
            if (empty($url[1])) {
                $userController->newUserForm();
            } elseif ($url[1] === "ivalid") {
                $userController->newUserValidation();
            }
            break;
            case "admin":
                if (empty($url[1])){
                    require_once "view/admin/admin.view.php";
                } elseif ($url[1] == "productsview"){
                    $productController->displayProducts();
                } elseif ($url[1] === "addproducts") {
                    $productController->newProductForm();
                } elseif ($url[1] === "pvalid") {
                    $productController->newProductValidation();
                } elseif ($url[1] === "editproduct") {
                    $productController->editProductForm($url[2]);
                } elseif ($url[1] === "editvalid") {
                    $productController->editProductValidation();
                } elseif ($url[1] === "deleteproduct"){
                    $productController->deleteProduct($url[2]);
                } elseif ($url[1] === "detailsproduct"){
                    $productController->detailsProduct($url[2]);
                } elseif ($url[1] === "usersview"){
                    $userController->displayUsers();
                }elseif($url[1] === "categoryview"){
                    $categoryController->displayCategory();
                }elseif ($url[1] === "addcategory"){
                    $categoryController->newCategoryForm();
                }elseif($url[1] === "cvalid"){
                    $categoryController->newCategoryValidation();
                }elseif ($url[1] === "editcategory"){
                    $categoryController->editCategoryForm($url[2]);
                }elseif($url[1] === "editcvalid"){
                    $categoryController->editCategoryValidation();
                }elseif ($url[1] === "deletecategory"){
                    $categoryController->deleteCategory($url[2]);
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
