<?php
    session_start();
    use Dompdf\Dompdf;

    if(isset($_POST['btn_payment'])){ 
        $name_payment = $_POST['name_payment'];
        $email_payment = $_POST['email_payment'];
        $phone_payment = $_POST['phone_payment'];

        $cardNumber = $_POST['cardNumber'];
        $cardExpiry = $_POST['cardExpiry'];
        $cardCCV = $_POST['cardCCV'];

        //Checa que no mandó formulario vacío
        if(empty($_POST['name_payment']) || empty($_POST['email_payment']) || empty($_POST['phone_payment']) || empty($_POST['cardNumber']) || empty($_POST['cardExpiry']) || empty($_POST['cardCCV'])){
            header('Location: ../payment_method.php?mensaje=falta');
            exit();
        } else {
            require_once('../vendor/autoload.php');
            require_once('../dompdf/autoload.inc.php');
            require_once('../ticket.php');
            include_once('conexion.php');
            include_once('shoppingProceso.php');

            ob_start();
            $dompdf = new Dompdf();

            $options = $dompdf->getOptions();
            $options->set(array('isRemoteEnabled' => true));
            $dompdf->setOptions($options);

            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4','landscape'); 
            $dompdf->render();
            $dompdf->stream("ticketCompra.pdf",array("Attachment"=>false));

            session_destroy();

        }
    }




?>