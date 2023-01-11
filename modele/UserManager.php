<?php
require_once "Manager.php";
require_once "User.php";

class UserManager extends Manager{
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
}