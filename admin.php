<?php require_once 'configs/appStatus.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <?php include 'includes/head.php' ?>
  <link rel="stylesheet" href="css/admin.css">
  <title>Админ панель</title>
</head>
<body>
  <?php include 'includes/header.php' ?>

<section class="section">
 <div class="container">
   <?php if(isset($_SESSION['success'])){ ?>
      <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
        <div class="toast fixedNotif hide" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header bg-<?php if(isset($_SESSION['statusWarning'])){echo 'warning';}else{echo 'success';}; ?>">
            <strong class="text-white textNotif"><?php if(isset($_SESSION['success'])){echo $_SESSION['success'];unset($_SESSION['success']);};if(isset($_SESSION['statusWarning'])){echo $_SESSION['statusWarning'];unset($_SESSION['statusWarning']);}; ?></strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      </div>
   <?php }; ?>
    <table class="table table-bordered">
      <thead>
        <tr class="text-center">
          <th scope="col" class="text-white tabletext">id</th>
          <th scope="col" class="text-white tabletext">Имя</th>
          <th scope="col" class="text-white tabletext">Номер<br>моб.</th>
          <th scope="col" class="text-white tabletext">Время заявки</th>
          <th scope="col" class="text-white tabletext">Статус</th>
        </tr>
      </thead>
      <tbody>
        <?php while($app = $applications->fetch_assoc()) { ?>
        <tr class="text-center">
          <td scope="row" class="text-white fw-bold tabletext <?php if($app['status'] == 1) {echo 'crossOut';}else{ echo '';}; ?>"><?= $app['id'] ?></td>
          <td class="text-white fw-bold overflow-hidden tabletext <?php if($app['status'] == 1) {echo 'crossOut';}else{ echo '';}; ?>"><?= $app['name'] ?></td>
          <td class="text-white fw-bold tabletext <?php if($app['status'] == 1) {echo 'crossOut';}else{ echo '';}; ?>"><?= $app['phone'] ?></td>
          <td class="text-white fw-bold tabletext <?php if($app['status'] == 1) {echo 'crossOut';}else{ echo '';}; ?>"><?= $app['created_at'] ?></td>
          <td>
            <form action="configs/appStatus.php" method="POST">
                <input type="hidden" name="token" value="<?php if(isset($_SESSION['token'])){echo $_SESSION['token'];}else{echo '';}; ?>">
                <input type="hidden" name="id" value="<?= $app['id']; ?>">
                <input type="hidden" name="status" value="<?php if($app['status'] == 1){echo '0';}else{echo '1';} ?>">
                <input type="submit" class="scrollOffset btn btn-<?php if($app['status'] == 1){echo 'warning';}else{echo 'success';} ?> statusBtn" value="<?php if($app['status'] == 1){echo '&#x2716;';}else{echo '&#x2714;';} ?>">
            </form>
          </td>
        </tr>
      <?php };
        $applications->free();
       ?>
      </tbody>
    </table>
  </div>
</section>

  <?php include 'includes/footer.php' ?>

  <?php if (preg_match('~MSIE|Internet Explorer~i', $ie) || (strpos($ie, 'Trident/7.0') == false && strpos($ie, 'rv:11.0') == false)) {?>
  <script src="js/scrolloffset.js"></script>
  <?php };?>
</body>
</html>
