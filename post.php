<?php
if (!empty($_FILES)) {
  // var_dump($_FILES);
  $upload_dir = 'img/';
  $tmpFile = $_FILES["img"];
  $pathImg = $upload_dir . $tmpFile["name"];
  $nameImg = $_POST['imgName'];
  if ($tmpFile["size"] <= 2097152) {
    $link = mysqli_connect("localhost", "root", "", "dataimg");
    if (!$link) die('Ошибка соединения' . mysqli_error($link));
    $result = mysqli_query($link, "SELECT path,name FROM img_table");
    $coincidence = false;
    while ($row = mysqli_fetch_row($result)) {
      if ($tmpFile['name'] === explode("/", $row[0])[1]) {
        $coincidence = true;
        break;
      }
    }
    if (!$coincidence) {
      move_uploaded_file($tmpFile["tmp_name"], $pathImg);
      mysqli_query($link, "INSERT INTO img_table (path, name) VALUES ('$pathImg', '$nameImg')");
    }
    mysqli_close($link);
  } else echo "Превышен предел загрузки файла в 2 МБ";
}
