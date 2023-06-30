<?php
class Files {
    function getGallery($ruta){
        
        $arrFiles = array();
        $handle = opendir('../img/'.$ruta);
        if ($handle) {
            while (($entry = readdir($handle)) !== FALSE) {
                $arrFiles[] = $entry;
            }
        }
        
        closedir($handle);

        return $arrFiles;
    }

    function SendEmail($client=null,$sender=null,$message=null){
        $output=['status'=>0,'msg'=>'Datos incorrectos'];
        if(!empty($message) && !empty($sender)){
            $recipient = "creaciones-jehonatan@hotmail.com"; 
            $subject = "Mensaje Creaciones Jehonatan"; 
            $body = ' 
            <html> 
            <head> 
            <title>Solicitud</title> 
            </head> 
            <body> 
            <h1>Nueva solicitud desde Creaciones Jehonatan</h1> 
            <p> <b>Enviado por: </b>'.$client.' | '.$sender.'</p> 
            <p> <b>Mensaje: </b>'.$message.'</p> 
            </body> 
            </html> 
            '; 

            //para el env铆o en formato HTML 
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

            //direcci贸n del remitente 
            $headers .= "From: ".$client." <".$sender.">\r\n"; 

            @$send= mail($recipient,$subject,$body,$headers); 

            if($send){
                $output=['status'=>1,'msg'=>'Mensaje enviado exitosamente'];
            }
            else{
                $output=['status'=>0,'msg'=>'Error al enviar el mensaje'];
            }
            }
        
        return $output;
    }   
}
?>