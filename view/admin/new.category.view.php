<?php require_once "view/header.view.php"; ?>

<h1 class="titleprod1">Ajouter une catégorie</h1>

<form method="POST" action="<?= URL ?>admin/cvalid" class="formulaires">
        <label for="name">Nom de la nouvelle catégorie</label>
        <input type="text" class="form-control" name="name" id="name">
    <button type="submit" class="btn btn-success d-block m-1">Ajouter</button>
</form>

<?php require_once "view/footer.view.php"; ?>