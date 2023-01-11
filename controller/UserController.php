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

    //Affichage du formulaire de modifications infos compte user
    public function editInfosUserForm($id)
    {

        $user = $this->userManager->getUserById($id);
        require_once "view/pageUserView/updateinfos.view.php";
    }

    //Methode qui enregistre les changements information de l'user
    public function editInfosValidation()
    {
        $this->userManager->editInfosDB($_POST['id-user'], $_POST['firstName'], $_POST['lastName'], $_POST['adress'], $_POST['numberPhone']);

        $user = $this->userManager->getUserById($_POST['id-user']);

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


    //Affichage du formulaire changement mot de passe
    public function  newPasswordForm()
    {
        require_once "view/pageUserView/updatepassword.php";
    }


    //Methode qui enregistre le changement mdp
    public function editPasswordValidation()
    {
        $this->userManager->editPasswordDB($_POST['id-user'], $_POST['password']);

        $user = $this->userManager->getUserById($_POST['id-user']);

        $_SESSION['password'] = $user->getPassword();

        session_destroy();
        header('Location: ' . URL . "connexion");
    }

        //Methode pour supprimer compte utilisateur
        public function deleteUser($id)
        {
            $this->userManager->deleteUserDB($id);
            session_destroy();
            header('Location: ' . URL . "accueil");
        }
}
