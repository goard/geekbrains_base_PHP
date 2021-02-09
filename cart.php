<?php
session_start();
if ($_SESSION['login']) {
  $page = "cart";
  $idSession = session_id();
  $link = mysqli_connect("localhost", "root", "", "shop");
  if (!$link) die('Ошибка соединения' . mysqli_error($link));
  $result = mysqli_query($link, "SELECT * FROM goods INNER JOIN cart ON goods.id_goods=cart.id_goods WHERE idSession = '$idSession'");
} else {
  header('Location: http://localhost:8888/basicphp');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        if ($result->num_rows) {
          while ($row = mysqli_fetch_assoc($result)) :
            include "component/cardProduct.php";
          endwhile;
        } else {
          echo "Ваша корзина пуста";
        }
        ?>
      </div>
      <?php if ($result->num_rows) : ?>
        <div class="row">
          <h4>Итоговая сумма
            <?php
            $total = 0;
            foreach ($GLOBALS['summ'] as $value) {
              $total += $value;
            }
            echo "$total &#8381;";
            ?>
          </h4>
        </div>
      <?php endif; ?>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<?php
mysqli_close($link);
