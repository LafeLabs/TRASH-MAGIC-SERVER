// see https://en.wikipedia.org/wiki/HSL_and_HSV
function colorwheel(angle_input){
    var hue = Math.abs(angle_input%360);//angle in degrees
    var z60 = 255*(1 - Math.abs((hue/60)%2 - 1));//map [0,60] to [0,255]
    if(hue < 60){
        rednumber = 255;
        greennumber = Math.round(z60);
        bluenumber = 0;
    }
    if(hue >= 60 && hue < 120){
        rednumber = Math.round(z60);
        greennumber = 255;
        bluenumber = 0;
    }
    if(hue >= 120 && hue < 180){
        rednumber = 0;
        greennumber = 255;
        bluenumber = Math.round(z60);
    }
    if(hue >= 180 && hue < 240){
        rednumber = 0;    
        greennumber = Math.round(z60);
        bluenumber = 255;
    }
    if(hue >= 240 && hue < 300){
        rednumber = Math.round(z60);    
        greennumber = 0;
        bluenumber = 255;
    }
    if(hue >= 300 && hue < 360){
        rednumber = 255;    
        greennumber = 0;
        bluenumber = Math.round(z60);
    }
    redstring = rednumber.toString(16);
    if(redstring.length < 2){
        redstring = "0" + redstring;    
    }
    greenstring = greennumber.toString(16);
    if(greenstring.length < 2){
        greenstring = "0" + greenstring; 
    }
    bluestring = bluenumber.toString(16);
    if(bluestring.length < 2){
        bluestring = "0" + bluestring; 
    }
    colorstring = "#" + redstring + greenstring + bluestring;   
    return(colorstring);
}


function rainbowstring(localelement){
    /*
Pass this function an HTML element and it will make each letter into a span and divide the color wheel into an even number of divisions based on the number of letters and apply the color wheel to those letters.

example code:

titles = document.getElementsByTagName("H1");
for(var index = 0;index < titles.length;index++){
    rainbowstring(titles[index]);    
}

Colors every letter in every H1 header element around the color wheel.

    */
    textstring = localelement.innerHTML;
    localelement.innerHTML = "";
    var number_of_letters = textstring.length;
    for(var letter_index = 0; letter_index < number_of_letters; letter_index++){
        var newspan = document.createElement("SPAN");    
        newspan.innerHTML = textstring.charAt(letter_index);
        var spancolor = colorwheel(letter_index*360/number_of_letters);
        newspan.style.color = spancolor;
        localelement.appendChild(newspan);
    }
}

function rainbow(localarray){
    /*
Pass this function an array of DOM elements and it will apply border and background colors to each element going around the color wheel in evenly divided angles, for example:

rainbow(document.getElementsByTagName("A"));

rainbow colors all links in a document. 

    */
    number_of_elements = localarray.length;
    theta = 0;
    for(var element_index = 0;element_index < number_of_elements;element_index++){
        var elementcolor = colorwheel(element_index*360/number_of_elements);
        localarray[element_index].style.backgroundColor = elementcolor;// + "80";
        localarray[element_index].style.borderColor = elementcolor;
    }
}

