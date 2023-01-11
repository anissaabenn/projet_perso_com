<?php require_once "view/header.view.php"; ?>

<h1 class="welcome">Bienvenue !</h1>

<div class="container">

    <div class="block">
        <h2 class="h2">Connexion</h2>
        <form method="POST" id="form" action="#">
            <fieldset>
                <div class="form-group">
                    <label for="email" class="form-label mt-4">Adresse Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Entrez votre adresse E-mail">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label mt-4">Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary" id="connect">Se connecter</button>            
                <p>Vous n'avez pas de compte ? Cliquez <a href="<?= URL ?>inscription">ici</a> pour vous inscrire</p>
            </fieldset>
        </form>
    </div>
</div>

<?php require_once "view/footer.view.php"; ?>