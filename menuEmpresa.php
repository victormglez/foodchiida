<?php
  session_start();

  if(!isset($_SESSION['id'])){
    header('Location: login.php');
  }elseif(isset($_SESSION['id'])){
    include_once "php/conexion.php";
    $id = $_SESSION['id'];

    //print_r($id);

    $sentencia = $bd -> query("SELECT * FROM productos WHERE idUser='$id';");
    $sentencia2 = $bd -> query("SELECT * FROM users WHERE idUser='$id';");
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
  <?php
        foreach($users as $name){
      ?>
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
                  <a href="cust-service.php" class="nav-link"><i class="fas fa-headset" style="font-size: 20px" color="white"></i></a>
              </li>
              <li class="nav-item">
                <a href="/php/logoutProceso.php" class="nav-link" name="btn_submit_logout">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
              </li>
              <?php
                }
              ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navegation Bar-->



<!-- Menu Empresa -->
<div class="container">
    <?php
      foreach($users as $name){
    ?>
  <h1 class="reducir-h1 text-center mt-5 pt-5">¡Bienvenido <?php echo $name->companyName;?>!</h1> 
  <?php
        }
      ?>
  <div class="row justify-content-center">
    <div class="col-lg-4 col-md-12"> <!--col-md-8 mt-3-->
      <!-- inicar alerta -->
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
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Correcto!</strong> El producto fue registrado.
      </div>
      <?php
        }
      ?>

      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Error!</strong> No se pudo agregar el producto.
      </div>
      <?php
        }
      ?>

      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Editado!</strong> El producto fue actualizado. 
      </div>
      <?php
        }
      ?>

      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Eliminado!</strong> El producto fue eliminado.
      </div>
      <?php
        }
      ?>

      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error-2'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Error!</strong> No se pudo actualizar el producto.
      </div>
      <?php
        }
      ?>

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

      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error-delete'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>¡Error!</strong> No se pudo eliminar el producto.
      </div>
      <?php
        }
      ?>

      <!-- fin alerta -->
      <div class="card">
        <form action="/php/regProducto.php" class="container-form row g-3 mt-4 justify-content-center" method="post" enctype="multipart/form-data">
          <div class="col-md-10">
            <label class="form-label">Nombre Producto</label>
            <input type="text" id="nameProducto" name="nameProducto" class="form-control" placeholder="Nombre Producto" required>
          </div>
          <div class="col-md-10">
            <label class="form-label">Descripción</label>
            <textarea type = "text" id="descrProducto" name="descrProducto" class="form-control" placeholder="Descripción" cols="10" rows="3" required></textarea>
          </div>
          <div class="col-md-10">
            <label class="form-label">Precio</label>
            <input type="number" min="0.00" max="10000.00" step="0.01" id="priceProducto" name="priceProducto" class="form-control" placeholder="$0.00" required>
          </div>
          <div class="col-md-10">
            <label class="form-label">Imagen</label>
            <br>
            <input type="file" id="imgProducto" name="imgProducto" class="form-control-file" accept="image/png, image/jpg, image/jpeg" required>
          </div>
          <div class="col-md-10 text-center">
            <button type="submit" class="btn-form-producto btn-lg" id="btn_submit_producto" name="btn_submit_producto">Agregar producto</button>
            <br><br>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-8 col-md-12 mt-4">
      <div class="table-responsive p-4">
        <table class="table text-center">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre Producto</th>
              <th scope="col">Descripción</th>
              <th scope="col">Precio</th>
              <th scope="col">Imagen</th>
              <th scope="col" colspan="2">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($product as $dato){
            ?>
            <tr>
              <td scope="row" ><?php echo $dato->idProduct;?></td>
              <td><?php echo $dato->nameProduct;?></td>
              <td><?php echo $dato->descriptionProduct;?></td>
              <td><p>$<?php echo $dato->priceProduct;?></p></td>
              <td><img src="uploads/<?php echo $dato->photoProduct;?>" width="120px"></td>
              <td><a href="editarProducto_Empresa.php?idProducto=<?php echo $dato->idProduct;?>"><i class="fas fa-solid fa-pen" data-toggle="tooltip" data-placement="right" title="Editar" style="font-size: 20px; color: var(--bs-orange-2);"></i></a></td>
              <td><a onclick="return confirm('¿Estas seguro de eliminar?');" href="/php/deleteProceso.php?idProducto=<?php echo $dato->idProduct;?>"><i class="fas fa-solid fa-trash" style="font-size: 20px; color: var(--bs-orange-2);" data-toggle="tooltip" data-placement="right" title="Eliminar"></i></a></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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