<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Bienvenido!!</title>

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

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="<?=base_url()?>assets/css/sleek.css" />

  <!-- JAVASCRIPT -->
  <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/variables.js"></script>

  <!-- FAVICON -->
  <link href="<?=base_url()?>assets/img/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="<?=base_url()?>assets/plugins/nprogress/nprogress.js"></script>
</head>


  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
      
              <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="#">
                <svg
                  class="brand-icon"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                  height="33"
                  viewBox="0 0 30 33"
                >
                  <g fill="none" fill-rule="evenodd">
                    <path
                      class="logo-fill-blue"
                      fill="#7DBC00"
                      d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                    />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>
                <span class="brand-name">Jaime PETS</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">

                  <?php  
                  if ($rol == 1) {
                  ?>
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#usuarios"
                      aria-expanded="false" aria-controls="charts">
                      <i class="mdi mdi-account"></i>
                      <span class="nav-text">Administrador</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="usuarios"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                                             
                            <li >
                              <a class="sidenav-item-link" href="<?=base_url()?>welcome/empleadosView">
                                <span class="nav-text" style="text-transform:uppercase;">Empleados</span>   
                              </a>
                            </li>

                            <li >
                              <a class="sidenav-item-link" href="<?=base_url()?>welcome/serviciosView">
                                <span class="nav-text" style="text-transform:uppercase;">Servicios</span>
                              </a>
                            </li>

                            <li >
                              <a class="sidenav-item-link" href="#">
                                <span class="nav-text" style="text-transform:uppercase;">Articulos</span>
                              </a>
                            </li>

                      </div>
                    </ul>
                  </li>
                <?php }?>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="#">
                      <i class="mdi mdi-account"></i>
                      <span class="nav-text">Clientes</span> 
                    </a>
                  </li>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="#">
                      <i class="mdi mdi-account"></i>
                      <span class="nav-text">Reservas</span> 
                    </a>
                  </li>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="#">
                      <i class="mdi mdi-account"></i>
                      <span class="nav-text">Orden de trabajo</span> 
                    </a>
                  </li>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="#">
                      <i class="mdi mdi-account"></i>
                      <span class="nav-text">Ventas</span> 
                    </a>
                  </li>

                
              </ul>

            </div>

          </div>
        </aside>
<!-- ************************************************************************** -->
      <div class="page-wrapper ">
                  <!-- Header -->
          <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- search form -->
               <div class="search-form d-none d-lg-inline-block">
                <div class="input-group">
                 <!-- <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i class="mdi mdi-magnify"></i>
                  </button> -->
                  <input type="text" name="query" id="search-input" class="form-control" placeholder=""
                     autocomplete="off"  disabled="" />
                </div> 
                <div id="search-results-container">
                  <ul id="search-results"></ul>
                </div>
              </div> 

              <div class="navbar-right align-self-end ">
                <ul class="nav navbar-nav">


                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="<?=base_url()?>assets/img/user/user.png" class="user-image" alt="User Image" />
                      <span class="d-none d-lg-inline-block" style="text-transform:uppercase;"> <?=$nombre?> <?=$apellido1?> <?=$apellido2?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">

                      <!-- <li>
                        <a href="profile.html">
                          <i class="mdi mdi-account"></i> Perfil
                        </a>
                      </li>
                      <li>
                        <a href="email-inbox.html">
                          <i class="mdi mdi-email"></i> Mensajes
                        </a>
                      </li> -->

                      <li class="dropdown-footer">
                        <a href="<?=base_url()?>welcome/logout"> <i class="mdi mdi-logout" ></i> CERRRAR SESIÓN </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>
