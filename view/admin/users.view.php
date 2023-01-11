<?php require_once "view/header.view.php"; ?>

<h1 class="titleprod1">Tous les utilisateurs</h1>

<div class="container">
  <table class="table table-hover text-center">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nom de famille</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Mot de passe</th>
        <th>Adresse</th>
        <th>Numéro de téléphone</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
      <tr class="table-light">
      <td><?= $user->getId() ?></td>
      <td><?= $user->getFirstName() ?></td>
      <td><?= $user->getLastName() ?></td>
      <td><?= $user->getEmail() ?></td>
      <td><?= $user->getPassword() ?></td>
      <td><?= $user->getAdress() ?></td>
      <td><?= $user->getNumberPhone() ?></td>
      <td><?= $user->getRole() ?></td>
          <td>
            <form action="" method="POST" onSubmit="return confirm('Etes-vous certains de vouloir supprimer cet utilisateur ?')">
              <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
  </table>
</div>

<?php require_once "view/footer.view.php"; ?>