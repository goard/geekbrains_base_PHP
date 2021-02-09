<h4>Войти</h4>
<form enctype="multipart/form-data" method="POST" action="util/postLogin.php">
  <div class='form-group'>
    <label for='inputName'>Логин</label>
    <input type='email' class='form-control' id='inputName' placeholder='E-mail' name="login" required />
  </div>
  <div class='form-group'>
    <label for='inputPrice'>Пароль</label>
    <input type='password' class='form-control' id='inputPrice' placeholder='Пароль' name="password" required />
  </div>
  <button type='submit' class='btn btn-primary'>Войти</button>
  <a href="index.php?view=register" role="button" class='btn btn-primary'>Регистрация</a>
</form>