<?php require_once "view/header.view.php"; ?>


<h1 class="titleprod1">Produits nettoyants</h1>
<h2 class="titleprod2">Lingettes & gel </h2>

<div class="favproducts">
<?php foreach ($products as $product) : ?>
            <div class="article" id="myBtn_<?= $product->getId() ?>" onclick="displayModal(this)">
                <img class="photos" src="<?= $product->getPhoto1() ?>" onmouseover="this.src='<?= $product->getPhoto2() ?>';" onmouseout="this.src='<?= $product->getPhoto1() ?>';">
                <h3 class="h3"><?= $product->getName() ?></h3>
                <h4 class="h4"><?= $product->getPrice() ?> €</h4>
                <button type="button" class="btn" id="add">Ajouter au panier</button>
            </div>
        <?php endforeach; ?>
</div>

<?php foreach ($products as $product) : ?>
        <div class="modal" id="myModal_<?= $product->getId() ?>">
            <div class="modal_content">
                <span class="close">&times;</span>
                <h3><?= $product->getName() ?></h3>
                <p><?= $product->getDescription() ?></p>
            </div>
        </div>
    <?php endforeach; ?>

<?php require_once "view/footer.view.php"; ?>
