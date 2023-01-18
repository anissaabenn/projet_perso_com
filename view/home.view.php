<?php require_once "header.view.php"; ?>
<main>
    <div class="img_accueil">
        <span class="badge">New</span>
        <div class="newOffer">
            <h1 class="title1">serums</h1>
            <button class="btn" id="goOffer">SHOP NOW !</button>
        </div>
    </div>

    <h2 class="title2">Les produits favoris</h2>


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


    <div class="valeurs">
        <h5>Nos valeurs</h5>
        <div class="all">
            <div class="first">
                <h6>Vegan</h6>
                <p class="text1">Nous sommes vegans, ce qui signifie qu'aucun de nos produits, emballages, formules ou ingrédients ne contient de dérivés ou de sous-produits animaux</p>
            </div>
            <div class="second">
                <h6>Clean</h6>
                <p class="text2">Nos formules sont conçues avec des ingrédients pour assurer le juste équilibre entre efficacité, sécurité et responsabilité, produisant des formulations plus restrictives que les réglementations aux Etats-Unis, au Canada, dans l'UE et au-delà.</p>
            </div>
            <div class="third">
                <h6>Paraben free</h6>
                <p class="text3">Nous formulons sans parabènes, un conservateur controversé largement utilisé dans l'industrie cosmétique, car votre sécurité et votre santé sont notre priorité.</p>
            </div>
        </div>
    </div>
</main>
<?php require_once "footer.view.php"; ?>