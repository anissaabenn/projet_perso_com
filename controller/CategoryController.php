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

    public function displayCategory()
    {
        $categories = $this->categoryManager->getCategory();
        require_once "view/admin/category.view.php";
    }

    public function newCategoryForm()
    {
        require_once "view/admin/new.category.view.php";
    }

    public function newCategoryValidation()
    {
        $this->categoryManager->newCategoryDB($_POST['name']);
        header('Location:' . URL . "admin/categoryview");
    }

    public function editCategoryForm($id)
    {

        $category = $this->categoryManager->getCategoryById($id);
        require_once "view/admin/edit.category.view.php";
    }

    public function editCategoryValidation(){
        $this->categoryManager->editCategoryDB($_POST['id-category'], $_POST['name']);
        header('Location: ' . URL . "admin/categoryview");
    }

    public function deleteCategory($id){
        $this->categoryManager->deleteCategoryDB($id);
        header('Location: ' . URL . "admin/categoryview");
    }
}
