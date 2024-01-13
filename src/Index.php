<?php
    $loadTimes = 0;
    session_start();
    /*define('RESTRICTED',1);*/
    include_once 'connect.php';
    unset($_SESSION['success']);
    setcookie("login", "Null"); 
    //check if form is submitted
    if(isset($_POST['login'])){
        
        //normal patient
        if(isset($_POST['doctorcheckbox'])){
            $doctorid = mysqli_real_escape_string($conn,$_POST['NRIC']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);
            $result=mysqli_query($conn,"SELECT * FROM doctor WHERE id = '" . $doctorid. "' and password = '" . $password . "'");
            if ($row = mysqli_fetch_array($result)){
                $_SESSION['doctorid'] = $row['id'];
                header("Location: doctor.php");
            }
        }else{
            $NRIC = mysqli_real_escape_string($conn,$_POST['NRIC']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);
            $result=mysqli_query($conn,"SELECT * FROM patient WHERE NRIC = '" . $NRIC. "' and password = '" . $password . "'");
            if ($row = mysqli_fetch_array($result)){
                $_SESSION['NRIC'] = $row['NRIC'];
                setcookie("login", "Yes");
                header("Location: Main.php");
            }else{
                setcookie("login", "No"); 
            }
        }
        
    }

    include_once 'headerLogin.php';
    include_once 'dc.php';
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/frame.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/headfoot.css">
        <link rel="stylesheet" href="css/layout.css">
        <link rel="stylesheet" href="/external/fontawesome-free-5.12.1-web/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
    </head>
    <body> <!-- onload="toMainPage()"-->
        <div class = "bgrd">
            <div class="limiter">
                <div class="container">
                    <div class="wrap">
                        <form role="form" onsubmit="return toLogin()"  method="post" name="loginform" novalidate> <!--novalidate--> <!-- action="php echo $_SERVER['PHP_SELF']; ?>" --> 
                            <div class = "login_logo"><img src="Assets/Img/Title_Logo.png" alt="LarkDetect_Logo" class="LD_Logo"></div>
                            <div class = "login_title"><label for="title"><b>The Online Trail Making Test</b></label></div>
                            
                            <div class="login_id">
                                <input id="loginID" name = "NRIC" class="form__field" placeholder="Enter NRIC" required>
                                <label id="loginIDL" for="nric" class="form__label">Enter NRIC</label>
                            </div>
                            <div class="login_pw">
                                <input id="loginPW" type="password" name = "password" class="form__field" placeholder="Enter Password" required> <!--id="loginID"-->
                                <label id="loginPWL" for="pw" class="form__label">Enter Password</label>
                            </div>

                            <div class = "login_doctor_fpw">
                                <span class="login_doctor">
                                    <input type="checkbox" id="doctor" name="doctorcheckbox"/>
                                    <label for="doctor" class = "checkDoctor">For Doctor Used</label>
                                </span>
                                <span class = "login_fpw"><a href="ForgetPW.php">Forget Password?</a></span>
                            </div>

                            <div class = "login_btn" >
                                <div class="wrap_btn" >
                                    <div class="form_bgbtn"></div>
                                        <!--<button onclick = "toMainPage()" type="submit" name = "login" class="login_form_btn">Login</button>-->
                                        <button type="submit" name = "login" class="login_form_btn">Login</button>
                                </div>
                            </div>
                            <div class = "login_reg"><a href="Registration.php">Don't have an account? Sign Up</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src= "/external/jquery/jquery-3.4.1.js"></script> 
    <script type= "text/javascript" src="js/bgrd.js"></script>
    <script type= "text/javascript" src="js/cookie.js"></script>
    <script type= "text/javascript" src="js/validate_client.js"></script>
    <script type= "text/javascript" src="js/validate_server.js"></script>
    <script> if(getCookie("login") == "No"){failLogin();}
             /*else if (getCookie("login") == "Yes"){alert("pass");passLogin();}
             else {alert("lol")}*/
    </script>


</html>
<?php
    include_once ('footerLogin.php');
?>
