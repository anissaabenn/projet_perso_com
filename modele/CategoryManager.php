<?php
require_once "Manager.php";
require_once "Category.php";

class CategoryManager extends Manager
{
    private $categories;

    public function addCategory($category)
    {
        $this->categories[] = $category;
    }


    //Récupération de tous les produits pour l'admin
    public function getCategory()
    {
        return $this->categories;
    }

    public function loadCategories()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM category");
        $req->execute();
        $myCategories = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myCategories as $category) {
            $c = new Category($category['id'], $category['name']);
            $this->addCategory($c);
        }
    }


    //Enregistrement de nouvelle cat dans la BDD
    public function newCategoryDB($name)
    {
        $req = "INSERT INTO category (name) VALUES (:name)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $category = new Category($this->getBdd()->lastInsertId(), $name);
            $this->addCategory($category);
        }
    }


    //Récupération catégorie avec l'id
    public function getCategoryById($id)
    {
        $this->loadCategories();
        foreach ($this->categories as $category) {
            if ($category->getId() == $id) {
                return $category;
            }
        }
    }


    //Enregistrement modif catégorie dans BDD
    public function editCategoryDB($id, $name)
    {
        $req = "UPDATE category SET name = :name WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $result = $statement->execute();

        if ($result) {
            $this->getCategoryById($id)->setName($name);
        }
    }


    //Supprimer une catégorie dans la BDD
    public function deleteCategoryDB($id)
    {
        $req = "DELETE FROM category WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $category = $this->getCategoryById($id);
            unset($category);
        }
    }
}
