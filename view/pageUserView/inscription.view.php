<?php require_once "view/header.view.php"; ?>

<h1 class="welcome">Bienvenue !</h1>

<div class="container">
    <div class="block2">
        <h2 class="h2">Inscription</h2>
        <form id="form" method="POST" action="<?= URL ?>inscription/ivalid">
            <fieldset>
                <div class="form-group">
                    <label for="firstName" class="form-label mt-4">Nom</label>
                    <input type="text" name="firstName" class="form-control" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <label for="lastName" class="form-label mt-4">Prénom</label>
                    <input type="text" name="lastName" class="form-control" placeholder="Entrez votre prénom">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label mt-4">Adresse Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Entrez votre adresse E-mail">
                </div>
                <div class="form-group">
                    <label for="passeword" class="form-label mt-4">Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="Choisissez votre mot de passe">
                </div>
                <div class="form-group">
                    <label for="adress" class="form-label mt-4">Adresse postale</label>
                    <input type="text" name="adress" class="form-control" placeholder="Entrez votre adresse">
                </div>
                <div class="form-group">
                    <label for="numberPhone" class="form-label mt-4">Numéro de téléphone</label>
                    <input type="tel" name="numberPhone" class="form-control" placeholder="Entrez votre numéro de téléphone">
                </div>
                <button type="submit" class="btn btn-primary" id="inscript">S'inscrire</button>
            </fieldset>
        </form>
    </div> 

</div>

<?php require_once "view/footer.view.php"; ?>