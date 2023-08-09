<?php
class ImageRandom{

    //Rename a random image as principal.jpeg to change the main display image of the categories.
    function random($ruta){
        $route = "img/Products/".$ruta;
        $routeReplace = str_replace('/', '\\', $route);
        $handle = dirname(__DIR__) . DIRECTORY_SEPARATOR . $routeReplace;
        if ($handle) {
            $listFiles = array_diff(scandir($handle), array('..', '.'));
            $newList = array_diff($listFiles, array('principal.jpeg'));

            if (count($newList) > 0) {
                $ran = $newList[random_int(0,count($newList))];
                $filePrin = $handle.DIRECTORY_SEPARATOR.'principal.jpeg';
                $oldFile = $handle.DIRECTORY_SEPARATOR.$ran;
                
                $extPrin = pathinfo($filePrin, PATHINFO_EXTENSION);
                $renameFilePrin = pathinfo($oldFile, PATHINFO_FILENAME);
                
                rename($filePrin,$renameFilePrin.'_old'.$extPrin);
                rename($oldFile,$filePrin);
                rename($renameFilePrin.'_old'.$extPrin,$oldFile);     
            }
        }
    }
}

$image = new ImageRandom();
$image->random('BlusonesDama');
$image->random('BMC');
$image->random('BusosCapucha');
$image->random('CamisetasAnime');
$image->random('CamisetasNino');
$image->random('Mamelucos');
$image->random('PlayerasAmerica');
$image->random('PlayerasDepCali');
$image->random('PrendasDama');
