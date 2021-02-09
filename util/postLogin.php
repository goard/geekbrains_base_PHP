<?php
session_start();
if (isset($_POST)) {
  $link = mysqli_connect("localhost", "root", "", "shop");
  $login = mysqli_real_escape_string($link, htmlspecialchars(strip_tags($_POST['login'])));
  $password = $_POST['password'];
  $result = mysqli_query($link, "SELECT * FROM auth WHERE login = '$login'");
  $value = mysqli_fetch_assoc($result);
  mysqli_close($link);
  // var_dump($value);
  if ($value) {
    if (password_verify($password, $value['hashPassword'])) {
      echo "пароли совпадают";
      $_SESSION['login'] = $value['login'];
      $_SESSION['role'] = $value['role'];
      header('Location: http://localhost:8888/basicphp/catalog.php');
    } else {
      echo "пароли несовпадают";
    }
  } else {
    echo "Нет пользователя";
  }
} else {
  echo "Нет данных";
}
