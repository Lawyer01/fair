
<form method="post" action="" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Nom</label>
      <input name="name" type="text" class="form-control" id="inputName" placeholder="Nom">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Prénom</label>
    <input name="surname" type="text" class="form-control" id="inputNickname" placeholder="Prénom">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Mot de passe</label>
    <input name="pwd" type="password" class="form-control" id="inputAddress2" placeholder="mdp">
  </div>
    <div class="form-group">
    <label for="inputAddress2">Adresse</label>
    <input name="adress" type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Ville</label>
      <input name="city" type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Pays</label>
      <select name="stat" id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>France</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Code postal</label>
      <input name="zip" type="text" class="form-control" id="inputZip">
    <div class="form-group col-md-4">
      <label for="inputState">Statut</label>
      <select name="status" id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>admin</option>
        <option>asso</option>
        <option>tech</option>
        <option>user</option>
      </select>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
<?php
include_once("../bottom.php");
?>