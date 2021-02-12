<?php
$role = $_SESSION['role'];
$page = $GLOBALS['page'];
?>
<nav class='navbar navbar-expand-lg navbar-light bg-light'>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarNav'>
    <ul class='navbar-nav mr-auto'>
      <li class='nav-item active'>
        <a class='nav-link' href='catalog.php'>Каталог товара<span class='sr-only'>(current)</span></a>
      </li>
      <?php echo ($role === 'admin' ? "<li class='nav-item'>
        <a class='nav-link' href='admin.php'>Редактирование товара</a>
      </li>" : null) ?>
      <?php echo ($role === 'admin' ? "<li class='nav-item'>
        <a class='nav-link' href='orders.php'>Ваши отправления</a>
      </li>" : null) ?>
      <li class='nav-item'>
        <a class='nav-link' href='cart.php'>Корзина товара</a>
      </li>
    </ul>
    <?php
    if ($page === "admin") :
    ?>
      <a href='admin.php?view=add' class='btn btn-success active mr-1' role='button' aria-pressed='true'>Добавить товар</a>
    <?php
    endif;
    ?>
    <?php
    if ($page === "cart" && $result->num_rows) :
    ?>
      <a href='checkout.php?view=add' class='btn btn-success active mr-1' role='button' aria-pressed='true'>Оформить заказ</a>
    <?php
    endif;
    ?>
    <a href="util/logout.php" class="btn btn-secondary" role="button">Выйти</a>
  </div>
</nav>