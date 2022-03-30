<?php   
    require_once APP_ROOT . '/Views/Include/Layout/authentification/header.php';
?>
<form class="form-signin" id="common-form-login" action="/login" method="POST">
  
  
  <div class="form-label-group mt-4 message-login">
      
    </div>
  <div class="form-label-group">
    <input type="text" id="inputEmail" class="form-control require" name="username" placeholder="Nom d'utilisateur ou email" />
    <label for="inputEmail">Nom d'utilisateur ou email</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword" class="form-control require" name="password" placeholder="Mot de passe" />
    <label for="inputPassword">Mot de passe</label>
  </div>

  <button class="btn btn-lg btn-primary btn-block form-button" type="submit" rel="login">Se connecter</button>
  <hr class="mb-3">
  <p class="text-center">  <a href="/signup">S'inscrire <i class="fa fa-user-plus "></i></a></p>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2021-2022</p>
</form>
<?php require_once APP_ROOT . '/Views/Include/Layout/authentification/footer.php'; ?>

