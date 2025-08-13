<a href = "read-book.html">READ BOOK</a>
<?php

if(isset($_GET["book"])){
    $bookurl = $_GET["book"];
    $baseurl = explode("book.txt",$bookurl)[0];
    $rawbook = file_get_contents($book);
    $book = json_decode($rawbook);
    foreach($book as $value){
        copy($baseurl.$value,$value);
    }
    echo "<pre>";
    echo json_encode($book,JSON_PRETTY_PRINT);
    echo "</pre>";
}
else{
    echo("NO BOOK URL GIVEN!");
}

?>
<style>
body{
    background-color:BLACK;
    font-family:Comic Sans MS;
    font-size:3em;
    color:#ff2cb4;
}
a{
        font-size:3em;
        color:#ff2cb4;

}
</style>
