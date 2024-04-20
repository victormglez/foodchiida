<?php
    session_start();

    if(!isset($_SESSION['id'])){
      header('Location: login.php');
    }elseif(isset($_SESSION['id'])){
      include_once "php/conexion.php";
      $id = $_SESSION['id'];

      //print_r($id);

      $sentencia = $bd -> query("SELECT * FROM productos WHERE id_usuario='$id';");
      $sentencia2 = $bd -> query("SELECT * FROM usuarios WHERE id_usuario='$id';");

      //$sentencia = $bd -> query("SELECT * FROM productos WHERE id_usuarios= '';");
      $product = $sentencia->fetchAll(PDO::FETCH_OBJ);
      $users = $sentencia2->fetchAll(PDO::FETCH_OBJ);
    } else {
      echo "Error en el sistema";
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
      <link rel="icon" href="/img/logo_chiquito4.png" type="image/png" sizes="16x16">

      <title>FOODCHIIDA</title>
    </head>

    <body>
        
      <!-- Navegation Bar-->
      <nav class="navbar navbar-expand-sm navbar-light fixed-top navbar-main">
        <div class="container-fluid">
          <i class="navbar-brand"><img src="/img/logo_fin2.png" alt="logo"></i>
          <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse text-center" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="menuEmpresa.php" class="nav-link"><i class="fas fa-home " style="font-size: 20px" color="white"></i></a>
                </li>
                <li class="nav-item">
                  <a href="/php/logoutProceso.php" class="nav-link" name="btn_submit_logout">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Navegation Bar-->



  <!-- Container -->
  <div class="container">
    <h1 class="text-center mt-5 pt-5">¿Necesitas ayuda? ¡Estamos aquí para ayudarte!</h1><br><br>
        <div class="row justify-content-center">
          <div class="col-md-7 mt-2 p-2">
            <div class="text-center-left">
              <i class="fas fa-mobile" style="font-size: 30px; color: var(--bs-orange-2);" >  Atención por WhatsApp </i>
              <br><br> <h4>33 3140 6120</h4>
              <p class="about-text" style="font-size: 20px;"> <br>Disponible las 24 horas los 365 días del año.<br>
                          Horarios de atención personalizada:<br>
                          lunes a sábado de 8:00 a 21:00 hrs (Horario del centro de México).</p> 
                          <br><br><br>
              <i class="fas fa-phone " style="font-size: 30px;  color: var(--bs-orange-2);">  Atención telefónica </i>
              <br><br> <h4>800 1010 189</h4>
              <p class="about-text" style="font-size: 20px;"> <br>Disponible las 24 horas los 365 días del año.<br>
              Para atención de un ejecutivo disponible de lunes a sábado de 7:00 <br>
              a 00:00 horas (Horario del centro de México).</p> 
              <br><br><br>
              <i class="fas fa-envelope " style="font-size: 30px; color: var(--bs-orange-2);">  Correo electrónico</i>
              <br><br> <h4>admin@foodchiida.com</h4>
              <p class="about-text" style="font-size: 20px;"> <br>Para la recepción de consultas y quejas disponible durante las 24 <br>
              horas del día, todos los días del año. Para atención de un ejecutivo, <br>
              disponible de lunes a sábado de 8:00 am a 21:00 pm</p> 
              <br><br><br>
            </div>
            
          </div>

          <div class="col-md-4 mt-4 p-4">
            <div class="text-center-right">
              <div class="about-img">
                <br>
                <img src="/img/visión.png" alt="Vision" class="img-fluid" width="400px">
              </div>  
            </div>
          </div>
        </div>
    </div>


  <!------------->

  <br><br><br><br>

    <!-- Footer -->
    <footer class="text-center text-white">
      <div class="container-footer">
        <hr class="my-3" />
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: #ff725e;">
        © 2022 Copyright;
        <a class="text-white" href="index.php">Foodchiida</a>
      </div>
      <!-- Copyright -->
    </footer>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Sweetalert -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
  </html>