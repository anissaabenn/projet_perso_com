<?php require_once "view/header.view.php"; ?>

<h1 class="titleaccount">Gestion du website</h1>

<div class="d-grid gap-2">
  <a href="<?= URL ?>admin/productsview" class="btn btn-lg btn-primary" type="button" id="prod">PRODUITS</a>
  <a href="<?= URL ?>admin/usersview" class="btn btn-lg btn-primary" type="button" id="util">UTILISATEURS</a>
  <a href="<?= URL ?>admin/categoryview" class="btn btn-lg btn-primary" type="button" id="catg">CATEGORIE</a>
</div>

<?php require_once "view/footer.view.php"; ?>