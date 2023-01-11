<?php require_once "view/header.view.php"; ?>

<h1 class="titleaccount">Modifier le mot de passe du compte de : <?= $_SESSION['lastName'] ?></h1>

    <form action="<?= URL ?>connexion/editpvalid" method="POST" class="formulaires">
        <div class="form-group">
            <label for="password">Nouveau mot de passe :</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <input type="hidden" name="id-user" value="<?= $_SESSION['id'] ?>">
        <button type="submit" class="btn btn-success">Modifier</button>
    </form>

    <p class="reconnected">Une fois votre mot de passe changé, il faudra vous reconnecter avec votre nouveau mot de passe.</p>

<?php require_once "view/footer.view.php"; ?>