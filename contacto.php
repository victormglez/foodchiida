<?php

  session_start();

    if (isset($_POST['btn-contacto'])) {
        if(empty($_POST['nameContacto']) || empty($_POST['lastnameContacto']) || empty($_POST['emailContacto']) || empty($_POST['msgContacto'])){
            header('Location: contacto.php?mensaje=falta');
            exit();
        } else {
            header('Location: contacto.php?mensaje=enviado');
        }
    }

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
    <link rel="stylesheet" href="/node_modules/sweetalert2/dist/sweetalert2.min.css">
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


  <!-- Contacto -->
  <br>
  <div class="container mt-5 pt-5">
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
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'enviado'){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong>¡Gracias!</strong> Tu mensaje ha sido enviado con éxito. 
    </div>
    <?php
      }
    ?>

    <!-- fin alerta -->
    <h1 class="contact-h1">CONTÁCTANOS</h1>
    <form action="" class="container-form row g-3 justify-content-center" method="post" id="myForm" name="FormConctacto">
      <!-- Honeypot -->
      <input type="text" name="_honey" style="display: none;">

      <!-- Disable Captcha -->
      <input type="hidden" name="_captcha" value="true">

      <!-- Disable Thanks-->
      <input type="hidden" name="_next" value="https://foodchiida.com/contacto.php">
      
      <div class="col-md-5">
        <label for="Nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nameContacto" name="nameContacto" required>
      </div>
      <div class="col-md-5">
        <label for="Apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="lastnameContacto" name="lastnameContacto" required>
      </div>
      <div class="col-md-5">
        <label for="Correo" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="emailContacto" name="emailContacto" required>
      </div>
      <div class="col-md-5">
        <label for="Telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="phoneContacto" name="phoneContacto">
      </div>
      <div class="col-md-10">
        <label for="Mensaje" class="form-label">Mensaje</label>
        <textarea id="msgContacto" name="msgContacto" cols="30" rows="4" class="form-control" required></textarea>
      </div>
      <div class="col-md-3">
       <!--<div class="justify-content-center text-center g-recaptcha" data-sitekey="6LeFl1AeAAAAAP1fcapeAgjvp4g1A9Gz6nZGzd3A"></div>-->
        <button type="submit" class="btn-form-log btn-lg finalpost" style="font-size:22px" id="btn-contacto" name="btn-contacto">Enviar</button>
      </div>
    </form>  
  </div>


  <br><br><br><br><br><br><br><br><br>

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