<?php
  session_start();
  ob_start();

  if(!isset($_SESSION['cart'])){
    header('Location: shopping_cart.php');
    exit();
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


  <br><br><br><br>
  <!-- Payment Method - Debit/Credit -->
  <div class="container">
    <h1 class="about-h1 text-center mt-3">Apartar producto</h1>
    <div class="row justify-content-center mt-3">
				<div class="col-lg-8 col-md-12">
					<div class="table-responsive p-4">
						<table class="table text-center">
							<thead style="background-color: #EFEFEF;">
								<tr>
									<th class="product-num" scope="col">#</th>
									<th class="product-image"scope="col">Imagen</th>
									<th class="product-name" scope="col">Nombre</th>
									<th class="product-price" scope="col">Precio</th>
								</tr>
							</thead>
							<tbody>
                <?php
                  $total = 0;
                  if(isset($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $key => $value){
                      $total = $total + $value['precio_producto'];
                ?>
								<tr>
                  <td class="product-num"><?php echo ($key+1);?></td>
									<td class="product-image"><img src="uploads/<?php echo $value['imagen_producto'];?>" width="120px"></td>
									<td class="product-name"><?php echo $value['nombre_producto'];?></td>
									<td class="product-price">$<?php echo $value['precio_producto'];?></td>
								</tr>
							</tbody>
              <?php
                    }
                  }
              ?>
						</table>
					</div>
				</div>
      <div class="col-lg-4 col-md-6 mt-3">
        <!-- iniciar alerta -->
        <?php
          if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <strong>¡Alerta!</strong> Rellena todos los campos.
        </div>
        <?php
          }
        ?>


        <?php
          if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <strong>¡Error!</strong> No se pudo completar el apartado.
        </div>
        <?php
          }
        ?>

        <!-- fin alerta -->
      <div class="payment-info">
          <?php
            $value_iva = 16;
            $total_iva = $total * ($value_iva/100);
            $total_final = ($total * ($value_iva/100))+$total;
          ?>
          <form action="/php/reserveProceso.php" method="POST" class="payment-form">
            <label for="name" style="font-size: 20px;">Favor de llenar los campos para completar la reservación.</label>
            <hr>
            <label for="name" style="font-size: 18px;">Nombre</label>
            <input type="text" id="name" name="name_reserve" class="payment_data" placeholder="Ingresa tu nombre"/>
            <label for="email" style="font-size: 18px;">Correo electrónico</label>
            <input type="email" id="email" name="email_reserve" class="payment_data" placeholder="Ingresa tu correo electrónico"/>
            <label for="phone" style="font-size: 18px;">Teléfono</label>
            <input type="text" id="phone" name="phone_reserve" class="payment_data" placeholder="Ingresa tu teléfono" minlength="10" maxlength="10"/>
            <!-- -->
            <div id="payment-info">
              <div class="d-flex justify-content-between information"><span>Subtotal</span><span>$<?php echo $total;?></span></div>
              <p>
              <div class="d-flex justify-content-between information"><span>IVA</span><span>$<?php echo $total_iva;?></span></div>
              <p>
              <div class="d-flex justify-content-between information"><span><b>Total</b></span><span><b>$<?php echo $total_final;?></b></span></div>
              <p>
            </div>
            <!-- -->
            <button id="submit" class="button-pay" name="btn_reserve" type="submit">
              <div class="spinner hidden" id="spinner"></div>
              <span id="button-text">Apartar productos</span>
            </button>
            <br>
            <button id="cancel" class="button-cancel" type="button" onclick="location.href='../shopping_cart.php';">
              <span id="button-text">Cancelar</span>
            </button>
            <div id="payment-message" class="hidden"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
	<!-- end cart -->
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/b292d5edc4.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Sweetalert -->
    <script src="/js/alertas.js"></script>
    <!-- Stripe -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="/js/checkout.js" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
  </body>
</html>