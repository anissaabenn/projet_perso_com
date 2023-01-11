<?php require_once "view/header.view.php"; ?>

<h1 class="titleprod1">Modifier le produit : <?= $product->getName() ?></h1>

    <form action="<?= URL ?>admin/editvalid" method="POST" class="formulaires">
        <div class="form-group">
            <label for="name">Nom du produit</label>
            <input type="text" class="form-control" value="<?= $product->getName() ?>" name="name" id="name">
        </div> 
        <div class="form-group">
            <label for="price">Prix du produit</label>
            <input type="text" class="form-control" value="<?= $product->getPrice() ?>" name="price" id="price">
        </div>
        <div class="form-group">
            <label for="category">Catégorie du produit</label>
            <select name="category" id="category" class="form-control" value="<?= $product->getCategory() ?>">
                <option value="eyes">Eyes</option>
                <option value="lips">Lips</option>
                <option value="eyes">Face</option>
                <option value="eyes">Moisturizers</option>
                <option value="eyes">Cleaners</option>
                <option value="eyes">Sérums</option>
            </select>
        </div>

        <div class="form-group">
        <label for="description">Description du produit</label>
        <input type="text" class="form-control" value="<?= $product->getDescription() ?>" name="description" id="description">
        </div>

        <div class="form-group">
        <label for="photo1">Photo 1 du produit</label>
        <input type="file" class="form-control" value="<?= $product->getPhoto1() ?>" id="photo1" name="photo1" accept="image/png, image/jpeg">
        </div>

        <div class="form-group">
        <label for="photo2">Photo 2 du produit</label>
        <input type="file" class="form-control" value="<?= $product->getPhoto2() ?>" id="photo2" name="photo2" accept="image/png, image/jpeg">
        </div>

        <input type="hidden" name="id-product" value="<?= $product->getId() ?>">
        <button type="submit" class="btn btn-success">Modifier</button>
    </form>

<?php require_once "view/footer.view.php"; ?>