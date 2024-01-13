/*For Label when user enter wrong input 

//<i class="fas fa-exclamation-circle"></i>
//<i class='fas fa-times-circle'></i>

/*Register Page*/

/*var togglePW = false;
var toggleID = false;*/

/*alert("test");*/

/*Login Page*/
var toggle = false;
/*var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;*/



function toLogin(){/*no input*/
    toggle = true;
    if(document.forms["loginform"]["loginPW"].value == "")
    {
        document.getElementById("loginPW").style.borderBottomColor = "#EED202";
         document.getElementById("loginPW").value = ""; //clear input 
         document.getElementById('loginPWL').innerHTML = "<i class='fas fa-exclamation-circle'></i>" + "    Please Key In Your Password";
         document.getElementById('loginPWL').style.color = "#EED202";
         setTimeout(function(){ 
             document.getElementById('loginPWL').innerHTML = "Enter Password"; 
             document.getElementById('loginPWL').style.color = "#9b9b9b";
         }, 2000);
         toggle = false;

    }
    if(document.forms["loginform"]["loginID"].value == "")
    {
        document.getElementById("loginID").style.borderBottomColor = "#EED202";
         document.getElementById("loginID").value = ""; //clear input
         document.getElementById('loginIDL').innerHTML = "<i class='fas fa-exclamation-circle'></i>"+"    Please Key In Your NRIC";
         document.getElementById('loginIDL').style.color = "#EED202";
         setTimeout(function(){ 
             document.getElementById('loginIDL').innerHTML = "Enter NRIC"; 
             document.getElementById('loginIDL').style.color = "#9b9b9b";
        }, 2000);
        toggle = false;
    }

    if(toggle == true)
    {
        if(!validatePW(document.forms["loginform"]["loginPW"].value) || !validateNRIC(document.forms["loginform"]["loginID"].value))
        {
        document.getElementById("loginPW").style.borderBottomColor = "#cc0000";
         document.getElementById("loginPW").value = ""; //clear input 
         document.getElementById('loginPWL').innerHTML = "<i class='fas fa-times-circle'></i>" + "    Invalid NRIC/Password";
         document.getElementById('loginPWL').style.color = "#cc0000";
         setTimeout(function(){ 
             document.getElementById('loginPWL').innerHTML = "Enter Password"; 
             document.getElementById('loginPWL').style.color = "#9b9b9b";
         }, 2000);
         toggle = false;
         document.getElementById("loginID").style.borderBottomColor = "#cc0000";
         document.getElementById("loginID").value = ""; //clear input
         document.getElementById('loginIDL').innerHTML = "<i class='fas fa-times-circle'></i>"+"    Invalid NRIC/Password";
         document.getElementById('loginIDL').style.color = "#cc0000";
         setTimeout(function(){ 
             document.getElementById('loginIDL').innerHTML = "Enter NRIC"; 
             document.getElementById('loginIDL').style.color = "#9b9b9b";
        }, 2000);

        }

    }
    
    if(toggle == false)
    {
        return false;
    }
        
    return true;
    

}



/*Reset Password Page*/

