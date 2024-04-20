<?php
  session_start();
  if(!isset($_GET['idProducto'])){
    header('Location: menuEmpresa.php?mensaje=error');
    exit();
  }

  if(!isset($_SESSION['id'])){
    header('Location: login.php');
  }elseif(isset($_SESSION['id'])){
    include_once 'php/conexion.php';
    $idProducto = $_GET['idProducto'];
    $sentencia = $bd ->prepare("SELECT * FROM productos WHERE idProduct = ?;");
    $sentencia->execute([$idProducto]);
    $product = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($product);
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
                <!--<a href="index.php" class="nav-link" name="btn_submit_logout">Cerrar sesión</a>-->
              </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navegation Bar-->


<!-- Menu Empresa -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-5">
      <!-- inicar alerta -->      
      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error-img'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Error!</strong> Problemas en la imagen.
      </div>
      <?php
        }
      ?>


      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error-img-2'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Error!</strong> El tamaño del archivo es muy grande.
      </div>
      <?php
        }
      ?>

      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error-img-3'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Error!</strong> No puede subir ese tipo de archivo.
      </div>
      <?php
        }
      ?>
      <!-- fin alerta -->

    <div class="card">
        <div class="card-header">
          Editar producto
        </div>
        <form action="/php/editProceso.php" class="container-form row g-3 mt-4 justify-content-center" method="post" enctype="multipart/form-data">
          <div class="col-md-10">
            <label class="form-label">Nombre Producto</label>
            <input type="text" id="nameProducto" name="nameProducto" class="form-control" placeholder="Nombre Producto" required value="<?php echo $product->nameProduct;?>">
          </div>
          <div class="col-md-10">
            <label class="form-label">Descripción</label>
            <input type = "text" id="descrProducto" name="descrProducto" class="form-control" cols="10" rows="3" required value="<?php echo $product->descriptionProduct;?>">
          </div>
          <div class="col-md-10">
            <label class="form-label">Precio</label>
            <input type="number" min="0.00" max="10000.00" step="0.01" id="priceProducto" name="priceProducto" class="form-control" placeholder="0.00" required value="<?php echo $product->priceProduct;?>">
          </div>
          <div class="col-md-10">
            <label class="form-label">Imagen</label>
            <br>
            <input type="file" id="imgProducto" name="imgProducto" class="form-control-file" accept="image/png, image/jpg, image/jpeg" required value="<?php echo $product->photoProduct;?>">
          </div>
          <div class="col-md-3 text-center">
            <input type="hidden" name="idProducto" value="<?php echo $product->idProduct;?>"> 
            <button type="submit" class="btn-form-producto btn-lg" id="btn_edit_producto" name="btn_edit_producto">Editar producto</button>
            <button type="button" class="btn-form-producto btn-lg" id="btn_edit_producto" name="btn_edit_producto" onclick="location.href='../menuEmpresa.php';">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

<br><br><br><br><br><br><br><br><br>

  <!-- Footer -->
  <footer class="text-center text-white">
    <div class="container-footer">
      <hr class="my-3" />
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #ff725e;">
      © 2022 Copyright;
      <a class="text-white" href="index.html">Foodchiida</a>
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