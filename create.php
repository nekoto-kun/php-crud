<?php

require 'vendor/autoload.php';

use App\Database\CategoryDAO;

$categories = CategoryDAO::all();

include 'src/templates/header.php';
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Create product</h1>
      <form action="process.php" method="POST">
        <input type="hidden" name="_method" value="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-control" id="category" name="category_id">
            <?php foreach ($categories as $category) : ?>
              <option value="<?= $category->getId() ?>">
                <?= $category->getName() ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
  </div>
</div>

<?php include 'src/templates/footer.php' ?>