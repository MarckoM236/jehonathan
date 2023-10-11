<?php
class ImageRandom{

    //Rename a random image as principal.jpeg to change the main display image of the categories.
    function random($ruta){
        $route = "img/Products/".$ruta;

        //for windows
        $routeReplace = str_replace('/', '\\', $route);
        $handle = dirname(__DIR__) . DIRECTORY_SEPARATOR . $routeReplace;

        //for linux
        //$handle = dirname(__DIR__) . DIRECTORY_SEPARATOR . $route;
        
        if ($handle) {
            $listFiles = array_diff(scandir($handle), array('..', '.'));

            // search main file -------------------------------------------
            $principalFile = null;
            foreach ($listFiles as $file) {
                $fileInfo = pathinfo($file);
                if (strtolower($fileInfo['filename']) == 'principal') {
                    $principalFile = $file;
                    break;
                }
            }
            //---------------------------------------------------------------

            //----If it finds the file named main, it creates a new list without including it----
            if ($principalFile) {
                $newList = array_filter($listFiles, function($file) use ($principalFile) {
                    return $file !== $principalFile;
                });
            
            //------------------------------------------------------------------------------------

                if (!empty($newList)) {
                    $ran = $newList[array_rand($newList)];
                    $filePrin = $handle . DIRECTORY_SEPARATOR . $principalFile;
                    $oldFile = $handle . DIRECTORY_SEPARATOR . $ran;

                    // Rename the 'main' file with its original extension
                    $extPrin = pathinfo($filePrin, PATHINFO_EXTENSION);
                    $renameFilePrin = pathinfo($filePrin, PATHINFO_FILENAME);
                    rename($filePrin, $renameFilePrin . '_old.' . $extPrin);

                    // Rename the random file as 'main' with its extension
                    $extRan = pathinfo($oldFile, PATHINFO_EXTENSION);
                    rename($oldFile, $handle . DIRECTORY_SEPARATOR . 'principal.' . $extRan);

                    // Renombrar el archivo principal con el nombre del archgivo random
                    rename($renameFilePrin . '_old.' . $extPrin, $oldFile);   
                }
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
