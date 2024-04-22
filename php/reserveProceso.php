<?php
    session_start();
    use Dompdf\Dompdf;

    if(isset($_POST['btn_reserve'])){ 
        $name_reserve = $_POST['name_reserve'];
        $email_reserve = $_POST['email_reserve'];
        $phone_reserve = $_POST['phone_reserve'];

        //Checa que no mandó formulario vacío
        if(empty($_POST['name_reserve']) || empty($_POST['email_reserve']) || empty($_POST['phone_reserve'])){
            header('Location: ../reserve_method.php?mensaje=falta');
            exit();
        } else {
            require_once('../vendor/autoload.php');
            require_once('../dompdf/autoload.inc.php');
            require_once('../reporte.php');
            include_once('conexion.php');
            include_once('shoppingProceso.php');

            //Genera el PDF
            //ob_start();
            $dompdf = new Dompdf();

            $options = $dompdf->getOptions();
            $options->set(array('isRemoteEnabled' => true));
            $dompdf->setOptions($options);
    
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4','landscape'); 
            $dompdf->render();
            $dompdf->stream("ticketApartado.pdf",array("Attachment"=>false));

            session_destroy();
            exit();
        }
    }

?>