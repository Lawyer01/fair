<?php
include_once("../top.php");
include_once("../template.php");
?>
<div id="box-login">

    <?php if(isset($authentificationEchoue)): ?>
        <div class="alert alert-danger">Authentification échouée. Veuillez vérifier votre nom d'utilisateur et/ou mot de passe</div>
    <?php endif; ?>
    <form method="post" action="" >
        <h1 class="h3 mb-3 font-weight-normal">Connectez-vous</h1>
        <label for="inputEmail" class="sr-only">Nom d'utilisateur</label>
        <input type="text" id="username" name="username" class="form-control"  required autofocus />
        <br />
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Me Connecter</button>
        </form>

</div>
<?php
include_once("../bottom.php");
?>