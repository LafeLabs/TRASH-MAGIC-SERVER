<?php
//list directories, which we call "branches" here
$files = scandir(getcwd());//get list of files
$dirs = [];//start an array
foreach($files as $value){
    if($value[0] != "." && is_dir($value) && $value != "php"){
        array_push($dirs,$value);//add each file to the array which is a dir
    }
}
echo json_encode($dirs);//return the list of directories
?>