function toVerify(){
    toggle = true;
    if(document.forms["verifyform"]["Reg_NRIC_V"].value == "" && (document.forms["verifyform"]["yearSelect"].value != "" || document.forms["verifyform"]["monthSelect"].value != ""))
    {
        document.getElementById("Reg_NRIC_V").style.borderBottomColor = "#EED202";
         document.getElementById("Reg_NRIC_V").value = ""; //clear input
         document.getElementById('vNRICL').innerHTML = "<i class='fas fa-exclamation-circle'></i>"+"    Please Key In Your NRIC";
         document.getElementById('vNRICL').style.color = "#EED202";
         setTimeout(function(){ 
             document.getElementById('vNRICL').innerHTML = "Enter NRIC"; 
             document.getElementById('vNRICL').style.color = "#9b9b9b";
        }, 2000);
        toggle = false;
    }
    else if((document.forms["verifyform"]["yearSelect"].value == "" || document.forms["verifyform"]["monthSelect"].value == "") && document.forms["verifyform"]["Reg_NRIC_V"].value != ""){
        document.getElementById("Reg_NRIC_V").style.borderBottomColor = "#EED202";
         document.getElementById("Reg_NRIC_V").value = ""; //clear input
         document.getElementById('vNRICL').innerHTML = "<i class='fas fa-exclamation-circle'></i>"+"    Please Key In Your Birthday";
         document.getElementById('vNRICL').style.color = "#EED202";
         document.getElementById("monthSelect").style.borderColor = "#EED202" ;
        document.getElementById("yearSelect").style.borderColor = "#EED202" ;
        document.getElementById("daySelect").style.borderColor = "#EED202" ;
        document.forms["verifyform"]["monthSelect"].value = "";
        document.forms["verifyform"]["yearSelect"].value = "";
        document.forms["verifyform"]["daySelect"].value = "";
         setTimeout(function(){ 
             document.getElementById('vNRICL').innerHTML = "Enter NRIC"; 
             document.getElementById('vNRICL').style.color = "#9b9b9b";
        }, 2000);
        toggle = false;
    }
    else if((document.forms["verifyform"]["yearSelect"].value == "" || document.forms["verifyform"]["monthSelect"].value == "") && document.forms["verifyform"]["Reg_NRIC_V"].value == ""){
        document.getElementById("Reg_NRIC_V").style.borderBottomColor = "#EED202";
         document.getElementById("Reg_NRIC_V").value = ""; //clear input
         document.getElementById('vNRICL').innerHTML = "<i class='fas fa-exclamation-circle'></i>"+"    Please Key In Your NRIC and Birthday";
         document.getElementById('vNRICL').style.color = "#EED202";
         document.getElementById("monthSelect").style.borderColor = "#EED202" ;
        document.getElementById("yearSelect").style.borderColor = "#EED202" ;
        document.getElementById("daySelect").style.borderColor = "#EED202" ;
        document.forms["verifyform"]["monthSelect"].value = "";
        document.forms["verifyform"]["yearSelect"].value = "";
        document.forms["verifyform"]["daySelect"].value = "";
         setTimeout(function(){ 
             document.getElementById('vNRICL').innerHTML = "Enter NRIC"; 
             document.getElementById('vNRICL').style.color = "#9b9b9b";
        }, 2000);
        toggle = false;
    }

    if(toggle == true)
    {
        if(!validateNRIC(document.forms["verifyform"]["Reg_NRIC_V"].value))
        {
            toggle = false;
         document.getElementById("Reg_NRIC_V").style.borderBottomColor = "#cc0000";
         document.getElementById("Reg_NRIC_V").value = ""; //clear input
         document.getElementById('vNRICL').innerHTML = "<i class='fas fa-times-circle'></i>"+"    Invalid NRIC/Birthday";
         document.getElementById('vNRICL').style.color = "#cc0000";
         setTimeout(function(){ 
             document.getElementById('vNRICL').innerHTML = "Enter NRIC"; 
             document.getElementById('vNRICL').style.color = "#9b9b9b";
        }, 2000);

        }

    }
    if(toggle == false)
    {
        return false;
    }
        
    return true;

}


