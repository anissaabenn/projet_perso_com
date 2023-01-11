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

    // Affiche du formulaire de connexion
    public function newConnexionForm()
    {
        require_once "view/pageUserView/connexion.view.php";
    }

    //Methode qui connecte un user
    public function connectUserValidation()
    {
        $user = $this->userManager->getUserByEmail($_POST['email'], $_POST['password']);

        $_SESSION['id'] = $user->getId();
        $_SESSION['firstName'] = $user->getFirstName();
        $_SESSION['lastName'] = $user->getLastName();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['password'] = $user->getPassword();
        $_SESSION['adress'] = $user->getAdress();
        $_SESSION['numberPhone'] = $user->getNumberPhone();
        $_SESSION['role'] = $user->getRole();
        header('Location: ' . URL . "accueil");
    }
}
