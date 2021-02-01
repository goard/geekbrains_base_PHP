<?php
//Input error to browseer
declare(strict_types=1);

ini_set('error_reporting', (string)E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

//Upload file to directory img/ and save path to database
require "post.php"

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $link = mysqli_connect("localhost", "root", "", "dataimg");
  if (!$link) die('Ошибка соединения' . mysqli_error($link));
  $result = mysqli_query($link, "SELECT path,name FROM img_table");
  $emps = [];
  while ($row = mysqli_fetch_row($result))
    $emps[] = $row;
  // var_dump($emps);
  mysqli_close($link);
  ?>
  <header>
    <h1>Галерея изображений</h1>
  </header>
  <main>
    <div>
      <form enctype="multipart/form-data" method="POST" onsubmit="submitHandler">
        <input type="file" id="img" name="img" accept="image/png,image/jpeg" required />
        <input type="text" id="imgName" name="imgName" placeholder="Имя файла" required />
        <input type="submit" />
      </form>
      <div>
        <?php for ($i = 0; $i < count($emps); $i++) : ?>
          <div>
            <img src="image.php?id=<?= $i+1 ?>" alt="" width="450px" />
            <h2><?= $emps[$i][1] ?></h2>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </main>
  <script>
    function submitHandler(e) {
      console.log(e);
      document.getElementById('img').value = "";
      document.getElementById('imgName').value = "";
    }
  </script>
</body>

</html>