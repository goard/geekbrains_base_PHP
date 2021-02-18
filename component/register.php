<h4>Регистрация</h4>
<form enctype="multipart/form-data" method="POST" action="util/postRegister.php">
  <div class='form-group'>
    <label for='inputLogin'>Логин</label>
    <input type='email' class='form-control' id='inputLogin' placeholder='E-mail' name="login" required />
  </div>
  <div class='form-group'>
    <label for='inputPassword'>Пароль</label>
    <input type='password' class='form-control' id='inputPassword' placeholder='Пароль' name="password" required />
  </div>
  <div class='form-group'>
    <label for='selectRole'>Выберите роль</label>
    <select class="form-select form-select-lg" aria-label="Default select example" name="role" id="selectRole" required>
      <option value="user">Пользователь</option>
      <option value="admin">Администратор</option>
    </select>
  </div>
  <button type='submit' class='btn btn-primary'>Зарегистрироваться</button>
</form>
<a href="index.php">Войти</a>