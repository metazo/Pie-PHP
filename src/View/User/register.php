<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>S'inscrire</title>
</head>

<body style="background: url(/webroot/assets/thumb-1920-671281.jpeg);">
  <br><br>
  <form method="POST" class="container" action="/index.php">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Prénom</label>
      <input type="text" class="form-control" name="firstname">

    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nom</label>
      <input type="text" class="form-control" name="lastname">

    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Date de naissance</label>
      <input type="date" class="form-control" name="birthdate">

    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Ville</label>
      <input type="text" class="form-control" name="city">
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Code Postal</label>
      <input type="text" class="form-control" name="zip_code">

    </div>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" class="form-control" name="email">

    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" name="mdp">
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Me le rappeler ?</label>
    </div>
    <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
  </form>
</body>

</html>