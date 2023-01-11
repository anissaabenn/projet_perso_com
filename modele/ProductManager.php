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
            $p = new Product($product['id'], $product['name'], $product['price'], $product['photo1'], $product['photo2'], $product['description'], $product['category'], $product['nombreVente']);
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
            $p = new Product($product['id'], $product['name'], $product['price'], $product['photo1'], $product['photo2'], $product['description'], $product['category'], $product['nombreVente']);
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
            $p = new Product($product['id'], $product['name'], $product['price'], $product['photo1'], $product['photo2'], $product['description'], $product['category'],$product['nombreVente']);
            $this->addProduct($p);
        }
    }

    //Enregistrement d'un nouveau produit ds la BD
    public function newProductDB($name, $price, $category, $photo1, $photo2, $description, $nombreVente)
    {
        $req = "INSERT INTO products (name, price, category, photo1, photo2, description, nombreVente)
                    VALUES (:name, :price, :category, :photo1, :photo2, :description, :nombreVente)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $statement->bindValue(":price", $price, PDO::PARAM_STR);
        $statement->bindValue(":category", $category, PDO::PARAM_STR);
        $statement->bindValue(":photo1", $photo1, PDO::PARAM_STR);
        $statement->bindValue(":photo2", $photo2, PDO::PARAM_STR);
        $statement->bindValue(":description", $description, PDO::PARAM_STR);
        $statement->bindValue(":nombreVente", $nombreVente, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $product = new Product($this->getBdd()->lastInsertId(), $name, $price, $category, $photo1, $photo2, $description, $nombreVente);
            $this->addProduct($product);
        }
    }

    //Récupération d'un produit par l'id
    public function getProductById($id)
    {
        $this->loadProducts();
        foreach ($this->products as $product) {
            if ($product->getId() == $id) {
                return $product;
            }
        }
    }

    //Enregistrement des modif d'un produit dans la BD
    public function editProductDB($id, $name, $price, $category, $photo1, $photo2, $description)
    {
        $req = "UPDATE products SET name = :name, price = :price, category = :category, photo1 = :photo1, photo2 = :photo2, description = :description WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $statement->bindValue(":price", $price, PDO::PARAM_STR);
        $statement->bindValue(":category", $category, PDO::PARAM_STR);
        $statement->bindValue(":photo1", $photo1, PDO::PARAM_STR);
        $statement->bindValue(":photo2", $photo2, PDO::PARAM_STR);
        $statement->bindValue(":description", $description, PDO::PARAM_STR);
        $result = $statement->execute();

        if ($result) {
            $this->getProductById($id)->setName($name);
            $this->getProductById($id)->setPrice($price);
            $this->getProductById($id)->setCategory($category);
            $this->getProductById($id)->setPhoto1($photo1);
            $this->getProductById($id)->setPhoto2($photo2);
            $this->getProductById($id)->setDescription($description);
        }
    }

    //Suppression d'un produit
    public function deleteProductDB($id)
    {
        $req = "DELETE FROM products WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $product = $this->getProductById($id);
            unset($product);
        }
    }
}
