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


  <!-- Maneras de Reducir -->
  <div class="container">
    <h1 class="reducir-h1 text-center mt-5 pt-5">TIPS PARA REDUCIR</h1>
    <div class="row g-3 text-center justify-content-center">
      <div class="col-12 col-md-6 col-lg-4 mt-4">
      <div class="card shadow  text-center">
          <img src="/img/tips.jpg" alt="Formas de reducir en casa" class="card-img-top" >
          <div class="card-body">
            <h3 class="card-title">Formas de reducir el desperdicio desde casa</h3>
            <br>
            <p class="card-text" style="font-size: 20px;">Aquí te dejamos algunos consejos para convertirte en un experto y poder aportar tu granito de arena.</p>
            <a href="reducir-formas.php" class="about-more" style="font-size: 20px;">Leer más</a>
          </div>
        </div> 
      </div>
      <div class="col-12 col-md-6 col-lg-4 mt-4">
      <div class="card shadow  text-center">
          <img src="/img/refrigerar.jpg" alt="¿Cómo refigerar tus alimentos?" class="card-img-top">
          <div class="card-body">
            <h3 class="card-title" >¿Cómo refigerar tus alimentos?</h3>
            <br>
            <p class="card-text" style="font-size: 20px;">Te dejamos algunos consejos para mantener tus alimentos en mejor estado por más tiempo.</p>
            
            <a href="reducir-refrigerar.php" class="about-more" style="font-size: 20px;">Leer más</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mt-4">
      <div class="card shadow  text-center">
          <img src="/img/composta.jpg" alt="¡Haz tu propia composta!" class="card-img-top">
          <div class="card-body">
            <h3 class="card-title">Aprende a hacer tu propia composta!</h3>
            <br>
            <p class="card-text" style="font-size: 20px;">Aquí te dejamos un pequeño tutorial para hacer aprender a hacer composta con materiales comunes.</p>
            <a href="reducir-composta.php" class="about-more" style="font-size: 20px;">Leer más</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mt-4">
      <div class="card shadow  text-center">
          <img src="/img/caducidad.jpg" alt="Fecha de caducidad vs fecha de consumo preferente" class="card-img-top">
          <div class="card-body">
            <h3 class="card-title">Fecha de caducidad vs fecha de consumo preferente</h3>
            <p class="card-text" style="font-size: 20px;">¿Conoces la diferencia entre estas dos fechas? Después de leer este artículo será muy sencillo diferenciarlas.</p>
            <a href="reducir-fechas.php" class="about-more" style="font-size: 20px;">Leer más</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mt-4">
      <div class="card shadow  text-center">
          <img src="/img/super.jpg" alt="Hacer el super inteligentemente" class="card-img-top">
          <div class="card-body">
            <h3 class="card-title">Hacer el super de forma inteligente</h3>
            <p class="card-text" style="font-size: 20px;">Te dejamos algunos tips y consejos para que después de hacer el mandado no desperdicies comida.</p>
            <a href="reducir-super.php" class="about-more" style="font-size: 20px;">Leer más</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br><br>

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
        © 2022 Copyright;
        <a class="text-white" href="index.php">Foodchiida</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
      -->

      <!-- Sweetalert -->
      <script src="/js/alertas.js"></script>

      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
  </html>