<?php
//branch.php?branch=[branchname]
$branchname = $_GET["branchname"];//get branch name
mkdir($branchname);//create directory with branch name

if(isset($_GET["replicator"])){
    $replicatorurl = $_GET["replicator"];
    copy($replicatorurl,$branchname."/replicator.php");
}
else{
    copy("php/local-replicator.txt",$branchname."/replicator.php");    
}

echo "<a href = \"".$branchname."/replicator.php\">CLICK ME(2/3)</a>";

?>
<style>
body{
    background-color:BLACK;
    font-family:Comic Sans MS;
    font-size:3em;
}
    a{
        font-size:3em;
        color:#ff2cb4;
;
    }
</style>