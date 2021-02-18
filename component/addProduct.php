<?php
// GET DATA BASEDATE MYSQL
$row = $view === 'edit' ? mysqli_fetch_assoc($result) : null;
// var_dump($row);
?>
<form enctype="multipart/form-data" method="POST" action="<?= $row ? 'util/postUpdateProduct.php' : 'util/postAddProduct.php'; ?>">
  <input type="hidden" name="id" value="<?= $row['id_goods'] ?>" />
  <div class='form-group'>
    <label for='inputImg'>Изображение</label>
    <input type='file' class='form-control-file' id='inputImg' name='file' accept="image/png,image/jpeg" <?php echo (($view === 'edit') ? null : "required"); ?>>
  </div>
  <div class='form-group'>
    <label for='inputName'>Наименование</label>
    <input type='text' class='form-control' id='inputName' placeholder='Наименование' name="name" value="<?= $row['name'] ?>" required />
  </div>
  <div class='form-group'>
    <label for='inputPrice'>Цена</label>
    <input type='number' class='form-control' id='inputPrice' placeholder='Цена' name="price" value="<?= $row['price'] ?>" required />
  </div>
  <div class='form-group'>
    <label for='inputQuantity'>Количество</label>
    <input type='number' class='form-control' id='inputQuantity' placeholder='Количество' name="quantity" value="<?= $row['quantity'] ?>" required />
  </div>
  <button type='submit' class='btn btn-primary'>Отправить</button>
</form>