<?php 
   session_start();

   if(!isset($_SESSION['cart'])){
      header('Location: shopping_cart.php');
      exit();
    } else {
       ob_start();
    }

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/img/logo_chiquito4.png" type="image/png" sizes="16x16">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/all.min.css">
		<title>FOODCHIIDA</title>
   </head>

   <style>
      .invoice-box {
         max-width: 800px;
         margin: auto;
         margin-top:1%;
         padding: 30px;
         border: 1px solid #b5b5b5;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
         font-size: 16px;
         line-height: 24px;
         font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
         color: #000000;
      }

      .invoice-box table {
         width: 100%;
         line-height: inherit;
         text-align: left;
      }

      .invoice-box table td {
         padding: 5px;
         vertical-align: top;
      }

      .invoice-box table tr td:nth-child(2) {
         text-align: right;
      }

      .invoice-box table tr.top table td {
         padding-bottom: 20px;
      }

      .invoice-box table tr.top table td.title {
         font-size: 45px;
         line-height: 45px;
         color: #333;
      }

      .invoice-box table tr.information table td {
         padding-bottom: 40px;
      }

      .invoice-box table tr.heading td {
         background: #eee;
         border-bottom: 1px solid #ddd;
         font-weight: bold;
         background-color: #ff725e;
         text-align: center;
      }

      .invoice-box table tr.informacion td {
         border-bottom: 1px solid #ddd;
         text-align: center;
      }

      .invoice-box table tr.precio td {
         text-align: right;
         padding-right:5%;
      }

      .invoice-box table tr.item td {
         border-bottom: 1px solid #eee;
      }

      .invoice-box table tr.item.last td {
         border-bottom: none;
      }

      .invoice-box table tr.total td:nth-child(2) {
         border-top: 2px solid #eee;
         font-weight: bold;
      }

      @media only screen and (max-width: 600px) {
         .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
         }

         .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
         }
      }

      /** RTL **/
      .invoice-box.rtl {
         direction: rtl;
         font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      }

      .invoice-box.rtl table {
         text-align: right;
      }

      .invoice-box.rtl table tr td:nth-child(2) {
         text-align: left;
      }
   </style>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/img/logo_fin3.png" style="width: 100%; max-width: 300px" />
								</td>
								<td>
									Orden #FCH<?php echo rand() . "\n";?><br />
                           Fecha: <?php echo date("d/m/Y");?><br />
                           Hora: <?php date_default_timezone_set("America/Mexico_City"); echo date("h:i:sa");?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<strong>FOODCHIIDA</strong><br />
									Guadalajara, Jalisco, 45010<br />
									Teléfono: (33)3140-6120<br />
                           Correo electrónico: foodchiida@gmail.com
								</td>

								<td>
                           <strong>CLIENTE</strong><br />
									<?php echo $_POST['name_reserve'];?><br />
									Teléfono:<?php echo $_POST['phone_reserve'];?><br />
									Correo electrónico: <?php echo $_POST['email_reserve'];?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

         </table>
   
         <table>
            <thead>
               <tr class="heading">
                  <td>Producto</td>
                  <td>Ubicación</td>
                  <td>Precio</td>
            </tr>
            <?php
               $total = 0;
               if(isset($_SESSION['cart'])){
                  foreach($_SESSION['cart'] as $key => $value){
                     $total = $total + $value['precio_producto'];
            ?> 
            </thead>
         <tbody>
            <tr class="informacion">
               <td><?php echo $value['nombre_producto'];?></td>
               <td><?php echo $value['ubicacion_producto'];?></td>
               <td>$<?php echo $value['precio_producto'];?></td>
            </tr>
         </tbody>
         <?php
               }
            }
         ?>
         </table>

         <table>
            <?php
               $value_iva = 16;
               $total_iva = $total * ($value_iva/100);
               $total_final = ($total * ($value_iva/100))+$total;
            ?>
            <thead>
               <tr class="precio">
                  <td colspan="3">Subtotal:$<?php echo $total;?></td>
               </tr>
               <tr class="precio">
                  <td colspan="3">IVA:$<?php echo $total_iva;?></td>
               </tr>
               <tr class="precio">
                  <td colspan="3"><b>Total:$<?php echo $total_final;?></b></td>
               </tr>
            </thead>
         </table>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   </body>
</html>

<?php
$html = ob_get_clean();
//echo $html;
?>
