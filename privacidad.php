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


  <!-- Términos y condiciones -->
<div id="acerca-1">
  <h1 class="about-h1 text-center mt-5 pt-5">Política de Privacidad</h1>
  <div class="content-box-lg">
      <div class="row justify-content-center">
        <div class="col-md-9 mt-4">
          <div class="about-item">
            <p class="about-text">
              <b>POLÍTICA DE PRIVACIDAD Y PROTECCIÓN DE DATOS.</b>
              <br><br> De conformidad con lo establecido en la Ley Federal de Protección de Datos Personales en Posesión de Particulares, el TITULAR se compromete a adoptar las medidas necesarias que estén a su alcance para asegurar la privacidad de los datos personales recabados de forma que se garantice su seguridad, se evite su alteración, pérdida o tratamiento no autorizado.
              <br><br>Además, a efecto de dar cumplimiento a lo establecido en la Ley Federal de Protección de Datos Personales en Posesión de Particulares, todo dato personal que sea recabado a través del SITIO WEB, será tratado de conformidad con los principios de licitud, calidad, finalidad, lealtad, y responsabilidad. Todo tratamiento de datos personales quedará sujeto al consentimiento de su titular. En todo caso, la utilización de datos financieros o patrimoniales, requerirán de autorización expresa de sus titulares, no obstante, esta podrá darse a través del propio SITIO WEB utilizando los mecanismos habilitados para tal efecto, y en todo caso se dará la mayor diligencia y cuidado a este tipo de datos. Lo mismo ocurrirá en el caso de datos personales sensibles, considerando por estos aquellos que debido a una utilización indebida puedan dar origen a discriminación o su divulgación conlleve un riesgo para el titular.
              <br><br>En todo momento se procurará que los datos personales contenidos en las bases de datos o archivos que en su caso se utilicen, sean pertinentes, correctos y actualizados para los fines para los cuales fueron recabados.
              <br><br>Foodchiida se reserva el derecho a modificar su Política de Privacidad, de acuerdo a sus necesidades o derivado de algún cambio en la legislación. El acceso o utilización del SITIO WEB después de dichos cambios, implicará la aceptación de estos cambios.
              <br><br>Por otra parte, el acceso al SITIO WEB puede implicar la utilización de cookies, las cuales, son pequeñas cantidades de información que se almacenan en el navegador utilizado por el USUARIO. Las cookies facilitan la navegación, la hacen más amigable, y no dañan el dispositivo de navegación, para ello, pueden recabar información para ingresar al SITIO WEB, almacenar las preferencias del USUARIO, así como la interacción que este tenga con el SITIO WEB, como por ejemplo: la fecha y hora en la que se accede al SITIO WEB, el tiempo que se ha hecho uso de este, los sitios visitados antes y después del mismo, el número de páginas visitadas, la dirección IP de la cual accede el usuario, la frecuencia de visitas, etc.
              <br><br>Este tipo de información será utilizada para mejorar el SITIO WEB, detectar errores, y posibles necesidades que el USUARIO pueda tener, lo anterior a efecto de ofrecer a los USUARIOS servicios y contenidos de mejor calidad. En todo caso, la información que se recopile será anónima y no se identificará a usuarios individuales.
              <br><br>En caso de que el USUARIO no desee que se recopile este tipo de información deberá deshabilitar, rechazar, restringir y/o eliminar el uso de cookies en su navegador de internet. Los procedimientos para realizar estas acciones pueden diferir de un navegador a otro; en consecuencia, se sugiere revisar las instrucciones facilitadas por el desarrollador del navegador. En el supuesto de que rechace el uso de cookies (total o parcialmente) el USUARIO podrá continuar haciendo uso del SITIO WEB, aunque podrían quedar deshabilitadas algunas de las funciones del mismo.
              <br><br>Es posible que en el futuro estas políticas respecto a las cookies cambien o se actualicen, por ello es recomendable revisar las actualizaciones que se realicen a los presentes TÉRMINOS Y CONDICIONES, con objetivo de estar adecuadamente informado sobre cómo y para qué utilizamos las cookies que se generan al ingresar o hacer uso del SITIO WEB.
              <br><br><br><b>POLÍTICA DE ENLACES.</b>
              <br><br>Los USUARIOS o terceros que realicen o publiquen un enlace web desde una página web externa, a este SITIO WEB deberán tomar en cuenta lo siguiente:
              <br><br>No se permite la reproducción (total o parcial) de los contenidos, productos o servicios disponibles en el SITIO WEB sin la autorización expresa de Foodchiida o su titular. Tampoco se permitirán manifestaciones falsas, inexactas o incorrectas sobre el SITIO WEB, ni sobre sus contenidos, productos o servicios, pudiendo Foodchiida restringir el acceso al SITIO WEB a toda aquella persona que incurra en este tipo de actos.
              <br><br>El establecimiento de un enlace al SITIO WEB desde cualquier sitio externo, no implicará la existencia de alguna relación entre Foodchiida y el titular del sitio web desde el cual se realice, tampoco implicará el conocimiento de Foodchiida  de los contenidos, productos o servicios ofrecidos en los sitios externos desde los cuales se pueda acceder al SITIO WEB.
              <br><br><br><b>EÍTICA EN MATERIA DE PROPIEDAD INTELECTUAL E INDUSTRIAL.</b>
              <br><br> Foodchiida por sí o como parte cesionaria, es titular de todos los derechos de propiedad intelectual e industrial del SITIO WEB, entendiendo por éste el código fuente que hace posible su funcionamiento, así como las imágenes, archivos de audio o video, logotipos, marcas, combinaciones de colores, estructuras, diseños y demás elementos que lo distinguen. Serán, por consiguiente, protegidas por la legislación mexicana en materia de propiedad intelectual e industrial, así como por los tratados internacionales aplicables. Por consiguiente, queda expresamente prohibida la reproducción, distribución, o difusión de los contenidos del SITIO WEB, con fines comerciales, en cualquier soporte y por cualquier medio, sin la autorización de Foodchiida .
              <br><br> El USUARIO se compromete a respetar los derechos de propiedad intelectual e industrial del TITULAR. No obstante, además de poder visualizar los elementos del SITIO WEB podrá imprimirlos, copiarlos o almacenarlos, siempre y cuando sea exclusivamente para su uso estrictamente personal.
              <br><br>Por otro lado, el USUARIO, se abstendrá de suprimir, alterar, o manipular cualquier elemento, archivo, o contenido, del SITIO WEB, y por ningún motivo realizará actos tendientes a vulnerar la seguridad, los archivos o bases de datos que se encuentren protegidos, ya sea a través de un acceso restringido mediante un usuario y contraseña, o porque no cuente con los permisos para visualizarlos, editarlos o manipularlos.
              <br><br>En caso de que el USUARIO o algún tercero consideren que cualquiera de los contenidos del SITIO WEB suponga una violación de los derechos de protección de la propiedad industrial o intelectual, deberá comunicarlo inmediatamente a Foodchiida a través de los datos de contacto disponibles en el propio SITIO WEB.
              <br><br><br><b>LEGISLACIÓN Y JURISDICCIÓN APLICABLE.</b>
              <br><br>Foodchiida se reserva la facultad de presentar las acciones civiles o penales que considere necesarias por la utilización indebida del SITIO WEB, sus contenidos, productos o servicios, o por el incumplimiento de los presentes TÉRMINOS Y CONDICIONES.
              <br><br>La relación entre el USUARIO y Foodchiida se regirá por la legislación vigente en México, específicamente en Jalisco. De surgir cualquier controversia en relación a la interpretación y/o a la aplicación de los presentes TÉRMINOS Y CONDICIONES, las partes se someterán a la jurisdicción ordinaria de los tribunales que correspondan conforme a derecho en el estado al que se hace referencia.
            </p>
            </div>
          </div>
        </div>
  </div>
</div>



 <br><br><br><br><br><br><br><br>

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