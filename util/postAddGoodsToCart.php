<?php
session_start();
var_dump($_POST);
if (isset($_POST)) {
  $session_id = session_id();
  $idProduct = (int)$_POST['id_product'];
  $quantity = (int)$_POST['quantity'];
  $link = mysqli_connect("localhost", "root", "", "shop");
  if (!$link) die('Ошибка соединения' . mysqli_error($link));
  $result = mysqli_query($link, "SELECT * FROM cart WHERE id_goods='$idProduct' AND idSession='$session_id'");
  var_dump($result);
  if ($result->num_rows) {
    mysqli_query($link, "UPDATE cart SET idSession = '$session_id', id_goods=$idProduct, quantity=$quantity WHERE id_goods='$idProduct' AND idSession='$session_id'");
  } else {
    mysqli_query($link, "INSERT INTO cart (idSession, id_goods, quantity) VALUE ('$session_id', '$idProduct', '$quantity')");
  }
  mysqli_close($link);
  header("Location: http://localhost:8888/basicphp/product.php?id_product=$idProduct");
} else {
  echo "Not data";
}
