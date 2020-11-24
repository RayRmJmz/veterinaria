<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link href="<?=base_url()?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Iniciar sesión</title>
  </head>
  <body>
    <header class="header"></header>
    <form class="form-signin" action="<?=base_url()?>welcome/login" method='post' accept-charset='UTF-8' role="form">
      <div class="text-center mb-4">
        <img class="mb-4 logo" src="assets\img\logo.png" alt="Logo">
      </div>
      <div class="form-label-group">
        <input name="usuario" type="text" id="inputUser" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Usuario</label>
      </div>
      <div class="form-label-group">
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Contraseña</label>
      </div>
      <button class="btn btn-lg btn-primary btn-block btn__login" type="submit">Iniciar Sesión</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
