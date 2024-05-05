<?php
require_once 'connectDB.php';
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
  };
  if(isset($_POST['token'])){
  if($_POST['token']==$_SESSION['token']){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $sql = $connection->prepare("SELECT login, password FROM adminpanel WHERE login=?");
      $sql->bind_param("s", $_POST['login']);
      $sql->execute();
      $user = $sql->get_result()->fetch_assoc();

      if (isset($user) && password_verify($_POST['password'], $user['password'])){
        $_SESSION['user'] = $_POST['login'];
        if(isset($_SESSION['old'])){unset($_SESSION['old']);}else{'';};
        header('location: ../admin.php');
      } else {
        $_SESSION['logwarning'] = 'Неверный логин или пароль!';
        $_SESSION['old'] = $_POST['login'];
        header('location: ../login.php');
      };
      $sql->free_result();
      $user->free();
      $connection->close();
    };
  }else{
    echo "Ошибка проверки токена безопасности! Свяжитесь с администратором!";
  };
};
if(isset($_SESSION['user'])){
  header('location: ../admin.php');
};
?>
