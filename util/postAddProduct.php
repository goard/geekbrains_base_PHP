<?php
$typesImg = ['image/gif', 'image/png', 'image/jpeg', 'image/pjpeg'];
$upload_dir = 'img/';
var_dump($_POST);

if (isset($_FILES)) {
  if (!in_array($_FILES['file']['type'], $typesImg)) {
  } else {
    // var_dump($_FILES);
    var_dump($_POST['name']);
    $tmpFile = $_FILES["file"];
    $nameImg = hash_file('md5', $tmpFile['tmp_name']) . '.' . explode('.', $_FILES['file']['name'])[1];
    $pathImgProduct = $upload_dir . $nameImg;
    $nameProduct = $_POST['name'];
    $priceProduct = $_POST['price'];
    $quantityProduct = $_POST['quantity'];
    if ($tmpFile["size"] <= 2097152) {
      $link = mysqli_connect("localhost", "root", "", "shop");
      if (!$link) die('Ошибка соединения' . mysqli_connect_error());
      $result = mysqli_query($link, "SELECT name FROM goods");
      $coincidence = false;
      while ($row = mysqli_fetch_row($result)) {
        var_dump($row);
        if ($nameProduct === $row[0]) {
          $coincidence = true;
          break;
        }
      }
      if (!$coincidence) {
        move_uploaded_file($tmpFile["tmp_name"], '../' . $pathImgProduct);
        mysqli_query($link, "INSERT INTO goods (name, price, quantity, path_img) VALUES ('$nameProduct', $priceProduct, $quantityProduct, '$pathImgProduct')");
      }
      mysqli_close($link);
      header('Location: http://localhost:8888/basicphp/admin.php');
    } else echo "Превышен предел загрузки файла в 2 МБ";
  }
}
