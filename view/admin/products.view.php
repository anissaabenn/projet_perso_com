<?php require_once "view/header.view.php"; ?>

<h1 class="titleprod1">Tous les produits</h1>

<div class="container">
  <table class="table table-hover text-center">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Catégorie</th>
        <th colspan="3">Action</th>
      </tr>
    </thead> 
    <tbody>
      <?php foreach ($products as $product) : ?>
        <tr class="table-light">
          <td><?= $product->getId() ?></td>
          <td><?= $product->getName() ?></td>
          <td><?= $product->getPrice() ?></td>
          <td><?= $product->getCategory() ?></td>
          <td>
            <a href="<?= URL ?>admin/editproduct/<?= $product->getId() ?>"><i class="fa-solid fa-pen-to-square"></i></a>
          </td>
          <td>
            <form action="<?= URL ?>admin/deleteproduct/<?= $product->getId() ?>" method="POST" onSubmit="return confirm('Etes-vous certains de vouloir supprimer ce produit ?')">
              <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
            </form>
          </td>
          <td>
            <a href="<?= URL ?>admin/detailsproduct/<?= $product->getId() ?>"><i class="fa-regular fa-eye"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
  </table>
</div>

<a href="<?= URL ?>admin/addproducts" class="btn btn-success d-block m-auto w-25">Ajouter un produit</a>

<?php require_once "view/footer.view.php"; ?>