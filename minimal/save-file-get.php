<?php
    $data = $_GET["data"]; //get data 
    $filename = $_GET["filename"];//get filename
    $file = fopen($filename,"w");// create new file with this name
    fwrite($file,$data); //write data to file
    fclose($file);  //close file
?>