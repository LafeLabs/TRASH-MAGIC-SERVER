<?php

$dnaraw = file_get_contents("../dna.json");
$dna = json_decode($dnaraw);
$baseurl = "../";

mkdir("php");

copy("../php/local-replicator.txt","replicator.php");

foreach($dna->html as $value){
    copy($baseurl.$value,$value);
}
foreach($dna->css as $value){
    copy($baseurl.$value,$value);
}
foreach($dna->js as $value){
    copy($baseurl.$value,$value);
}
foreach($dna->json as $value){
    copy($baseurl.$value,$value);
}
foreach($dna->md as $value){
    copy($baseurl.$value,$value);
}
foreach($dna->text as $value){
    copy($baseurl.$value,$value);
}

foreach($dna->php as $value){
 
    copy($baseurl."php/".$value,"php/".$value);
    copy($baseurl."php/".$value,explode(".",$value)[0].".php");

}
    


?>
<a href = "index.html">CLICK ME(3/3)</a>
<style>
body{
    background-color:BLACK;
    font-family:Comic Sans MS;
    font-size:3em;
}
a{
        font-size:3em;
        color:#ff2cb4;

}
</style>
