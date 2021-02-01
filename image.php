<?php
$imageId = $_GET['id'];
$link = mysqli_connect("localhost", "root", "", "dataimg");
if (!$link) die('Ошибка соединения' . mysqli_error($link));
$result = mysqli_query($link, "SELECT path,name FROM img_table WHERE id=$imageId" );
$row = mysqli_fetch_row($result);
mysqli_close($link);
$fp = fopen($row[0], 'rb');
header('Content-Type: image/jpeg');
fpassthru($fp);
