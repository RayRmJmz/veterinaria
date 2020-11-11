<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css">


    <link href="<?=base_url()?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <title>Iniciar sesión</title>
  </head>

  <body class="bg-dark">
    
  <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Iniciar sesión</h5>


              <form class="form-signin" action="<?=base_url()?>welcome/login" method='post' accept-charset='UTF-8' role="form">
                <div class="form-label-group">
                  <input name="usuario" type="text" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
                  <label for="inputEmail">Usuario</label>
                </div>

                <div class="form-label-group">
                  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
                  <label for="inputPassword">Contraseña</label>
                </div>

                <!-- <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div> -->
                <button class="btn btn-lg btn-primary btn-block " type="submit">Aceptar</button>
                <hr class="my-4">
                
              </form>


            </div>
          </div>
        </div>
      </div>
    </div>

    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.slim.min.js"></script>

    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>