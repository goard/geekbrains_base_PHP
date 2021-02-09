<?php
session_start();
var_dump($_GET);
$session_id = session_id();
var_dump($session_id);
$idProduct = (int)$_GET['id_product'];
$link = mysqli_connect("localhost", "root", "", "shop");
if (!$link) die('Ошибка соединения' . mysqli_error($link));
mysqli_query($link, "DELETE FROM cart WHERE id_goods=$idProduct AND idSession = '$session_id'");
mysqli_close($link);
header("Location: http://localhost:8888/basicphp/cart.php");
