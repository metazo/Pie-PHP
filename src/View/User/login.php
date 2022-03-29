<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/webroot/css/login.css">
  <title>Se connecter</title>
</head>

<body>
  <div class="container">
    <div class="header">
    <h1>Connectez-vous</h1>
    </div>
    <form action="#" method="post" action="login">
      <div class="form-group">
        <input type="email" name="email" id="username" required class="inputField" autocomplete="off">
        <label for="username">Email</label>
      </div>
      <div class="form-group">
        <input type="password" name="mdp" id="password" required class="inputField" autocomplete="off">
        <label for="password">Mot de passe</label>
    
       
      </div>
      <div style="color: white;"><input type="checkbox" onclick="myFunction()" > Afficher le mot de passe</div>
     <br>
      <button type="submit" name="valide" class="submitButton">Se connecter</button>
    </form>
    <div class="footer">
      <a href="#">Mot de passe oublié ?</a>
      <br>
      
      <br>
      <a href="./register.php">Pas encore de compte ? Inscrivez-vous</a>
    </div>
  </div>

  <script src="/webroot/js/login.js"></script>
</body>

</html>