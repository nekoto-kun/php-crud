<?php

require 'vendor/autoload.php';

use App\Database\ProductDAO;

$products = ProductDAO::all();

include 'src/templates/header.php';

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="create.php" class="btn btn-primary">Create</a>
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) : ?>
            <tr>
              <td><?= $product->getId() ?></td>
              <td><?= $product->getName() ?></td>
              <td><?= $product->getPrice() ?></td>
              <td><?= $product->getDescription() ?></td>
              <td>
                <div class="d-flex align-items-center">
                  <a href="edit.php?id=<?= $product->getId() ?>" class="btn btn-warning">Edit</a>
                  <form action="process.php" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $product->getId() ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
          <?php if (empty($products)) : ?>
            <tr>
              <td colspan="5">No products found</td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include 'src/templates/footer.php' ?>