<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/style_1.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="icon" href="/img/logo_chiquito4.png" type="image/png" sizes="16x16">

    <title>FOODCHIIDA</title>
  </head>

  <body>
    <!-- Navegation Bar-->
    <nav class="navbar navbar-expand-sm navbar-light fixed-top navbar-main">
      <div class="container-fluid">
        <a href="index.php" class="navbar-brand"><img src="/img/logo_fin2.png" alt="logo"></a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarMenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="index.php" class="nav-link"><i class="fas fa-home"></i></a>
            </li>
            <li class="nav-item">
              <a href="reduce.php" class="nav-link">Reduce</a>
            </li>
            <li class="nav-item">
              <a href="acerca.php" class="nav-link">Acerca</a>
            </li>
            <li class="nav-item">
              <a href="contacto.php" class="nav-link">Contacto</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link"><i class="fas fa-user"></i></a>
              <!--<a href="/php/veriLog.php" class="nav-link"><i class="fas fa-user"></i></a>-->
            </li>
            <li class="nav-item">
              <?php
                $count = 0;
                if(isset($_SESSION['cart'])){
                  $count = count($_SESSION['cart']);
                }
              ?>
              <a href="shopping_cart.php" class="nav-link"><i class="fas fa-shopping-cart">(<?php echo $count; ?>)</i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
     <!-- Navegation Bar-->

  <br><br><br><br>
  <!-- Registro -->
  <div class="container mt-3 pt-3">  
    <!-- iniciar alerta -->
    <?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
    ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Error!</strong> Rellena todos los campos.
      </div>
    <?php
      }
    ?>

    <?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
    ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Error!</strong> Las contraseñas no son iguales.
      </div>
    <?php
      }
    ?>

    <?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error-2'){
    ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Error!</strong> No se pudo registrar la empresa, intente de nuevo.
      </div>
    <?php
      }
    ?>

    <?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'correo'){
    ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Error!</strong> El correo ya existe. 
      </div>
    <?php
      }
    ?>

  <!-- fin alerta -->
    <h1 class="registro-h1">Registro</h1>
    <form action="/php/regEmpresa.php" class="container-form row g-3 justify-content-center" method="post" style="max-width: 1080px;margin: auto;" name="regForm">
      <div class="col-md-10">
        <label class="form-label">Nombre Comercial</label>
        <input type="text" class="form-control" id="nameCompany" name="nameCompany" placeholder="Nombre"/>
      </div>
      <div class="col-md-10">
        <label class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="emailCompany" name="emailCompany" placeholder="Correo electrónico"/>
      </div>
      <div class="col-md-10">
        <label class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="passCompany" for="passCompany" name="passCompany" placeholder="Contraseña"/>
      </div>
      <div class="col-md-10">
        <label class="form-label">Confirmar contraseña</label>
        <input type="password" class="form-control" id="confirm_passCompany" for="confirm_passCompany" name="confirm_passCompany" placeholder="Contraseña"/>
      </div>
      <div class="col-md-10">
        <label class="form-label">Dirección</label>
        <input type="text" class="form-control" id="ubiCompany" for="ubiCompany" name="ubiCompany" placeholder="Dirección"/>
      </div>
      <div class="col-md-10">
        <label class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="phoneCompany" for="phoneCompany" name="phoneCompany" placeholder="Teléfono"/>
      </div>
      <div class="col-md-3">
        <button  type="submit" id="btn_submit_user" name="btn_submit_user" class="btn-form-log btn-lg">Registrar</button>
      </div>
    </form>
  </div>

  <br><br><br><br><br><br>

  <!-- Footer -->
  <footer class="text-center text-white">
    <div class="container-footer">
      <!-- Section: Links -->
      <section class="mt-2">
        <!-- Grid row-->
        <div class="row text-center d-flex justify-content-center pt-4">
          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase">
              <a href="terminos.php" class="text-white">Términos y Condiciones</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="privacidad.php" class="text-white">Política de Privacidad</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="contacto.php" class="text-white">Contacto</a>
            </h6>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-3" />
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #ff725e;">
    © <?php echo date('Y');?> Copyright;
      <a class="text-white" href="index.php">Foodchiida</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/b292d5edc4.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Sweetalert -->
    <script src="/js/alertas.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>