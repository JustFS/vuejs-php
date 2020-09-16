<?php
require_once(dirname(__DIR__) . '/autoload.php');
?>

<div class="update-container">
  <h1>Modifier</h1>
  <form action="libraries/controllers/searchWines.php" method="POST" class="update-search">
    <input type="search" placeholder="Nom du vin" name="name">
    <select name="year" id="wines">
      <option value="" selected>Année</option>
      <option value="2020">2020</option>
      <option value="2019">2019</option>
      <option value="2018">2018</option>
      <option value="2017">2017</option>
      <option value="2016">2016</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
      <option value="2012">2012</option>
      <option value="2011">2011</option>
      <option value="2010">2009</option>
      <option value="2010">2008</option>
      <option value="2010">2007</option>
      <option value="2010">2006</option>
      <option value="2010">2005</option>
      <option value="2010">2004</option>
      <option value="2010">2003</option>
      <option value="2010">2002</option>
      <option value="2010">2001</option>
      <option value="2010">2000</option>
    </select>
    <input type="submit" value="Rechercher">
  </form>
  <div class="update-list">
    <div class="header">
      <h3>Nom</h3>
      <p>Année</p>
    </div>
    <?php

    $model = new \models\Wines();
    $sql = $model->list('');

    while ($wine = $sql->fetch()) {
    ?>
      <div class="wine">
        <h2><?= $wine['name'] ?></h2>
        <h4><?= $wine['year'] ?></h4>
        <!-- Update reveal onclick -->
        <i class="fas fa-pen"></i>
        <input class="update-checkbox" type="checkbox">
        <a href="#modalDelete">
          <i class="fas fa-trash-alt"></i>
        </a>
        <div class="update">
          <h2>Mettre à jour : <?php echo $wine["name"] ?></h2>
          <form action="libraries/controllers/updateWine.php?id=<?= $wine['id'] ?>" method="post" enctype="multipart/form-data">
            <label for="">Nom</label>
            <input type="text" name="name" placeholder="<?= $wine['name'] ?>" value="<?= $wine['name'] ?>">
            <br>
            <label for="">Millésime</label>
            <select name="year">
              <?= $wine['year'] ?>
              <option value="2020" <?php echo $wine["year"] == 2020 ? "selected" : '' ?>>2020</option>
              <option value="2019" <?php echo $wine["year"] == 2019 ? "selected" : '' ?>>2019</option>
              <option value="2018" <?php echo $wine["year"] == 2018 ? "selected" : '' ?>>2018</option>
              <option value="2017" <?php echo $wine["year"] == 2017 ? "selected" : '' ?>>2017</option>
              <option value="2016" <?php echo $wine["year"] == 2016 ? "selected" : '' ?>>2016</option>
              <option value="2015" <?php echo $wine["year"] == 2015 ? "selected" : '' ?>>2015</option>
              <option value="2014" <?php echo $wine["year"] == 2014 ? "selected" : '' ?>>2014</option>
              <option value="2013" <?php echo $wine["year"] == 2013 ? "selected" : '' ?>>2013</option>
              <option value="2012" <?php echo $wine["year"] == 2012 ? "selected" : '' ?>>2012</option>
              <option value="2011" <?php echo $wine["year"] == 2011 ? "selected" : '' ?>>2011</option>
              <option value="2010" <?php echo $wine["year"] == 2010 ? "selected" : '' ?>>2010</option>
              <option value="2009" <?php echo $wine["year"] == 2009 ? "selected" : '' ?>>2009</option>
              <option value="2008" <?php echo $wine["year"] == 2008 ? "selected" : '' ?>>2008</option>
              <option value="2007" <?php echo $wine["year"] == 2007 ? "selected" : '' ?>>2007</option>
              <option value="2007" <?php echo $wine["year"] == 2006 ? "selected" : '' ?>>2006</option>
              <option value="2007" <?php echo $wine["year"] == 2005 ? "selected" : '' ?>>2005</option>
              <option value="2007" <?php echo $wine["year"] == 2004 ? "selected" : '' ?>>2004</option>
            </select>

            <br>
            <label for="">Cépage</label>
            <input type="text" name="grapes" placeholder="<?= $wine['grapes'] ?>" value="<?= $wine['grapes'] ?>"><br>

            <label for="">Pays</label>
            <input type="text" name="country" placeholder="<?= $wine['country'] ?>" value="<?= $wine['country'] ?>"><br>

            <label for="">Région</label>
            <input type="text" name="region" placeholder="<?= $wine['region'] ?>" value="<?= $wine['country'] ?>"><br>

            <label for="">Description</label>
            <input name="description" placeholder="<?= $wine['description'] ?>" value="<?= $wine['description'] ?>"></input><br>

            <div class="submit-btn">
              <input type="submit" value="Envoyer">
            </div>
          </form>
        </div>
        <div id="modalDelete">
          <h4>Voulez-vous supprimer définitivement cet article ?</h4>
          <div class="button-container">
            <a href="./libraries/controllers/deleteWine.php?id=<?= $wine['id'] ?>">Oui</a>
            <a href="#">Non</a>
          </div>
        </div>
        </a>
      </div>
    <?php
    };
    ?>
  </div>