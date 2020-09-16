<?php

require_once dirname(__DIR__) . '/config/config.php';
require_once dirname(__DIR__) . '/config/session.php';
?>

<nav>
  <div>
    <a href="<?= URLROOT . "/" ?>">
      <img id="logo" src="<?= URLROOT . "/assets/img/white-logo.png" ?>" alt="logo" />
    </a>
  </div>
  <?php
  if (empty($_SESSION)) :
  ?>
  <ul>
    <li id="login">
      <a href="<?= URLROOT . "/admin.php" ?>">
        <i class="fas fa-sign-in-alt"></i>
      </a>
    </li>
  </ul>
</nav>
<?php
  elseif (isset($_SESSION['email'])) :
?>
  <input type="checkbox" id="toggle">
  <ul class="hamburger">
    <span></span>
    <span></span>
    <span></span>
  </ul>
<?php
  if ($page === 'Accueil') :
?>
  <ul class="hamburger-menu">
    <li>
      <a href="?logout">Déconnexion</a>
    </li>
    <li>
      <a href="<?= URLROOT . "/admin.php" ?>">Administration</a>
    </li>
  </ul>
</nav>

<?php
  elseif ($page == 'Admin') :
?>
  <ul class="hamburger-menu">
    <li>
      <a href="?logout">Déconnexion</a>
    </li>
    <li>
      <a href="<?= URLROOT . "/" ?>">Accueil</a>
    </li>
  </ul>
</nav>
<div class="admin-nav">
  <h1 id="admin">Administration</h1>
  <ul>
    <li class="create">Ajouter un vin</li>
    <li class="update">Modifier un vin</li>
  </ul>
</div>
<?php
  endif;
endif;
?>