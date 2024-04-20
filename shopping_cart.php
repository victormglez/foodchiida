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
  <!-- Shopping Cart -->
  <div class="container">
    <h1 class="about-h1 text-center mt-3">Carrito de compras</h1>
    <!-- iniciar alerta -->
    <?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'vacio'){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong>¡Error!</strong> Seleccione una opción.
    </div>
    <?php
    }
    ?>

  <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'opcion'){
  ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>¡Error!</strong> Su carrito de compra se encuentra vacio.
  </div>
  <?php
    }
  ?>

  <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
  ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>¡Eliminado!</strong> Producto eliminado. 
  </div>
  <?php
    }
  ?>
    <!-- fin alerta -->
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
                  <th class="product-remove" scope="col"></th>
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
                  <td class="product-remove">
                    <form action="/php/shoppingProceso.php" method="POST">
                      <button name="remove_producto" class="btn btn-sm btn-outline-danger">Eliminar</button>
                      <input type="hidden" name="nombre_producto" value="<?php echo $value['nombre_producto'];?>">
                    </form>
                  </td>
								</tr>
							</tbody>
              <?php
                    }
                  }
              ?>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="table-responsive p-4">
						<table class="table">
							<thead style="background-color: #EFEFEF;">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Precio</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
                  <?php
                    $value_iva = 16;
                    $total_iva = $total * ($value_iva/100);
                    $total_final = ($total * ($value_iva/100))+$total;
                  ?>
									<td><strong>Subtotal: </strong></td>
									<td>$<?php echo $total;?></td>
								</tr>
                <tr class="total-data">
									<td><strong>IVA: </strong></td>
									<td>$<?php echo $total_iva; ?></td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>$<?php echo $total_final; ?></td>
								</tr>
							</tbody>
						</table>
            <br>
            <div>
              <h4>Seleccione su metodo de pago:</h4>
              <form action="/php/shoppingProceso.php" method="POST">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="credit_method">
                  <label class="form-check-label" for="flexRadioDefault1" style="font-size: 19px;">Pagar con Tarjeta Bancaria</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="reserve_method">
                  <label class="form-check-label" for="flexRadioDefault2" style="font-size: 19px;">Apartar producto</label>
                </div>
                <br>
                <button class="btn btn-primary btn-block" name="payment_method" style="font-size: 18px;">Siguiente</button>
              </form>
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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

    <!-- Stripe -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="/js/checkout.js" defer></script>
  </body>
</html>