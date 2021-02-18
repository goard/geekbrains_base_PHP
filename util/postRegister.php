<?php
/**
 * POST REQUEST create user
 */
var_dump($_POST);
if (isset($_POST)) {
  $link = mysqli_connect("localhost", "root", "", "shop");
  $login = mysqli_real_escape_string($link, htmlspecialchars(strip_tags($_POST['login'])));
  $role = mysqli_real_escape_string($link, htmlspecialchars(strip_tags($_POST['role'])));
  $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $hash = mysqli_real_escape_string($link, htmlspecialchars(strip_tags($hash)));
  if (!$link) die('Ошибка соединения' . mysqli_connect_error());
  $result = mysqli_query($link, "SELECT login FROM auth WHERE login = '$login'");
  $value = mysqli_fetch_assoc($result);
  var_dump($hash);
  if (!$value) {
    mysqli_query($link, "INSERT INTO auth (login, hashPassword, role) VALUES ('$login', '$hash', '$role')");
    header('Location: http://localhost:8888/basicphp');
  } else {
    echo "Данный пользователь существует";
  }
  mysqli_close($link);
} else {
  echo "нет данных";
}
