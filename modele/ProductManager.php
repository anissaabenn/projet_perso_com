<?php
require_once "Manager.php";
require_once "Product.php";

class ProductManager extends Manager
{
    private $products;

    public function addProduct($product)
    {
        $this->products[] = $product;
    }


    //Récupération de tous les produits pour l'admin
    public function getProducts()
    {
        $this->loadProducts();
        return $this->products;
    }


    //Récupération des produits favoris pour accueil
    public function getFavProducts()
    {
        $this->loadFavProducts();
        return $this->products;
    }


    //Récupération des produits par catégories pour chaque pages
    public function getProductsByCategory($category)
    {
        $this->loadProductsByCategory($category);
        return $this->products;
    }

    
    //Chargement de tous les produits
    public function loadProducts()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM products");
        $req->execute();
        $myProducts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myProducts as $product) {
            $p = new Product($product['id'], $product['name'], $product['price'], $product['photo1'], $product['photo2'], $product['description'], $product['category']);
            $this->addProduct($p);
        }
    }


    //Chargement des produits favoris
    public function loadFavProducts()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM products WHERE nombreVente = 5");
        $req->execute();
        $myProducts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myProducts as $product) {
            $p = new Product($product['id'], $product['name'], $product['price'], $product['photo1'], $product['photo2'], $product['description'], $product['category']);
            $this->addProduct($p);
        }
    }


    //Chargement des produits par catégorie
    public function loadProductsByCategory($category)
    {
        $req = $this->getBdd()->prepare("SELECT * FROM products WHERE category ='$category'");
        $req->execute();
        $myProducts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myProducts as $product) {
            $p = new Product($product['id'], $product['name'], $product['price'], $product['photo1'], $product['photo2'], $product['description'], $product['category']);
            $this->addProduct($p);
        }
    }
}