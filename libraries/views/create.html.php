<div class="create-container">
  <h1>Ajouter un vin</h1>
  <div class="create-form">
    <form action="libraries/controllers/createWines.php" method="post" enctype="multipart/form-data">
      <label for="">Nom</label><br>
      <input type="text" name="name" placeholder="nom">
      <br>
      <label for="">Millésime</label><br>
      <select name="year">
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
        <option value="2010">2010</option>
        <option value="2009">2009</option>
        <option value="2008">2008</option>
        <option value="2007">2007</option>
        <option value="2006">2006</option>
        <option value="2005">2005</option>
        <option value="2004">2004</option>
        <option value="2003">2003</option>
        <option value="2002">2002</option>
        <option value="2001">2001</option>
        <option value="2000">2000</option>
      </select>
      <br>
      <label for="">Cépage</label><br>
      <input type="text" name="grapes" placeholder="cépage"><br>

      <label for="">Pays</label><br>
      <input type="text" name="country" placeholder="pays"><br>

      <label for="">Région</label><br>
      <input type="text" name="region" placeholder="région"><br>

      <label for="">Description</label><br>
      <textarea name="description" placeholder="description du vin..." cols="30" rows="10"></textarea><br>


      <input type="file" name="picture"><br>

      <div class="create-btn">
        <input type="submit" value="Envoyer">
      </div>
    </form>
  </div>



</div>