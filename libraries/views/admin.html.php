<?php
require_once(dirname(__DIR__) . '/autoload.php');
require_once(dirname(__DIR__) . '/config/session.php');
?>

<div class="admin-container">
  <?php
  if (empty($_SESSION)) :
  ?>
    <h1>Administration</h1>
    <div class="login-container">
      <h2>Se connecter</h2>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
          <label>Email</label><br>
          <input type="text" name="email" placeholder="Entrez votre mail" />
        </div>
        <div>
          <label>Password</label><br>
          <input type="password" name="password" placeholder="Entrez votre mot de passe" />
        </div>
        <input type="submit" name="submit-login" value="Connexion"></input>
      </form>
    </div>
  <?php
  elseif (isset($_SESSION['email'])) :
  ?>
    <?php

    $model = new \models\Wines();
    $sql = $model->list('LIMIT 1');

    while ($wine = $sql->fetch()) {
    ?>
      <h2>Dernier vin ajouté</h2>
      <div class="wine-card">
        <div class="header">
          <h3><?= $wine['name'] ?></h3>
          <a href="#modalDelete">
            <i class="fas fa-trash-alt"></i>
          </a>
        </div>
        <div class="container">
          <div class="text-container">
            <div class="buttons">
              <h4><?= $wine['year'] ?></h4>
              <h4><?= $wine['country'] ?></h4>
              <h4><?= $wine['region'] ?></h4>
            </div>
            <p><?= $wine['description'] ?></p>
          </div>
          <img src="<?= $wine['picture'] ? "./assets/uploads/" . $wine['picture'] : './assets/img/generic.jpg' ?>" alt="photo-bouteille">
        </div>
      </div>
      
      <div id="modalDelete">
        <h4>Voulez-vous supprimer définitivement cet article ?</h4>
        <div class="button-container">
          <a href="./libraries/controllers/deleteWine.php?id=<?= $wine['id'] ?>">Oui</a>
          <a href="#">Non</a>
        </div>
      </div>
    <?php
    };
    ?>
  <?php
  endif;
  ?>
</div>