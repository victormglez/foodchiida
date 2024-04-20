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


  <!-- Formas de reducir -->
  <div class="container-fluid mt-5 pt-5">
    <a href= "reduce.php"><i class="fas fa-solid fa-arrow-left" style="font-size: 40px; color: var(--bs-orange-2); margin: 6px 40px;"></i></a> 
    <!--<h1 class="reducir-h1 text-center"><a href="reduce.html" style="text-align: left;"><i class="fas fa-arrow-left" style="color: var(--bs-orange-2);"></i></a>Formas de reducir en casa</h1>-->
    <h1 class="reducir-h1 text-center">Formas de reducir en casa</h1>
    <div class="content-box">
        <div class="row justify-content-center">
          <div class="col-md-8 mt-4">
            <div class="container-fluid">
              <p class="reducir-text" style="font-size: 20px;">Reducir el desperdicio de alimentos en tu hogar es más fácil de lo que crees. A continuación, te dejamos algunos tips que puedes implementar en tu casa:</p>
              <ol class="list-group p-4">
                <li style="padding-bottom: 1.5%; font-size: 20px;">Planifica tu menú mensual.</li>
                <li style="padding-bottom: 1.5%; font-size: 20px;">Cuando vayas al supermercado haz una lista de compra con los productos necesarios.</li>
                <li style="padding-bottom: 1.5%; font-size: 20px;">Almacena adecuadamente los alimentos.</li>
                <li style="padding-bottom: 1.5%; font-size: 20px;">Ten en cuenta la diferencia entre la fecha de caducidad y la de consumo preferente.</li>
                <li style="padding-bottom: 1.5%; font-size: 20px;">En el refrigerador, coloca los alimentos más viejos delante de los nuevos.</li>
                <li style="padding-bottom: 1.5%; font-size: 20px;">Aprovecha las sobras.</li>
                <li style="padding-bottom: 1.5%; font-size: 20px;">¡Haz composta en casa!</li>
                <li><class style="font-size: 20px;">Dona el excedente.</li>
              </ol>
              <p class="reducir-text" style="font-size: 20px;">Y el más importante...</p>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-4">
        <p class="text-center" style="font-size: 25px;">¡Deja los prejuicios a un lado!</p>
        <br>
      </div>
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
      © 2022 Copyright;
      <a class="text-white" href="index.php">Foodchiida</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Sweetalert -->
    <script src="/js/alertas.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>