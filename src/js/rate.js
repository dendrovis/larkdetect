
var smileToggle = false;
var normToggle = false;
var sadToggle = false;

function smile() {
    if(smileToggle == false){
        document.getElementById("smile").style.color = "#00ff00";
        document.getElementById("normal").style.color = "#000000";
        document.getElementById("sad").style.color = "#000000";
        smileToggle = true;
    }
    else
    {
        document.getElementById("smile").style.color = "#000000";
        smileToggle = false;
    }
  
}

function normal() {
    if(normToggle == false)
    {
        document.getElementById("normal").style.color = "#ffff00";
        document.getElementById("sad").style.color = "#000000";
        document.getElementById("smile").style.color = "#000000";
        normToggle = true;
    }
    else
    {
        document.getElementById("normal").style.color = "#000000";
        normToggle = false;
    }
    
}

function sad() {
    if(sadToggle == false)
    {
        document.getElementById("sad").style.color = "#ff0000";
        document.getElementById("normal").style.color = "#000000";
        document.getElementById("smile").style.color = "#000000";
        sadToggle = true;
    }
    else
    {
        document.getElementById("sad").style.color = "#000000";
        sadToggle = false;
    }
    
}