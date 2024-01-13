function failLogin(){

            document.getElementById("loginPW").style.borderBottomColor = "#cc0000";
            document.getElementById("loginPW").value = ""; //clear input 
            document.getElementById('loginPWL').innerHTML = "<i class='fas fa-times-circle'></i>" + "Invalid NRIC/Password";
            document.getElementById('loginPWL').style.color = "#cc0000";
            setTimeout(function(){ 
                  document.getElementById('loginPWL').innerHTML = "Enter Password"; 
                  document.getElementById('loginPWL').style.color = "#9b9b9b";
            }, 2000);
            document.getElementById("loginID").style.borderBottomColor = "#cc0000";
            document.getElementById("loginID").value = ""; //clear input
            document.getElementById('loginIDL').innerHTML = "<i class='fas fa-times-circle'></i>" + "Invalid NRIC/Password";
            document.getElementById('loginIDL').style.color = "#cc0000";
            setTimeout(function(){ 
                  document.getElementById('loginIDL').innerHTML = "Enter NRIC"; 
                  document.getElementById('loginIDL').style.color = "#9b9b9b";
            }, 2000);
  
}

function failVerify(){
         document.getElementById("Reg_NRIC_V").style.borderBottomColor = "#cc0000";
         document.getElementById("Reg_NRIC_V").value = ""; //clear input
         document.getElementById('vNRICL').innerHTML = "<i class='fas fa-times-circle'></i>"+"    Invalid NRIC/Birthday";
         document.getElementById('vNRICL').style.color = "#cc0000";
         setTimeout(function(){ 
             document.getElementById('vNRICL').innerHTML = "Enter NRIC"; 
             document.getElementById('vNRICL').style.color = "#9b9b9b";
        }, 2000);

}
function failReg(){

      document.getElementById("Reg_NRIC").style.borderBottomColor = "#cc0000";
      document.getElementById("Reg_NRIC").value = ""; //clear input 
      document.getElementById('Reg_NRICL').innerHTML = "<i class='fas fa-times-circle'></i>" + "Registered NRIC";
      document.getElementById('Reg_NRICL').style.color = "#cc0000";
      setTimeout(function(){ 
            document.getElementById('Reg_NRICL').innerHTML = "Enter NRIC"; 
            document.getElementById('Reg_NRICL').style.color = "#9b9b9b";
      }, 2000);

}