<?php

require 'vendor/autoload.php';

use App\Database\ProductDAO;

$product = ProductDAO::get($_GET['id']);

include 'src/templates/header.php';

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Edit product</h1>
      <form action="process.php?id=<?= $product->getId() ?>" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" value="<?= $product->getName() ?>" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="number" value="<?= $product->getPrice() ?>" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description"><?= $product->getDescription() ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
    </div>
  </div>
</div>

<?php include 'src/templates/footer.php' ?>