<?php require_once "view/header.view.php"; ?>

<h1 class="titleaccount">Modifier les informations du compte de : <?= $_SESSION['lastName'] ?></h1>

    <form action="<?= URL ?>connexion/editinfosvalid" method="POST" class="formulaires">
        <div class="form-group">
            <label for="firstName">Nom :</label>
            <input type="text" class="form-control" value="<?= $_SESSION['firstName'] ?>" name="firstName" id="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Prénom :</label>
            <input type="text" class="form-control" value="<?= $_SESSION['lastName'] ?>" name="lastName" id="lastName">
        </div>
        <div class="form-group">
            <label for="adress">Adresse :</label>
            <input type="text" class="form-control" value="<?= $_SESSION['adress'] ?>" name="adress" id="adress">
        </div>
        <div class="form-group">
            <label for="numberPhone">Numéro de téléphone :</label>
            <input type="text" class="form-control" value="<?= $_SESSION['numberPhone'] ?>" name="numberPhone" id="numberPhone">
        </div>
        <input type="hidden" name="id-user" value="<?= $_SESSION['id'] ?>">
        <button type="submit" class="btn btn-success">Modifier</button>
    </form>

<?php require_once "view/footer.view.php"; ?>