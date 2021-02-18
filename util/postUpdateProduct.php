<?php
var_dump($_FILES);
$typesImg = ['image/gif', 'image/png', 'image/jpeg', 'image/pjpeg'];
$upload_dir = 'img/';
$link = mysqli_connect("localhost", "root", "", "shop");
if (!$link) die('Ошибка соединения' . mysqli_connect_error());
$idProduct = (int)$_POST['id'];
$nameProduct = mysqli_real_escape_string($link, htmlspecialchars(strip_tags($_POST['name'])));
$priceProduct = (float)$_POST['price'];
$quantityProduct = (int)$_POST['quantity'];
$timeStamp = date("Y-m-d H:i:s");
if (!empty($_FILES['file']['name'])) {
  if (!in_array($_FILES['file']['type'], $typesImg)) {
    echo "не тот тип данных";
  } else {
    $tmpFile = $_FILES["file"];
    $nameImg = hash_file('md5', $tmpFile['tmp_name']) . '.' . explode('.', $_FILES['file']['name'])[1];
    $pathImgProduct = $upload_dir . $nameImg;
    if ($tmpFile["size"] <= 2097152) {
      $result = mysqli_query($link, "SELECT path_img FROM goods WHERE id_goods='$idProduct'");
      $value = mysqli_fetch_assoc($result);
      var_dump($value);
      if ($value) {
        unlink("../" . $value['path_img']);
      }
      move_uploaded_file($tmpFile["tmp_name"], '../' . $pathImgProduct);
      mysqli_query($link, "UPDATE goods SET name='$nameProduct', price='$priceProduct', quantity='$quantityProduct', path_img='$pathImgProduct', update_at='$timeStamp'  WHERE id_goods='$idProduct'");
      mysqli_close($link);
      header('Location: http://localhost:8888/basicphp/admin.php');
    } else echo "Превышен предел загрузки файла в 2 МБ";
  }
} else {
  if (isset($_POST)) {
    mysqli_query($link, "UPDATE goods SET name='$nameProduct', price='$priceProduct', quantity='$quantityProduct' WHERE id_goods='$idProduct'");
    mysqli_close($link);
    header('Location: http://localhost:8888/basicphp/admin.php');
  } else {
    echo "not data";
  }
}
// mysqli_close($link);
