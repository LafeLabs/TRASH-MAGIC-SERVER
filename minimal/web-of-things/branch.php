<?php
//branch.php?branch=[branchname]
$branchname = $_GET["branchname"];//get branch name
mkdir($branchname);//create directory with branch name

if(isset($_GET["replicator"])){
    $replicatorurl = $_GET["replicator"];
    copy($replicatorurl,$branchname."/replicate-file-set.php");
    echo "<a href = \"".$branchname."/replicate-file-set.php\">replicate-file-set.php</a>";    
}
else{
    copy("replicate-local-file-set.php",$branchname."/replicate-local-file-set.php"); 
    echo "<a href = \"".$branchname."/replicate-local-file-set.php\">replicate-local-file-set.php</a>";
    
}



?>
<style>
body{
    font-size:3em;
}
a{
    font-size:3em;
}
</style>