<?php

$jsonraw = file_get_contents("../file-set.json");
$file_set = json_decode($jsonraw);
$baseurl = "../";

foreach($file_set as $value){
    copy($baseurl.$value,$value);
}


?>
<a href = "index.html">index.html</a>
<style>
body{
    font-size:3em;
}
a{
    font-size:3em;
}
</style>
