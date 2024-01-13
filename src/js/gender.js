var mToggle = false;
var fToggle = false;

function male() {
    if(mToggle == false){
        document.getElementById("male").style.color = "#5b92e5";
        document.getElementById("female").style.color = "#000000";
        setCookie("gender","male",1);
        document.getElementById("genderV").value = "Male";
        mToggle = true;
    }
    else
    {
        document.getElementById("male").style.color = "#000000";
        setCookie("gender","no",1);
        document.getElementById("genderV").value = "";
        mToggle = false;
    }
  
}

function female() {
    if(fToggle == false)
    {
        document.getElementById("female").style.color = "#ff5ba5";
        document.getElementById("male").style.color = "#000000";
        setCookie("gender","female",1);
        document.getElementById("genderV").value = "Female";
        fToggle = true;
    }
    else
    {
        document.getElementById("female").style.color = "#000000";
        setCookie("gender","male",1);
        document.getElementById("genderV").value = "";
        fToggle = false;
    }
    
}
