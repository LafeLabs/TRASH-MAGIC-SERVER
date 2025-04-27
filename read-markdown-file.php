<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <!--

convert markdown +latext to html via showdown.js and mathjax.js

    -->
    <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAP//AP///wANAP8A5Dz6ABueRwAAt/8A6BonABo86AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAREREREREREREREAAAEREREREQCIgREREd3dwAAB3d3d3d3d3d3d3d3d3d3d3d3d3VVVVVVVQAFVVAAVVVQIiBRAiIBEQIAIBECAAERAgAgFgIABmYCIiBmAiIGZgIiIGYCIgZmYCIAaIAAMzMzAAiIiIiIiIiIiIiIiIiIiIiIgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />

    <!--Stop Google:-->
    <META NAME="robots" CONTENT="noindex,nofollow">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/showdown/1.8.6/showdown.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

   <script src = "trashmagic.js"></script>
<link rel="stylesheet" href="trashbook.css">    

<!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
        <script>
            MathJax.Hub.Config({
                tex2jax: {
                inlineMath: [['$','$'], ['\\(','\\)']],
                processEscapes: true,
                processClass: "mathjax",
                ignoreClass: "no-mathjax"
                }
            });//			MathJax.Hub.Typeset();//tell Mathjax to update the math
        </script>
-->

</head>
<body>    
<div class = "data" id = "filenamediv"><?php
    
if(isset($_GET["filename"])){
    echo $_GET["filename"];
}
else{
    echo "README.md";
}

?></div>
<div id = "scrollscroll"></div>
<div id  = "scrollsbox"></div>
<script>

if(innerWidth > innerHeight){
    
    document.getElementById("scrollscroll").style.width = (innerHeight - 35).toString() + "px";
    document.getElementById("scrollscroll").style.left = (0.5*(innerWidth - innerHeight) - 25).toString() + "px";    
    document.getElementById("scrollsbox").style.width = (0.5*(innerHeight - innerWidth)).toString() + "px";
    document.getElementById("scrollsbox").style.left = (innerHeight + 0.5*(innerWidth - innerHeight)).toString() + "px";    

}
else{


}

mode = "dark";
//mode = "light";


scroll = "";
rawhtml = "";
var converter = new showdown.Converter();
// for more on options see here:
// https://github.com/showdownjs/showdown/wiki/Showdown-Options
converter.setOption('literalMidWordUnderscores', 'true');
converter.setOption('tables', 'true')
    
filename = "scrolls/home";

//loadscroll("scrolls/home");

loadscroll(document.getElementById("filenamediv").innerHTML);

localfile = true;



function loadscroll(scrollname){
    filename = scrollname;
    document.getElementById("scrollscroll").innerHTML = "";
    document.getElementById("scrollscroll").style.display = "block";
    var httpc666 = new XMLHttpRequest();
    httpc666.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            scroll = this.responseText;
            rawhtml = converter.makeHtml(scroll);
            document.getElementById("scrollscroll").innerHTML = rawhtml;
            //MathJax.Hub.Typeset();//tell Mathjax to update the math
            
            titles = document.getElementsByTagName("H1");
            for(var index = 0;index < titles.length;index++){
                rainbowstring(titles[index]);    
            }

        }
    };
    httpc666.open("GET", "load-file.php?filename=" + scrollname, true);
    httpc666.send();
    //MathJax.Hub.Typeset();//tell Mathjax to update the math
}

/*
document.getElementById("modebutton").onclick = function(){
    modeswitch();
}

document.getElementById("modebutton2").onclick = function(){
    modeswitch();
}
*/

modeswitch();
function modeswitch(){
    if(mode == "dark"){
        mode = "light";
        document.body.style.backgroundColor = "#9f8767";
        document.getElementById("scrollscroll").style.backgroundColor = "#eeeeee";
        document.getElementById("scrollscroll").style.color = "black";


        document.getElementById("scrollsbox").style.backgroundColor = "#9f8767";
        document.getElementById("scrollsbox").style.color = "black";        
    }
    else{
        mode = "dark";
        document.body.style.backgroundColor = "#404040";
        document.getElementById("scrollscroll").style.backgroundColor = "black";
        document.getElementById("scrollscroll").style.color = "#00ff00";    
        
        document.getElementById("scrollsbox").style.backgroundColor = "#303030";
        document.getElementById("scrollsbox").style.color = "#00ff00";  

    }
}



scrolls = [];
var httpc9 = new XMLHttpRequest();
httpc9.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        scrolls = JSON.parse(this.responseText);
        for(var index = 0;index < scrolls.length;index++) {
            if(scrolls[index].includes(".md") || scrolls[index].includes(".MD")){        
                var newscrollbutton = document.createElement("P");
                newscrollbutton.className = "boxlink";
                newscrollbutton.innerHTML = scrolls[index];
                document.getElementById("scrollsbox").appendChild(newscrollbutton);
                newscrollbutton.onclick = function(){
                    currentFile = this.innerHTML;
                    loadscroll(currentFile);
                }
            }    
        }
    };
}

httpc9.open("GET", "list-files.php", true);
httpc9.send();


//globalurl = "http://www.trashrobot.org/qrcode.html";
globalurl = window.location.href;
qrcode = new QRCode(document.getElementById("qrcode"), {
	text: globalurl,
	width: codesquaresize,
	height: codesquaresize,
	colorDark : "#000000",
	colorLight : "#ffffff",
	correctLevel : QRCode.CorrectLevel.H
});
qrcode.makeCode(globalurl);


</script>
<style>

</style>
</body>
</html>