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
        case 'getProductsPrendasDama': 
            $res = $files -> getGallery('Products/PrendasDama');
            echo json_encode($res);
            break;
        case 'getProductsBlusonesDama': 
            $res = $files -> getGallery('Products/BlusonesDama');
            echo json_encode($res);
            break;
        case 'getProductsPlayerasAmerica': 
            $res = $files -> getGallery('Products/PlayerasAmerica');
            echo json_encode($res);
            break;
        case 'getProductsPlayerasDepCali': 
            $res = $files -> getGallery('Products/PlayerasDepCali');
            echo json_encode($res);
            break;
        case 'getProductsCamisetasNino': 
            $res = $files -> getGallery('Products/CamisetasNino');
            echo json_encode($res);
            break;
        case 'getProductsCamisetasAnime': 
            $res = $files -> getGallery('Products/CamisetasAnime');
            echo json_encode($res);
            break;
        case 'sendEmail': 
            $res = $files->SendEmail($client,$email,$message);
            echo json_encode($res);
            break;
    }
}
?>