function toRSTPW(){

    toggle = true;
    if(document.forms["resetform"]["RST_PW"].value == "")
    {
        document.getElementById("RST_PW").style.borderBottomColor = "#EED202";
         document.getElementById("RST_PW").value = ""; //clear input 
         document.getElementById('RST_PWL').innerHTML = "<i class='fas fa-exclamation-circle'></i>" + "    Please Key In Your Password";
         document.getElementById('RST_PWL').style.color = "#EED202";
         setTimeout(function(){ 
             document.getElementById('RST_PWL').innerHTML = "Enter Password"; 
             document.getElementById('RST_PWL').style.color = "#9b9b9b";
         }, 2000);
         toggle = false;

    }
    if(document.forms["resetform"]["RST_RPW"].value == "")
    {
        document.getElementById("RST_RPW").style.borderBottomColor = "#EED202";
         document.getElementById("RST_RPW").value = ""; //clear input 
         document.getElementById('RST_RPWL').innerHTML = "<i class='fas fa-exclamation-circle'></i>" + "    Please Key In Your Password Again";
         document.getElementById('RST_RPWL').style.color = "#EED202";
         setTimeout(function(){ 
             document.getElementById('RST_RPWL').innerHTML = "Re-Enter Password"; 
             document.getElementById('RST_RPWL').style.color = "#9b9b9b";
         }, 2000);
         toggle = false;

    }
    if(toggle == true)
    {
        if(!validatePW(document.forms["resetform"]["RST_PW"].value))
        {
         document.getElementById("RST_PW").style.borderBottomColor = "#EED202";
         document.getElementById("RST_PW").value = ""; //clear input 
         document.getElementById('RST_PWL').innerHTML = "<i class='fas fa-exclamation-circle'></i>" + "    At least a Uppercase & a Lowercase,a Number,8 Char";
         document.getElementById('RST_PWL').style.color = "#EED202";
         setTimeout(function(){ 
             document.getElementById('RST_PWL').innerHTML = "Enter Password"; 
             document.getElementById('RST_PWL').style.color = "#9b9b9b";
         }, 2000);
         toggle = false;
         document.getElementById("RST_RPW").style.borderBottomColor = "#EED202";
         document.getElementById("RST_RPW").value = ""; //clear input
         document.getElementById('RST_RPWL').innerHTML = "<i class='fas fa-exclamation-circle'></i>"+"    At least a Uppercase & a Lowercase, a Number, 8 Char";
         document.getElementById('RST_RPWL').style.color = "#EED202";
         setTimeout(function(){ 
             document.getElementById('RST_RPWL').innerHTML = "Re-Enter Password"; 
             document.getElementById('RST_RPWL').style.color = "#9b9b9b";
        }, 2000);

        }

    }
    if(toggle == true)
    {
        if(document.forms["resetform"]["RST_PW"].value != document.forms["resetform"]["RST_RPW"].value)
        {
         document.getElementById("RST_PW").style.borderBottomColor = "#EED202";
         document.getElementById("RST_PW").value = ""; //clear input 
         document.getElementById('RST_PWL').innerHTML = "<i class='fas fa-exclamation-circle'></i>" + "    Password Not Matched";
         document.getElementById('RST_PWL').style.color = "#EED202";
         setTimeout(function(){ 
             document.getElementById('RST_PWL').innerHTML = "Enter Password"; 
             document.getElementById('RST_PWL').style.color = "#9b9b9b";
         }, 2000);
         toggle = false;
         document.getElementById("RST_RPW").style.borderBottomColor = "#EED202";
         document.getElementById("RST_RPW").value = ""; //clear input
         document.getElementById('RST_RPWL').innerHTML = "<i class='fas fa-exclamation-circle'></i>"+"    Password Not Matched";
         document.getElementById('RST_RPWL').style.color = "#EED202";
         setTimeout(function(){ 
             document.getElementById('RST_RPWL').innerHTML = "Re-Enter Password"; 
             document.getElementById('RST_RPWL').style.color = "#9b9b9b";
        }, 2000);

        }

    }
    
    if(toggle == false)
    {
        return false;
    }
        
    return true;

}

