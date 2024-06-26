<?php
  session_start();
  include_once "php/conexion.php";
  $sentencia = $bd -> query("SELECT * FROM productos ORDER BY idProduct DESC;");
  $product = $sentencia->fetchAll(PDO::FETCH_OBJ);
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

<!-- Carousel -->
<div id="carouselSponsor" class="carousel slide carousel-fade mt-4" data-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselSponsor" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselSponsor" data-bs-slide-to="1" aria-current="true" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselSponsor" data-bs-slide-to="2" aria-current="true" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 h-100" src="/img/publicidad_1.png" alt="">
      <div class="carousel-caption">
        <h5 class="carousel-text">Ingresa a nuestra página web...</h5>
      </div>
    </div>
    <div class="carousel-item">
        <img class="d-block w-100 h-100" src="/img/publicidad_2.png" alt="">
      <div class="carousel-caption">
        <h5 class="carousel-text">Ingresa a nuestra página web..</h5>
      </div>
    </div>
    <div class="carousel-item">
        <img class="d-block w-100 h-100" src="/img/publicidad_3.png" alt="">
      <div class="carousel-caption">
        <h5 class="carousel-text">Ingresa a nuestra página web..</h5>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselSponsor" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselSponsor" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Productos -->
<div class="container mt-4">
  <div class="row">
    <?php
      foreach($product as $dato){
        $id_user = $dato-> idUser;
    ?>
    <div class="col-md-4">
      <?php
          $sentencia2 = $bd -> query("SELECT * FROM users WHERE idUser LIKE $id_user;");
          $user = $sentencia2->fetchAll(PDO::FETCH_OBJ);
      ?>
      <form action="/php/shoppingProceso.php" method="POST">
        <div class="card shadow  text-center">
          <img class="card-img-top img-fluid" src="uploads/<?php echo $dato->photoProduct;?>">
          <div class="card-body">
            <h2 class="card-title text-center"><?php echo $dato->nameProduct;?></h2>   
            <p class="card-title text-center"><?php echo $dato->descriptionProduct;?></p>
            <h3 class="card-title text-center"><p>$<?php echo $dato->priceProduct;?></h3>
              <?php
                foreach($user as $datos){
              ?>
                <button class="accordion btn btn-primary my-3" type ="button">Información del vendedor <i class="fas fa-caret-down"></i></button>
                  <div class="panel-collapse collapse">
                    <h5>Vendedor: <?php echo $datos->companyName;?></h5>
                    <h5>Dirección: <?php echo $datos->companyDire;?></h5>
                    <h5>Correo: <?php echo $datos->companyMail;?></h5>
                    <h5>Teléfono: <?php echo $datos->companyPhone;?></h5>
                  </div>
              <?php
                }
              ?>
                <button class="btn btn-warning my-3" type="submit" name="add_to_cart">Agregar al carrito<i class="fas fa-shopping-cart"></i></button>
                <input type="hidden" name="nombre_producto" value="<?php echo $dato->nameProduct;?>">
                <input type="hidden" name="precio_producto" value="<?php echo $dato->priceProduct;?>">
                <input type="hidden" name="imagen_producto" value="<?php echo $dato->photoProduct;?>">
                <input type="hidden" name="ubicacion_producto" value="<?php echo $datos->companyDire;?>">
            </div>
          </div>
        </form>
      </div>
      <?php
      }
    ?>
    </div>
  </div>
</div>

<br><br><br><br><br><br><br>


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
    <script src="/js/accordion.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>