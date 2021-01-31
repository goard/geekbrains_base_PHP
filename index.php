<?php
if (!empty($_FILES['img'])) {
  // var_dump($_FILES["img"]);
  $upload_dir = 'img/';
  $tmpFile = $_FILES["img"];
  if ($tmpFile["size"] <= 2097152)
    move_uploaded_file($tmpFile["tmp_name"], $upload_dir . $tmpFile["name"]);
  else echo "Превышен предел загрузки файла в 2 МБ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <main>
    <div>
      <form enctype="multipart/form-data" method="POST">
        <input type="file" id="img" name="img" accept="image/png,image/jpeg" />
        <input type="submit" />
      </form>
      <div>
        <?php
        $arrImg = scandir("img/");
        for ($i = 2; $i < count($arrImg); $i++) : ?>
          <a href="img/<?= $arrImg[$i] ?>" target="_blank"> <img src="img/<?= $arrImg[$i] ?>" alt="image" width="450px" /> </a> <br />
        <?php endfor; ?>
      </div>
    </div>
  </main>
</body>

</html>