function toRegister(){

    /*
    //male
    //female
    Reg_FullName
    Reg_FullNameL
    Reg_NRIC
    Reg_NRICL
    Reg_E-mail
    Reg_E-mailL
    Reg_PW
    Reg_PWL
    Reg_RPW
    Reg_RPWL
    daySelect
    monthSelect
    yearSelect
    
    [registerform]
    
    
    */ 
    toggle = true;
    /*alert("haha");*/
    if(document.forms["registerform"]["genderV"].value == "") //how to read
    {
            /*alert("please select a gender");*/
            document.getElementById('male').style.color = "#EED202";
            document.getElementById('female').style.color = "#EED202";
         setTimeout(function(){ 
             document.getElementById('male').style.color = "#000000"; 
             document.getElementById('female').style.color = "#000000";
         }, 2000);
         toggle = false;
         

    }
    if(document.forms["registerform"]["Reg_FullName"].value == ""){
         document.getElementById("Reg_FullName").style.borderBottomColor = "#EED202";
         document.getElementById("Reg_FullName").value = ""; //clear input 
         document.getElementById('Reg_FullNameL').innerHTML = "<i class='fas fa-exclamation-circle'></i>" + "    Please Key In Your Full Name";
         document.getElementById('Reg_FullNameL').style.color = "#EED202";
         setTimeout(function(){ 
             document.getElementById('Reg_FullNameL').innerHTML = "Enter Full Name (as in NRIC)"; 
             document.getElementById('Reg_FullNameL').style.color = "#9b9b9b";
         }, 2000);
         toggle = false;

    }
    if(document.forms["registerform"]["Reg_NRIC"].value == ""){
        document.getElementById("Reg_NRIC").style.borderBottomColor = "#EED202";
        document.getElementById("Reg_NRIC").value = ""; //clear input 
        document.getElementById('Reg_NRICL').innerHTML = "<i class='fas fa-exclamation-circle'></i>" + "    Please Key In Your NRIC";
        document.getElementById('Reg_NRICL').style.color = "#EED202";
        setTimeout(function(){ 
            document.getElementById('Reg_NRICL').innerHTML = "Enter NRIC"; 
            document.getElementById('Reg_NRICL').style.color = "#9b9b9b";
        }, 2000);
        toggle = false;

   }
   if(document.forms["registerform"]["Reg_E-mail"].value == ""){
    document.getElementById("Reg_E-mail").style.borderBottomColor = "#EED202";
    document.getElementById("Reg_E-mail").value = ""; //clear input 
    document.getElementById('Reg_E-mailL').innerHTML = "<i class='fas fa-exclamation-circle'></i>" + "    Please Key In Your E-Mail";
    document.getElementById('Reg_E-mailL').style.color = "#EED202";
    setTimeout(function(){ 
        document.getElementById('Reg_E-mailL').innerHTML = "E-mail"; 
        document.getElementById('Reg_E-mailL').style.color = "#9b9b9b";
    }, 2000);
    toggle = false;

}
if(document.forms["registerform"]["Reg_PW"].value == ""){
    document.getElementById("Reg_PW").style.borderBottomColor = "#EED202";
    document.getElementById("Reg_PW").value = ""; //clear input 
    document.getElementById('Reg_PWL').innerHTML = "<i class='fas fa-exclamation-circle'></i>" + "    Please Key In Your Password";
    document.getElementById('Reg_PWL').style.color = "#EED202";
    setTimeout(function(){ 
        document.getElementById('Reg_PWL').innerHTML = "Enter Password"; 
        document.getElementById('Reg_PWL').style.color = "#9b9b9b";
    }, 2000);
    toggle = false;

}
if(document.forms["registerform"]["Reg_RPW"].value == ""){
    document.getElementById("Reg_RPW").style.borderBottomColor = "#EED202";
    document.getElementById("Reg_RPW").value = ""; //clear input 
    document.getElementById('Reg_RPWL').innerHTML = "<i class='fas fa-exclamation-circle'></i>" + "    Please Key In Your Password Again";
    document.getElementById('Reg_RPWL').style.color = "#EED202";
    setTimeout(function(){ 
        document.getElementById('Reg_RPWL').innerHTML = "Re-Enter Password"; 
        document.getElementById('Reg_RPWL').style.color = "#9b9b9b";
    }, 2000);
    toggle = false;

}

if(document.forms["registerform"]["monthSelect"].value == "" || document.forms["registerform"]["yearSelect"].value == ""){
    document.getElementById("monthSelect").style.borderColor = "#EED202" ;
    document.getElementById("yearSelect").style.borderColor = "#EED202" ;
    document.getElementById("daySelect").style.borderColor = "#EED202" ;
    document.forms["registerform"]["monthSelect"].value = "";
    document.forms["registerform"]["yearSelect"].value = "";
    document.forms["registerform"]["daySelect"].value = "";
    toggle = false;

}


if(toggle == true){
    if(!validateNRIC(document.forms["registerform"]["Reg_NRIC"].value))
        {
        document.getElementById("Reg_NRIC").style.borderBottomColor = "#cc0000";
         document.getElementById("Reg_NRIC").value = ""; //clear input 
         document.getElementById('Reg_NRICL').innerHTML = "<i class='fas fa-exclamation-circle'></i>" + "    Invalid NRIC";
         document.getElementById('Reg_NRICL').style.color = "#cc0000";
         setTimeout(function(){ 
             document.getElementById('Reg_NRICL').innerHTML = "Enter NRIC"; 
             document.getElementById('Reg_NRICL').style.color = "#9b9b9b";
         }, 2000);
         toggle = false;
        }
        if(!validatePW(document.forms["registerform"]["Reg_PW"].value))
        {
        document.getElementById("Reg_PW").style.borderBottomColor = "#cc0000";
         document.getElementById("Reg_PW").value = ""; //clear input 
         document.getElementById('Reg_PWL').innerHTML = "<i class='fas fa-times-circle'></i>" + "    At least a Uppercase & a Lowercase, a Number, 8 Char";
         document.getElementById('Reg_PWL').style.color = "#cc0000";
         setTimeout(function(){ 
             document.getElementById('Reg_PWL').innerHTML = "Enter Password"; 
             document.getElementById('Reg_PWL').style.color = "#9b9b9b";
         }, 2000);
         toggle = false;

        }
        if(document.forms["registerform"]["Reg_RPW"].value != document.forms["registerform"]["Reg_PW"].value)
        {
        document.getElementById("Reg_RPW").style.borderBottomColor = "#cc0000";
         document.getElementById("Reg_RPW").value = ""; //clear input 
         document.getElementById('Reg_RPWL').innerHTML = "<i class='fas fa-times-circle'></i>" + "    Password Not Matched";
         document.getElementById('Reg_RPWL').style.color = "#cc0000";
         setTimeout(function(){ 
             document.getElementById('Reg_RPWL').innerHTML = "Re-Enter Password"; 
             document.getElementById('Reg_RPWL').style.color = "#9b9b9b";
         }, 2000);
         toggle = false;

        }
        if(!validateName(document.forms["registerform"]["Reg_FullName"].value)){
            document.getElementById("Reg_FullName").style.borderBottomColor = "#cc0000";
            document.getElementById("Reg_FullName").value = ""; //clear input 
            document.getElementById('Reg_FullNameL').innerHTML = "<i class='fas fa-times-circle'></i>" + "    Invalid Full Name";
            document.getElementById('Reg_FullNameL').style.color = "#cc0000";
            setTimeout(function(){ 
                document.getElementById('Reg_FullNameL').innerHTML = "Enter Full Name (as in NRIC)"; 
                document.getElementById('Reg_FullNameL').style.color = "#9b9b9b";
            }, 2000);
            toggle = false;
   
       }
       if(!validateEmail(document.forms["registerform"]["Reg_E-mail"].value)){
        document.getElementById("Reg_E-mail").style.borderBottomColor = "#cc0000";
        document.getElementById("Reg_E-mail").value = ""; //clear input 
        document.getElementById('Reg_E-mailL').innerHTML = "<i class='fas fa-times-circle'></i>" + "    Invalid E-Mail (i.e @gmail.com)";
        document.getElementById('Reg_E-mailL').style.color = "#cc0000";
        setTimeout(function(){ 
            document.getElementById('Reg_E-mailL').innerHTML = "E-mail"; 
            document.getElementById('Reg_E-mailL').style.color = "#9b9b9b";
        }, 2000);
        toggle = false;
    }

}

    if(toggle == false)
    {
        return false;
    }
        
    return true;

}

