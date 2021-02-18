<?php
session_start();
if ($_SESSION['login'] && $_SESSION['role'] === 'admin') {
  $page = "admin";
  $view = $_GET ? $_GET['view'] : null;

  $idProduct = $view === 'edit' ? (int)$_GET['id_product'] : null;
  $link = mysqli_connect("localhost", "root", "", "shop");
  if (!$link) die('Ошибка соединения' . mysqli_error($link));
  $idProduct ? ($result = mysqli_query($link, "SELECT * FROM goods WHERE id_goods=$idProduct")) : ($result = mysqli_query($link, "SELECT * FROM goods"));
} else {
  header('Location: http://localhost:8888/basicphp/catalog.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <header>
    <?php include "component/navbar.php"; ?>
  </header>
  <main>
    <div class="container">
      <div class="row">
        <?php
        if ($view) {
          include "component/addProduct.php";
        } else {
          while ($row = mysqli_fetch_assoc($result)) {
            include "component/cardProduct.php";
          };
        }
        ?>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<script>
  console.log(window.location)
</script>

</html>
<?php
mysqli_close($link);
