<?php

require_once "modele/ProductManager.php";

class ProductController 
{
    private $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager;
    }

    //Affichage de tous les produits pour l'admin
    public function displayProducts()
    {
        $products = $this->productManager->getProducts();
        require_once "view/admin/products.view.php";
    }

    //Afichage des meilleurs produits pour la page d'accueil
    public function displayFavProducts()
    {
        $products = $this->productManager->getFavProducts();
        require_once "view/home.view.php";
    }

    //Affichage des produits par catégorie pour chaque page
    public function displayProductsByCategory($category, $page)
    {
        $products = $this->productManager->getProductsByCategory($category);
        require_once "$page";
    }

    //Affichage du formulaire ajout d'un nouveau produit pour l'admin
    public function newProductForm()
    {
        require_once "view/admin/new.product.view.php";
    } 

    //Enregistrement du nouveau produit dans la BDD
    public function newProductValidation()
    {
        $this->productManager->newProductDB($_POST['name'], $_POST['price'], $_POST['category'], $_POST['photo1'], $_POST['photo2'], $_POST['description'], '0');
        header('Location:' . URL . "admin/productsview");
    }

    //Affichage du formulaire de modif d'un produit
    public function editProductForm($id)
    {

        $product = $this->productManager->getProductById($id);
        require_once "view/admin/edit.product.view.php";
    }

    //Méthode qui enregistre les modifs d'un produit
    public function editProductValidation()
    {
        $this->productManager->editProductDB($_POST['id-product'], $_POST['name'], $_POST['price'], $_POST['category'], $_POST['photo1'], $_POST['photo2'], $_POST['description']);
        header('Location: ' . URL . "admin/productsview");
    }

    //Méthode pour suppression d'un produit
    public function deleteProduct($id)
    {
        $this->productManager->deleteProductDB($id);
        header('Location: ' . URL . "admin/productsview");
    }

    //Affichage page détails produit
    public function detailsProduct($id)
    {
        $product = $this->productManager->getProductByID($id);
        require_once "view/admin/details.product.view.php";
    }
}
