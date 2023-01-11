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
    public function displayFavProducts(){
        $products = $this->productManager->getFavProducts();
        require_once "view/home.view.php";
    }

    //Affichage des produits par catégorie pour chaque page
    public function displayProductsByCategory($category, $page)
    {
        $products = $this->productManager->getProductsByCategory($category);
        require_once "$page";
    }
}