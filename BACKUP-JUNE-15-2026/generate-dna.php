<!-- 
this program generates the file dna.txt which lists the files to replicate 
-->
<a style ="font-family:Arial;color:blue;font-size:1.5em;" href = "index.html">index.html</a>

<br>
<a style ="font-family:Arial;color:blue;font-size:1.5em;" href = "edit-web-files.html">edit-web-files.html</a>
<br>
<a style ="font-family:Arial;color:blue;font-size:1.5em;" href = "edit-php-files.html">edit-php-files.html</a>
<br>
<a style ="font-family:Arial;color:blue;font-size:1.5em;" href = "edit-markdown-files.html">edit-markdown-files.html</a>
<br>


<br/>
<pre>
<?php

    $files = scandir(getcwd());
    $phpfiles = scandir(getcwd()."/php");


    $htmlfiles = [];
    $jsonfiles = [];
    $jsfiles = [];
    $cssfiles = [];
    $mdfiles = [];
    $textfiles = [];
    
    foreach($files as $value){
        if( substr($value,-5) == ".html"){
            array_push($htmlfiles,$value);
        }
        if( substr($value,-5) == ".json"){
            array_push($jsonfiles,$value);
        }
        if(substr($value,-4) == ".css"){
            array_push($cssfiles,$value);
        }        
        if(substr($value,-3) == ".js"){
            array_push($jsfiles,$value);
        }        
        if(substr($value,-3) == ".md"){
            array_push($mdfiles,$value);
        }        
        if(substr($value,-4) == ".txt"){
            array_push($textfiles,$value);
        }        
        
    }


    $dna = json_decode("{}");
    $dna->html = $htmlfiles;
    $dna->json = $jsonfiles;
    $dna->css = $cssfiles;
    $dna->js = $jsfiles;
    $dna->md = $mdfiles;
    $dna->text = $textfiles;


    $dna->php = [];
    foreach($phpfiles as $value){
        if($value[0] != "."){
            array_push($dna->php,$value);
        }
    }



    echo json_encode($dna,JSON_PRETTY_PRINT);

    $file = fopen("dna.json","w");// create new file with this name
    fwrite($file,json_encode($dna,JSON_PRETTY_PRINT)); //write data to file
    fclose($file);  //close file

?>
</pre>
<br>
<H1>MARKDOWN:</H1>
<pre>
<?php

$filesmd = "";
echo "\n# HTML FILES\n\n";
$filesmd .= "\n# HTML FILES\n\n";
foreach($dna->html as $value){
    echo " - [".$value."](".$value.")\n";
    $filesmd .= " - [".$value."](".$value.")\n";
}

echo "\n# CSS FILES\n\n";
$filesmd .= "\n# CSS FILES\n\n";
foreach($dna->css as $value){
    echo " - [".$value."](".$value.")\n";
    $filesmd .= " - [".$value."](".$value.")\n";
}

echo "\n# JAVASCRIPT FILES\n\n";
$filesmd .= "\n# JAVASCRIPT FILES\n\n";
foreach($dna->js as $value){
    echo " - [".$value."](".$value.")\n";
    $filesmd .= " - [".$value."](".$value.")\n";
}

echo "\n# JSON FILES\n\n";
$filesmd .= "\n# JSON FILES\n\n";
foreach($dna->json as $value){
    echo " - [".$value."](".$value.")\n";
    $filesmd .= " - [".$value."](".$value.")\n";
}

echo "\n# MARKDOWN FILES\n\n";
$filesmd .= "\n# MARKDOWN FILES\n\n";
foreach($dna->md as $value){
    echo " - [".$value."](".$value.")\n";
    $filesmd .= " - [".$value."](".$value.")\n";
}
echo "\n# TEXT FILES\n\n";
$filesmd .= "\n# TEXT FILES\n\n";
foreach($dna->text as $value){
    echo " - [".$value."](".$value.")\n";
    $filesmd .= " - [".$value."](".$value.")\n";
}

echo "\n# PHP FILES AS TEXT\n\n";
$filesmd .= "\n# PHP FILES AS TEXT\n\n";

foreach($dna->php as $value){
    echo " - [php/".$value."](php/".$value.")\n";
    $filesmd .= " - [php/".$value."](php/".$value.")\n";
    
}

$file = fopen("files.md","w");// create new file with this name
fwrite($file,$filesmd); //write data to file
fclose($file);  //close file

?>
</pre>
