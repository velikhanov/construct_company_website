<header class="fixed-top">
  <nav class="navbar navbar-expand-lg navCustom">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img class="brand-img" src="img/main/logo.png" alt=""></a>

        <span class="text-white headernum">+7(999) 999-99-99</span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-center" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php if(($_SERVER['REQUEST_URI'] == '/admin.php') || ($_SERVER['REQUEST_URI'] == '/login.php')){echo '/index.php';}else{echo '#main';};?>">Главная</a>
            </li>
            <?php if(($_SERVER['REQUEST_URI'] != '/admin.php') && ($_SERVER['REQUEST_URI'] != '/login.php')){ ?>
            <li class="nav-item">
              <a class="nav-link" href="#about">О нас</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Портфолио</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contacts">Контакты</a>
            </li>
            <?php }; ?>
            <?php if(isset($_SESSION['user'])){ ?>
            <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/admin.php' ? 'active' : '' ?>" href="/admin.php">Админ панель</a>
            </li>
            <li class="nav-item">
              <form action="configs/logout.php" method="POST" id="logoutForm">
                <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
                <a href="#" class="nav-link" id="logoutBtn">Выйти</a>
              </form>
            </li>
            <?php };?>
          </ul>
        </div>
    </div>
  </nav>
</header>
