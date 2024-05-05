<?php
session_start();
if(empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
};
if(isset($_POST['token'])){
  if ($_POST['token']==$_SESSION['token']){
    unset($_SESSION['user']);
    header('location: ../index.php');
  } else {
    echo "Ошибка проверки токена безопасности! Свяжитесь с администратором!";
  };
};
?>
