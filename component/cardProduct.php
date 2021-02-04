<!-- SHOW CARD GOODS to catalog.php admin.php -->
<div class="col">
  <div class='card mt-3' style='width: 18rem;'>
    <img src='<?= $row['path_img'] ?>' class='card-img-top' alt='<?= $row['name'] ?>'>
    <div class='card-body'>
      <h5 class='card-title'><?= $row['name'] ?></h5>
      <p class='card-text'>Цена <?= $row['price'] ?> &#8381;</p>
      <!-- CHANGE BUTTON SUBMIT -->
      <?php echo ($GLOBALS["page"] === "catalog" ?
        ("<a href='product.php?id_product=" . $row['id_goods'] . "' class='btn btn-primary'>Открыть</a>") :
        ("<a href='admin.php?view=edit&id_product=" . $row['id_goods'] . "' class='btn btn-primary'>Редактировать</a>"));
      ?>
    </div>
  </div>
</div>