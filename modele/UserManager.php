<?php
require_once "Manager.php";
require_once "User.php";

class UserManager extends Manager
{
    private $users;

    public function addUser($user)
    {
        $this->users[] = $user;
    }

    public function getUsers()
    {
        $this->loadUsers();
        return $this->users;
    }

    public function loadUsers()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM users");
        $req->execute();
        $myUsers = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myUsers as $user) {
            $p = new User($user['id'], $user['firstName'], $user['lastName'], $user['email'], $user['password'], $user['adress'], $user['numberPhone'], $user['role']);
            $this->addUser($p);
        }
    }


    //Méthode pour enregistrement infos en BDD d'un nouveau user
    public function newUserDB($firstName, $lastName, $email, $password, $adress, $numberPhone, $role)
    {

        $req = "INSERT INTO users (firstName, lastName, email, password, adress, numberPhone, role) VALUES (:firstName, :lastName, :email, :password, :adress, :numberPhone, :role)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":firstName", $firstName, PDO::PARAM_STR);
        $statement->bindValue(":lastName", $lastName, PDO::PARAM_STR);
        $statement->bindValue(":email", $email, PDO::PARAM_STR);
        $statement->bindValue(":password", $password, PDO::PARAM_STR);
        $statement->bindValue(":adress", $adress, PDO::PARAM_STR);
        $statement->bindValue(":numberPhone", $numberPhone, PDO::PARAM_STR);
        $statement->bindValue(":role", $role, PDO::PARAM_STR);



        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $user = new User($this->getBdd()->lastInsertId(), $firstName, $lastName, $email, $password, $adress, $numberPhone, $role);
            $this->addUser($user);
        }
    }

    //Méthode récupération user by email&password pour la connexion
    public function getUserByEmail($email, $password)
    {

        $this->loadUsers();

        foreach ($this->users as $value) {
            if ($email == $value->getEmail() && $password !== $value->getPassword()) {
            } elseif ($email == $value->getEmail() && $password == $value->getPassword()) {
                return $value;
            }
        }
    }

    //Méthode récupération user by l'id
    public function getUserById($id)
    {
        $this->loadUsers();
        foreach ($this->users as $user) {
            if ($user->getId() == $id) {
                return $user;
            }
        }
    }

    //Méthode pour actualisations infos en BDD d'un nouveau user
    public function editInfosDB($id, $firstName, $lastName, $adress, $numberPhone)
    {
        $req = "UPDATE users SET id = :id, firstName = :firstName, lastName = :lastName, adress = :adress, numberPhone = :numberPhone WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":firstName", $firstName, PDO::PARAM_STR);
        $statement->bindValue(":lastName", $lastName, PDO::PARAM_STR);
        $statement->bindValue(":adress", $adress, PDO::PARAM_STR);
        $statement->bindValue(":numberPhone", $numberPhone, PDO::PARAM_STR);
        $result = $statement->execute();

        if ($result) {
            $this->getUserById($id)->setFirstName($firstName);
            $this->getUserById($id)->setLastName($lastName);
            $this->getUserById($id)->setAdress($adress);
            $this->getUserById($id)->setNumberPhone($numberPhone);
        }
    }

    //Méthode pour changement mdp
    public function editPasswordDB($id, $password)
    {
        $req = "UPDATE users SET id = :id, password = :password WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":password", $password, PDO::PARAM_STR);
        $result = $statement->execute();

        if ($result) {
            $this->getUserById($id)->setFirstName($password);
        }
    }

    //Méthode pour supprimer compte user
    public function deleteUserDB($id)
    {
        $req = "DELETE FROM users WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $user = $this->getUserById($id);
            unset($user);
        }
    }
}
