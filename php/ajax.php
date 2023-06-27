<?php
require_once 'files.php';

if (isset($_POST['client'])){
    $client = $_POST['client'];
    $email = $_POST['email'];
    $message = $_POST['message'];
}

if(isset($_GET['function']) && !empty($_GET['function'])) {
    $function = $_GET['function'];
    

    $files= new Files();
    switch($function) {
        case 'getMainGallery': 
            $res = $files -> getGallery('Gallery');
            echo json_encode($res);
            break;
        case 'getProductsBMC': 
            $res = $files -> getGallery('Products/BMC');
            echo json_encode($res);
            break;
        case 'getProductsMamelucos': 
            $res = $files -> getGallery('Products/Mamelucos');
            echo json_encode($res);
            break;
        case 'getProductsBusosCapucha': 
            $res = $files -> getGallery('Products/BusosCapucha');
            echo json_encode($res);
            break;
        case 'sendEmail': 
            $res = $files->SendEmail($client,$email,$message);
            echo json_encode($res);
            break;
    }
}
?>