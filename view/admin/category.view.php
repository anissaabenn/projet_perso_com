<?php require_once "view/header.view.php"; ?>

<h1 class="titleprod1">Toutes les catégories</h1>

<div class="container">
  <table class="table table-hover text-center">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category) : ?>
        <tr class="table-light">
          <td><?= $category->getId() ?></td>
          <td><?= $category->getName() ?></td>
          <td>
            <a href="<?= URL ?>admin/editcategory/<?= $category->getId() ?>"><i class="fa-solid fa-pen-to-square"></i></a>
          </td>
          <td>
            <form action="<?= URL ?>admin/deletecategory/<?= $category->getId() ?>" method="POST" onSubmit="return confirm('Etes-vous certains de vouloir supprimer ce jeu ?')">
              <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
  </table>
</div>

<a href="<?= URL ?>admin/addcategory" class="btn btn-success d-block m-auto w-25">Ajouter une catégorie</a>

<?php require_once "view/footer.view.php"; ?>