<!-- SHOW CARD GOODS to catalog.php admin.php -->
<?php
$summ[] = $row['price'] * $row['quantity'];
?>
<div class="col">
  <div class='card mt-3' style='width: 18rem;'>
    <img src='<?= $row['path_img'] ?>' class='card-img-top' alt='<?= $row['name'] ?>'>
    <div class='card-body'>
      <h5 class='card-title'><?= $row['name'] ?></h5>
      <p class='card-text mb-0'>Цена <?= $row['price'] ?> &#8381;</p>
      <?php
      if ($GLOBALS["page"] === "cart") : ?>
        <p class='mb-0'>Количество <?= $row['quantity'] ?> шт</p>
        <p >Сумма <?= $row['quantity'] * $row['price'] ?> &#8381;</p>
      <?php
      endif;
      ?>
      <!-- CHANGE BUTTON SUBMIT -->
      <?php if ($GLOBALS["page"] === "catalog") {
        echo "<a href='product.php?id_product=" . $row['id_goods'] . "' class='btn btn-primary mt-3'>Открыть</a>";
      } elseif ($GLOBALS["page"] === "admin") {
        echo "<a href='admin.php?view=edit&id_product=" . $row['id_goods'] . "' class='btn btn-primary mt-3'>Редактировать</a>";
      } else {
        echo "<a href='util/getDeleteGoodsToCart.php?id_product=" . $row['id_goods'] . "' class='btn btn-primary'>Удалить</a>";
      }

      ?>
    </div>
  </div>
</div>