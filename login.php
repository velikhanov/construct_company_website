<?php require_once 'configs/validate.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <?php include "includes/head.php";?>
  <link rel="stylesheet" href="css/login.css">
  <title>Авторизация</title>
</head>
<body>
<?php include "includes/header.php";?>
<section class="section">
  <div class="container text-center">
    <?php if(isset($_SESSION['logwarning'])){
      ?>
      <div class="alert alert-warning text-center" role="alert">
        <strong>
          <?php
          echo $_SESSION['logwarning'];
          unset($_SESSION['logwarning']);
           ?>
        </strong>
      </div>
      <?php }; ?>

      <main class="form-signin mt-5">
        <form action="configs/validate.php" method="POST">
          <img class="mb-4" src="img/main/ass.png" alt="ASS logo" width="90">
          <label for="inputLogin" class="visually-hidden">Username</label>
          <input type="text" name="login" value="<?php if(isset($_SESSION['old'])){echo $_SESSION['old'];}else{echo '';}; ?>" id="inputLogin" class="form-control mb-1" placeholder="Введите логин" required="" autofocus="" autocomplete="on">
          <label for="inputPassword" class="visually-hidden">Password</label>
          <input type="password" name="password" id="inputPassword" class="form-control mt-1" placeholder="Введите пароль" required="" autocomplete="on">
          <input type="hidden" name="token" value="<?php if(isset($_SESSION['token'])){echo $_SESSION['token'];}else{echo '';}; ?>">
          <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
        </form>
      </main>
  </div>
</section>
<?php include "includes/footer.php";?>
<script src="js/cursorpos.js"></script>
</body>
</html>
