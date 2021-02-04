<?php
$typesImg = ['image/gif', 'image/png', 'image/jpeg', 'image/pjpeg'];
$upload_dir = 'img/';
$link = mysqli_connect("localhost", "root", "", "shop");
if (!$link) die('Ошибка соединения' . mysqli_connect_error());

if (isset($_FILES)) {
  if (!in_array($_FILES['file']['type'], $typesImg)) {
  } else {
    $tmpFile = $_FILES["file"];
    $nameImg = hash_file('md5', $tmpFile['tmp_name']) . '.' . explode('.', $_FILES['file']['name'])[1];
    $pathImgProduct = $upload_dir . $nameImg;
    $idProduct = $_POST['id'];
    $nameProduct = $_POST['name'];
    $priceProduct = $_POST['price'];
    $quantityProduct = $_POST['quantity'];
    $timeStamp = date("Y-m-d H:i:s");;
    if ($tmpFile["size"] <= 2097152) {
      move_uploaded_file($tmpFile["tmp_name"], '../' . $pathImgProduct);
      mysqli_query($link, "UPDATE goods SET name='$nameProduct', price='$priceProduct', quantity='$quantityProduct', path_img='$pathImgProduct', update_at='$timeStamp'  WHERE id_goods='$idProduct'");
      header('Location: http://localhost:8888/basicphp/admin.php');
    } else echo "Превышен предел загрузки файла в 2 МБ";
  }
} else {
  if (isset($_POST)) {
    $nameProduct = $_POST['name'];
    $priceProduct = $_POST['price'];
    $quantityProduct = $_POST['quantity'];
    mysqli_query($link, "UPDATE goods SET name=$nameProduct, price=$priceProduct, quantity=$quantityProduct WHERE id_goods=$idProduct");
    header('Location: http://localhost:8888/basicphp/admin.php');
  }
}
mysqli_close($link);
