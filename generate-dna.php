<!-- 
this program generates the file dna.txt which lists the files to replicate 
-->
<a style ="font-family:Comic Sans MS;color:blue;font-size:1.5em;" href = "index.html">index.html</a>

<br>
<a style ="font-family:Comic Sans MS;color:blue;font-size:1.5em;" href = "edit-html.html">edit-html.html</a>
<br>
<a style ="font-family:Comic Sans MS;color:blue;font-size:1.5em;" href = "edit-php.html">edit-php.html</a>
<br>
<a style ="font-family:Comic Sans MS;color:blue;font-size:1.5em;" href = "edit-book.html">edit-book.html</a>
<br>


<br/>
<pre>
<?php

    $files = scandir(getcwd());
    $phpfiles = scandir(getcwd()."/php");


    $htmlfiles = [];
    foreach($files as $value){
        if(substr($value,-4) == ".txt" || substr($value,-4) == ".css" || substr($value,-5) == ".html" || substr($value,-3) == ".md" || substr($value,-3) == ".py" || substr($value,-3) == ".sh" || substr($value,-3) == ".js"){
            array_push($htmlfiles,$value);
        }
    }

    $dna = json_decode("{}");
    $dna->html = $htmlfiles;


    $dna->php = [];
    foreach($phpfiles as $value){
        if($value[0] != "."){
            array_push($dna->php,$value);
        }
    }



    echo json_encode($dna,JSON_PRETTY_PRINT);

    $file = fopen("dna.txt","w");// create new file with this name
    fwrite($file,json_encode($dna,JSON_PRETTY_PRINT)); //write data to file
    fclose($file);  //close file

?>
</pre>
<br>
<pre>
<?php

$files = scandir(getcwd());
$phpfiles = scandir(getcwd()."/php");
echo "\n## HTML AND TEXT FILES:\n\n";

foreach($files as $value){
    if(substr($value,-4) == ".txt" || substr($value,-4) == ".css" || substr($value,-5) == ".html" || substr($value,-3) == ".md" || substr($value,-3) == ".py" || substr($value,-3) == ".sh" || substr($value,-3) == ".js"){
        echo "  - [".$value."](".$value.")\n";
    }
}


echo "\n## PHP CODE AS RAW TEXT:\n\n";
foreach($phpfiles as $value){
    if($value[0] != "."){
        echo "  - [php/".$value."](php/".$value.")\n";
    }
}


?>
    
</pre>
