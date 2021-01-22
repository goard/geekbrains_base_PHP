<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
    $arr = array(
    "Мужская одежда" => ["Рубашки", "Брюки", "Костюмы", "Свитера"],
    "Женская одежда" => ["Платье", "Брюки", "Блузы", "Обувь"],
    "Детская одежда" => ["Рубашки", "Брюки", "Свитера"],
    );
    echo "<ul>";
    foreach ($arr as $key => $values) {
      echo "<li>$key<ul>";
      for ($i = 0; $i <= array_key_last($values); $i++) {
        echo "<li>$values[$i]</li>";
      }
      echo "</ul></li>";
    }
    echo "</ul>"
  ?>
</body>

</html>