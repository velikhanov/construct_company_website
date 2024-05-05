<?php
require_once 'connectDB.php';
if(empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
  };
  $ie = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
  $object = file_get_contents('php://input');
  $request = json_decode($object);
  if(isset($request)){
    if($request->token==$_SESSION['token']){
        if((iconv_strlen($request->phone) == 17) && (iconv_strlen($request->name) >= 2) && (iconv_strlen($request->name) <= 50)){

          $sql = $connection->prepare("INSERT INTO applications (name, phone, created_at) VALUES (?, ?, CURRENT_TIMESTAMP())");

          $name = $request->name;
          $phone = $request->phone;

          $sql->bind_param("ss", $name, $phone);
          if($sql->execute()) {
      			echo "Ваша заявка успешно оформлена, ожидайте звонка!";
      		} else {
      			echo "Произошла ошибка на сервере при отправке данных!";
      		}
          $sql->close();
      		$connection->close();
          // mysqli_query($connection, "INSERT INTO applications (name, phone, created_at) VALUES ('$request->name', '$request->phone', CURRENT_TIMESTAMP())");

          }else{

          exit("Введите корректные данные!");

        };
    }else{

      echo "Ошибка проверки токена безопасности! Свяжитесь с администратором!";

    };
  };
?>
