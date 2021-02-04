<nav class='navbar navbar-expand-lg navbar-light bg-light'>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarNav'>
    <ul class='navbar-nav mr-auto'>
      <li class='nav-item active'>
        <a class='nav-link' href='catalog.php'>Каталог товара<span class='sr-only'>(current)</span></a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='admin.php'>Редактирование товара</a>
      </li>
    </ul>
    <?php echo ($GLOBALS["page"] === "admin" ? "<a href='admin.php?view=add' class='btn btn-success active' role='button' aria-pressed='true'>Добавить товар</a>" : null); ?>
  </div>
</nav>