function validateNRIC(str) {
    if (str.length != 9) 
        return false;

    str = str.toUpperCase();

    var i, 
        icArray = [];
    for(i = 0; i < 9; i++) {
        icArray[i] = str.charAt(i);
    }

    icArray[1] = parseInt(icArray[1], 10) * 2;
    icArray[2] = parseInt(icArray[2], 10) * 7;
    icArray[3] = parseInt(icArray[3], 10) * 6;
    icArray[4] = parseInt(icArray[4], 10) * 5;
    icArray[5] = parseInt(icArray[5], 10) * 4;
    icArray[6] = parseInt(icArray[6], 10) * 3;
    icArray[7] = parseInt(icArray[7], 10) * 2;

    var weight = 0;
    for(i = 1; i < 8; i++) {
        weight += icArray[i];
    }

    var offset = (icArray[0] == "T" || icArray[0] == "G") ? 4:0;
    var temp = (offset + weight) % 11;

    var st = ["J","Z","I","H","G","F","E","D","C","B","A"];
    var fg = ["X","W","U","T","R","Q","P","N","M","L","K"];

    var theAlpha;
    if (icArray[0] == "S" || icArray[0] == "T") { theAlpha = st[temp]; }
    else if (icArray[0] == "F" || icArray[0] == "G") { theAlpha = fg[temp]; }

    return (icArray[8] === theAlpha);
}



function validatePW(str)
{
var lowerCaseLetters = /[a-z]/g;
var upperCaseLetters = /[A-Z]/g;
var numbers = /[0-9]/g;
// Validate length
if(str.length < 8 ) {
    return false;
}

if(!str.match(lowerCaseLetters)) {
    return false;
}

// Validate capital letters

if(!str.match(upperCaseLetters)) {
    return false;
}

// Validate numbers

if(!str.match(numbers)) {
    return false;
}


return true;

}

function validateName(str)
{
    var specialstr = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
    var number = /[0-9]/g;
    if(str.length < 4 ) {
        return false;
    }
    if(str.match(specialstr)) {
        return false;
    }
    if(str.match(number)) {
        return false;
    }
    return true;
    
}

function validateEmail(str){

    var gmail = "@gmail.com";
    var ntu = "@ntu.edu.com";
    var yahoo = "@yahoo.com";
    /*alert(str.endsWith(gmail));*/
    if(str.endsWith(gmail) || str.endsWith(ntu) || str.endsWith(yahoo))
    {
        return true;
    }
    return false;

}




