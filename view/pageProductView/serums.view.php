<?php require_once "view/header.view.php"; ?>


<h1 class="titleprod1">Produits clarifiants</h1>
<h2 class="titleprod2">Sérums & Toniques</h2>

<div class="favproducts">
<?php foreach($products as $product) : ?>
        <div class="article">
            <img class="photos" src="<?= $product->getPhoto1() ?>" onmouseover="this.src='<?= $product->getPhoto2() ?>';" onmouseout="this.src='<?= $product->getPhoto1() ?>';">
            <h3 class="h3"><?= $product->getName() ?></h3>
            <h4 class="h4"><?= $product->getPrice() ?> €</h4>
            <button type="button" class="btn" id="add">Ajouter au panier</button>
        </div>
        <?php endforeach; ?>
</div>

<?php require_once "view/footer.view.php"; ?>
