<?php require_once "view/header.view.php"; ?>

<h1 class="titleaccount">Mon compte</h1>

<div class="d-grid gap-2">
  <?php if ($_SESSION['role'] == 'admin') { ?>
    <a href="<?= URL ?>admin" class="btn btn-lg btn-primary" type="button" id="foradmin">Page admin</a>
  <?php } ?>
  <a href="<?= URL ?>connexion/update/" class="btn btn-lg btn-primary" type="button" id="updateaccount">Modifier les informations de mon compte</a>
  <a href="<?= URL ?>connexion/disconnected" class="btn btn-lg btn-primary" type="button" id="disconnected">Se déconnecter</a>
  <a href="<?= URL ?>connexion/editpassword/" class="btn btn-lg btn-primary" type="button" id="updatepassword">Modifier le mot de passe</a>
  <form action="<?= URL ?>connexion/deleteaccount/<?= $_SESSION['id'] ?>" method="POST" onsubmit="return confirm ('Etes-vous sûr de vouloir supprimer votre compte ?')">
    <button class="btn btn-lg btn-primary" type="submit" id="deleteaccount">Supprimer mon compte</a>
  </form>
</div>

<?php require_once "view/footer.view.php"; ?>