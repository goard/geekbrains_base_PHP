<?php
session_start();
if ($_SESSION['login']) {
  $page = "catalog";
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
    <?php include "component/navbar.php" ?>
  </header>
  <main>
    <div class="container">
      <?php if ($result->num_rows) : ?>
        <table class="table table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Наименование</th>
              <th scope="col">Цена</th>
              <th scope="col">Количество</th>
              <th scope="col">Сумма</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) : ?>
              <tr>
                <th scope="row"><?= "$i";
                                $i++; ?></th>
                <td><?= $row['name'] ?></td>
                <td><?= $row['price'] ?>&#8381;</td>
                <td><?= $row['quantity'] ?></td>
                <td><?= (int)$row['price'] * (int)$row['quantity'] ?>&#8381;</td>
              </tr>
            <?php
              $summ[] = $row['price'] * $row['quantity'];
            endwhile;
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Итого</th>
              <td></td>
              <td></td>
              <td><?php
                  $total = 0;
                  foreach ($summ as $value) {
                    $total += $value;
                  }
                  echo "$total &#8381;";
                  ?></td>
            </tr>
          </tfoot>
        </table>
      <?php endif; ?>
      <form enctype="multipart/form-data" method="POST" action="util/postCreateOrder.php">
        <div class='form-group'>
          <label for='inputName'>Имя</label>
          <input type='text' class='form-control' id='inputName' placeholder='Имя' name="name" required />
        </div>
        <div class='form-group'>
          <label for='inputPrice'>Телефон</label>
          <input type='text' class='form-control' id='inputPrice' placeholder='Телефон' name="phone" required />
        </div>
        <div class='form-group'>
          <label for='inputQuantity'>Адрес</label>
          <input type='text' class='form-control' id='inputQuantity' placeholder='Адрес' name="address" required />
        </div>
        <button type='submit' class='btn btn-primary'>Отправить</button>
      </form>
    </div>

  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>