<?php require_once "view/header.view.php"; ?>

<form method="POST" action="<?= URL ?>admin/pvalid" class="formulaires">
        <label for="name">Nom du produit</label>
        <input type="text" class="form-control" name="name" id="name">

        <label for="price">Prix du produit</label>
        <input type="text" class="form-control" name="price" id="price">

        <label for="category">Catégorie du produit</label>
        <select name="category" id="category" class="form-control">
            <option value="eyes">Eyes</option>
            <option value="lips">Lips</option>
            <option value="eyes">Face</option>
            <option value="eyes">Moisturizers</option>
            <option value="eyes">Cleaners</option>
            <option value="eyes">Sérums</option>
        </select>

        <label for="description">Description du produit</label>
        <input type="text" class="form-control" name="description" id="description">

        <label for="photo1">Photo 1 du produit</label>
        <input type="file" class="form-control" id="photo1" name="photo1" accept="image/png, image/jpeg">

        <label for="photo2">Photo 2 du produit</label>
        <input type="file" class="form-control" id="photo2" name="photo2" accept="image/png, image/jpeg">

    <button type="submit" class="btn btn-success d-block m-1">Ajouter</button>
</form>

<?php require_once "view/footer.view.php"; ?>