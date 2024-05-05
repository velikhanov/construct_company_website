<?php
require_once 'connectDB.php';

if (!isset($_SESSION['user'])){
	header('location: ../login.php');
};

if (empty($_SESSION['token'])) {
	$_SESSION['token'] = bin2hex(random_bytes(32));
};
$ie = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
$status = '';
if(isset($_POST['token'])){
  	if ($_POST['token']==$_SESSION['token']){
     	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$sql = $connection->prepare("UPDATE applications SET status=? WHERE id=?");
			$status = $_POST['status'];
			$id = $_POST['id'];
			$sql->bind_param("ii", $status, $id);
			if ($sql->execute()) {
				$_SESSION['success'] = "Статус заказа " . $id . " обновлен!";
			} else {
				$_SESSION['statusWarning'] = "Возникла ошибка при обновлении статуса товара!";
			};
			header('location: ../admin.php');
		};
  	} else {
		echo "Ошибка проверки токена безопасности! Свяжитесь с администратором!";
	};
};
$sql = $connection->prepare("SELECT id, name, phone, status, created_at FROM applications ORDER BY id DESC");
$sql->execute();
$applications = $sql->get_result();
$connection->close();
