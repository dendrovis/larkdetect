<?php
    session_start();
    include_once 'connect.php';
	if(isset($_SESSION['NRIC'])){
        $nric = $_SESSION['NRIC'];
    }else{
        header('Location: Index.php');
    }
    
    #user only can do 3 times per year
    $recorded_time = time();
    $day = date("j", $recorded_time);
    $month = date("n", $recorded_time);
    $year = date("Y", $recorded_time);

    $query = "SELECT * FROM test WHERE NRIC='".$nric."' AND Year='".$year."'";
    $result = mysqli_query($conn, $query);
    $exists = mysqli_num_rows($result);
    if ($exists == 3){
        $notest = True;
    }elseif($exists == 0){
        $norecord = True;
    }

    $query = "SELECT * FROM test WHERE NRIC='".$nric."' AND Year='".$year."' AND Month='".$month."' AND Day='".$day."'";
    $result = mysqli_query($conn, $query);
    $exists = mysqli_num_rows($result);
    if ($exists == 1){
        $today = True;
    }

    if(isset($_POST['test'])){
        if ($notest){
            echo '<script language="javascript">';
            echo 'alert("You have used up all your 3 attempt for this year! Please try again next year!")';
            echo '</script>';
        }elseif ($today){
            echo '<script language="javascript">';
            echo 'alert("You did it today. Try it another day :)")';
            echo '</script>';
        }else{
            header('Location: TestA.php');
        }
    }

    include_once 'dc.php';
    include_once 'header.php';
?>

<html>
    <head>
        <title>About Us</title>
        <link rel="stylesheet" href="css/frame.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/headfoot.css">
        <link rel="stylesheet" href="css/layout.css">
        <link rel="stylesheet" href="css/TestB.css">
        <link rel="stylesheet" href="/external/fontawesome-free-5.12.1-web/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
    </head>
    <body>
    <div class = "bgrd">
        <div class="limiter">
            <div class="container">
                <div class="wrap_Main">
                    <div class = "Main_c1">
                        <div class = "Main_t_r1"><a href = "#popup1"><p style="text-align:center;font-size:20px;"></p><img src="Assets/Img/Test_Logo.png" alt="Test_Logo" class="Test_Logo"></a></div>
                        <div class = "Main_t_r2"><h1 class = "Main_txtT">Start Test</h1></div>
                    </div>
                    <div class = "Main_c2">
                        <div class = "Main_r_r1">
                        <div class = "Main_r_r1"><a href = "temprecord.php"><img src="Assets/Img/Record_Logo.png" alt="Record_Logo" class="Rec_Logo"></a></div>
                        </div>
                        <div class = "Main_r_r2"><h1 class = "Main_txtR">View Records</h1></div>
                    </div>
                   <!-- <span class = "Main_test"><a href = "#popup1"><p style="text-align:center;font-size:20px;"></p><img src="Assets/Img/Test_Logo.png" alt="Test_Logo" class="Test_Logo"></a></span>
                    
                    <span class = "Main_rec"><a href = "Record.php"><img src="Assets/Img/Record_Logo.png" alt="Record_Logo" class="Rec_Logo"></a></span>-->
                </div>
                <div id="popup1" class="overlay">
                    <div class="popup">
                        <h1 style="text-align:center;">Welcome</h1>
                        <a class="close" href="#">&times;</a>
                        <div class="content" >
                            <br>
                            <p  style="font-size:20px; text-align:center;">This test will take about <font color="red"> 10 minutes</font>  and it consists of <font color="red"> two parts</font> <br>(Test-A & Test-B).</p> <!--<p style="font-size:20px; text-align:left;"><br>TMT-A is primarily a measure of processing speed <br> TMT-B assesses higher cognitive abilities such as mental flexibility. </p>-->
                            <br>
                            <p style="text-align:center;font-size:20px;"><strong >General Rules</strong></p>
                            <p style="font-size:20px;">Complete the test <font color="red"> as soon as possible within 3 mins per test </font> by connecting the circles in sequence.You are given <strong style="color:red;">3</strong> attempts for the whole test.</p>
                            <br>
                        
                            <p style="text-align:center;color:red;font-size:20px;"><strong>Note:</strong><br> Please take this test seriously as it will affect the analysis of your result.<br>Gentle reminder: The timer will start once you click start button.</p>

                        </div>
                        <div class="box">
                            <!-- <a class="button" href="#popup2">Next</a> -->
                            <div class="wrap_btn" >
                                <div class="form_bgbtn"></div>
                                <button name="Agree" type="submit" class="login_form_btn"  onclick="window.location.href = '#popup2';">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="popup2" class="overlay" >
                    <div class="popup" >
                        <h1 style="text-align:center;">Declaration</h1>
                       
                        <div class="content">
                        <p style="margin-top:5%;"></p>
                            <p style="font-size:20px;">I hereby declared that:
                                <br>
                                <br>
                                -I understand that any inaccurate information(eg:idle for 2 mins during the test) will affect 
                                the analysis of test result.
                                <br>
                                <br>
                                -I have understand the general rules of this test and will abide it.
                                <br>
                                <br>
                                -Any attempt of cheating,will affect the accuracy of the result, and I will be responsbile for my own actions.
                            </p>
               
                        </div>
                        <div class="box">
                            <!-- using the report styling to style the button side by side -->
                            <div class = "report_c2_c5l">
                                    <!--<button type="submit" name = "records" class="login_form_btn" onclick="window.location.href = 'Record.php';">Records</button>--> 
                                    <div class="wrap_btn">
                                        <div class="form_bgbtn"></div>
                                            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <button name="test" type="submit" class="login_form_btn">Agree</button>
                                            </form>
                                    </div>
                            </div>
                            <div class = "report_c2_c5r">
                                    <!--<button type="submit" name = "end" class="login_form_btn" onclick="window.location.href = 'Main.php';">End</button>-->
                                    <div class="wrap_btn">
                                        <div class="form_bgbtn"></div>
                                            <button name="end" type="submit" class="login_form_btn" onclick="window.location.href = 'Main.php';">Cancel</button>
                                    </div>
                            </div>
                            <!-- <a class="button" style="float:left;width:40%;margin-left:10%;"href="TestA.php">Agree</a><span><a class="button" style="float:left;width:40%;margin-left:2%;" href="Main.php">Cancel</a></span> -->
                        </div>
                    </div>
                </div>
       
            </div>
        </div>
    </div>
    </body>
    <script src= "/external/jquery/jquery-3.4.1.js"></script> 
    <script type= "text/javascript" src="js/bgrd.js"></script>
</html>

<?php
    include('footer.php');
?>