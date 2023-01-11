<?php require_once "modele/UserManager.php";

class UserController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager;
    }

    //Affichage du formulaire d'inscription
    public function  newUserForm()
    {
        require_once "view/pageUserView/inscription.view.php";
    }

    //Méthode qui enregistre les infos d'un nouveau user
    public function newUserValidation()
    {
        $this->userManager->newUserDB($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['adress'], $_POST['numberPhone'], 'user');
        header('Location:' . URL . "connexion");
    }
}
