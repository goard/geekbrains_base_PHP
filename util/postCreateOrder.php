<?php
session_start();
// var_dump($_SESSION);
var_dump($_POST);
$idSession = session_id();
if (isset($_POST)) {
  $nameCustomer = $_POST['name'];
  $phoneCustomer = (int)$_POST['phone'];
  $addressCustomer = $_POST['address'];
  $link = mysqli_connect("localhost", "root", "", "shop");
  if (!$link) die('Ошибка соединения' . mysqli_error($link));
  $result = mysqli_query($link, "SELECT * FROM goods INNER JOIN cart ON goods.id_goods=cart.id_goods WHERE idSession = '$idSession'");
  mysqli_query($link, "INSERT INTO orders (name, phone, address) VALUES ('$nameCustomer', '$phoneCustomer', '$addressCustomer')");
  $idOrders = mysqli_insert_id($link);
  var_dump($idOrders);
  while ($row = mysqli_fetch_assoc($result)) {
    var_dump($row['price']);
    $summ = $row['price'] * $row['quantity'];
    mysqli_query($link, "INSERT INTO order_item (order_id, product_id, price, quantity, total_price) VALUES ('$idOrders', {$row['id_goods']}, {$row['price']}, {$row['quantity']}, '$summ')");
    mysqli_query($link, "DELETE FROM cart WHERE id_goods={$row['id_goods']} AND idSession = '$idSession'");
  }
  mysqli_close($link);
  header("Location: http://localhost:8888/basicphp/catalog.php");
}
