<?php require_once "view/header.view.php"; ?>

<h1 class="titleprod1">Modifier la catégorie : <?= $category->getName() ?></h1>

    <form action="<?= URL ?>admin/editcvalid" method="POST" class="formulaires">
        <div class="form-group">
            <label for="name">Nom de la catégorie</label>
            <input type="text" class="form-control" value="<?= $category->getName() ?>" name="name" id="name">
        </div>
        <input type="hidden" name="id-category" value="<?= $category->getId() ?>">
        <button type="submit" class="btn btn-success">Modifier</button>
    </form>

<?php require_once "view/footer.view.php"; ?>