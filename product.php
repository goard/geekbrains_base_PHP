<?php
$page = "product";
$idProduct = (int)$_GET['id_product'];
$link = mysqli_connect("localhost", "root", "", "shop");
if (!$link) die('Ошибка соединения' . mysqli_error($link));
mysqli_query($link, "INSERT INTO goods_counter (id_goods, counter) VALUE ($idProduct, 1) ON DUPLICATE KEY UPDATE counter = counter + 1");
$result = mysqli_query($link, "SELECT * FROM goods INNER JOIN goods_counter ON goods.id_goods=goods_counter.id_goods WHERE goods.id_goods=$idProduct");
$row = mysqli_fetch_assoc($result);
// var_dump($row);
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <header>
    <?php include "component/navbar.php" ?>
  </header>
  <main>
    <div class="container">
      <h5 class="text-center"><?= $row['name'] ?></h5>
      <img src="<?= $row['path_img'] ?>" class="img-fluid center" alt="Responsive image">
      <div class="row ml-0 mr-0 justify-content-between align-items-center">
        <h4>Цена <?= $row['price'] ?>&#8381;</h4>
        <h6>Просмотры <?= $row['counter'] ?></h6>
      </div>

    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>