<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jaime's Pets</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="<?=base_url()?>assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/head.css">

    <!-- FAVICON -->
    <link href="<?=base_url()?>assets/img/favicon.png" rel="shortcut icon"/>

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="<?=base_url()?>assets/css/sleek.css" />

    <!-- JAVASCRIPT -->
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/variables.js"></script>
    <script src="<?=base_url()?>assets/plugins/nprogress/nprogress.js"></script>
  </head>

  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>
    <div class="mobile-sticky-body-overlay"></div>
    <header style="text-transform:uppercase;" >
      <nav class="navbar navbar-expand-lg navbar-light navbar-dark main-nav">
        <ul class="navbar-nav mr-auto"></ul>
        <ul navbar-nav>
          <li class="dropdown user-menu" >
            <button href="#" class="dropdown-toggle nav-link nav-arrow_down" data-toggle="dropdown">
              <img src="<?=base_url()?>assets/img/user/user1.png" class="user-image user" alt="User Image" />
              <span class="d-none d-lg-inline-block username" style="text-transform:uppercase;" > <?=$nombre?> <?=$apellido1?></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown">
                <a href="<?=base_url()?>welcome/logout"> <i class="mdi mdi-logout" ></i> Cerrar sesión</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-light second-nav">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse second-nav_box" id="navbarNavDropdown">
          <img src="<?=base_url()?>assets/img/logo.png" class="img_logo" alt="Logo">
          <ul class="navbar-nav" >
            <?php if ($rol == 1) { ?>
              <li class="btn-group dropdown">
                <a class="nav-link dropdown-toggle admin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Administrador
                </a>
                <div class="dropdown-menu">
                  <!-- Dropdown menu links -->
                  <a class="dropdown-item" href="<?=base_url()?>welcome/empleados">Empleados</a>
                  <a class="dropdown-item" href="<?=base_url()?>welcome/servicios">Servicios</a>
                  <a class="dropdown-item" href="<?=base_url()?>welcome/articulos">Artículos</a>
                </div>
              </li>
            <?php }?>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>welcome/clientes">Clientes</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Reservas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Orden de trabajo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Ventas</a>
            </li>
            <?php if ($rol == 1) { ?>
              <li class="btn-group dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dashboard
                  </a>
                  <div class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <a class="dropdown-item" href="#">Ventas</a>
                    <a class="dropdown-item" href="#">Productos</a>
                  </div>
              </li>
            <?php }?>
          </ul>
        </div>
      </nav>
    </header>


