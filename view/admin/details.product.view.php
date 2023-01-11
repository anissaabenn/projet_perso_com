<?php require_once "view/header.view.php"; ?>

<h1 class="titleprod1">Detail du produit : <?= $product->getName() ?></h1>

<!-- <img class="photos" src="<?= $product->getPhoto1() ?>"> -->


<div>
    <p><?= $product->getDescription() ?></p>
</div> 

<?php require_once "view/footer.view.php"; ?>