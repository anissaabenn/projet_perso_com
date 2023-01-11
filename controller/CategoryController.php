<?php

require_once "modele/CategoryManager.php";

class CategoryController
{
    private $categoryManager;

    public function __construct()
    {
        $this->categoryManager = new CategoryManager;
        $this->categoryManager->loadCategories();
    }

    //Affichage de toutes les catégories pour l'admin
    public function displayCategory()
    {
        $categories = $this->categoryManager->getCategory();
        require_once "view/admin/category.view.php";
    }


    //Affichage du formulaire pour ajouter une nouvelle catégorie
    public function newCategoryForm()
    {
        require_once "view/admin/new.category.view.php";
    }


    //Méthode pour enregistrer la nouvelle catégorie dans la BDD
    public function newCategoryValidation()
    {
        $this->categoryManager->newCategoryDB($_POST['name']);
        header('Location:' . URL . "admin/categoryview");
    }


    //Affichage formulaire pour modifier une catégorie 
    public function editCategoryForm($id)
    {

        $category = $this->categoryManager->getCategoryById($id);
        require_once "view/admin/edit.category.view.php";
    }


    //Méthode pour enregistrer la catégorie actualisé dans la BDD
    public function editCategoryValidation(){
        $this->categoryManager->editCategoryDB($_POST['id-category'], $_POST['name']);
        header('Location: ' . URL . "admin/categoryview");
    }


    //Méthode pour supprimer une catégorie
    public function deleteCategory($id){
        $this->categoryManager->deleteCategoryDB($id);
        header('Location: ' . URL . "admin/categoryview");
    }
}
