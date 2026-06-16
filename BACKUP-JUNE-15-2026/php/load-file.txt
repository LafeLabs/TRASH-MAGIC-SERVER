<?php
$filename = $_REQUEST["filename"];//filename
$data = file_get_contents($filename);//get contents of file
echo $data;//print contents
?>