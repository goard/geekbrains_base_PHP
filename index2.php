<?php
$date = date("d F Y");
const TITLE = "PHP education";
const HEAD = "Введение PHP";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
      echo TITLE
    ?>
  </title>
</head>

<body>
  <h1>
    <?php
    echo HEAD
    ?>
  </h1>
  <footer>
    <?php
      echo "$date &copy;Copyright"
    ?>
  </footer>
</body>

</html>