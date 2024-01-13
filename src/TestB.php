<?php
    session_start();
    include_once 'connect.php';

	if(isset($_SESSION['NRIC'])){
        $nric = $_SESSION['NRIC'];
    }else{
        header('Location: Index.php');
    }

    if(isset($_POST['finish'])){
        $time_A = $_COOKIE['test_A'];
        $time_B = $_COOKIE['test_B'];
        
        if(($time_A <= 29) && ($time_B <= 75)){
            $risk = "LOW";
        }elseif (($time_A > 29) && ($time_B > 75)){
            $risk = "HIGH";
        }else{
            $risk = "MEDIUM";
        }

        $error_A = $_COOKIE['error_A'];
        $error_B = $_COOKIE['error_B'];
        $recorded_time = time();
        $day = date("j", $recorded_time);
        $month = date("n", $recorded_time);
        $year = date("Y", $recorded_time);
        $result = mysqli_query($conn,"INSERT INTO test(NRIC,Year,Month,Day,time_A,time_B,error_A,error_B,risk) 
        VALUES('" . $nric . "', '" . $year . "', '" . $month . "', '" . $day . "', '" . $time_A . "', '" . $time_B . "', '" . $error_A ."', '" . $error_B . "', '" . $risk ."')");
        if ($result == TRUE){
            header("Location: Report.php");
        } else {
            header("Location: wrong_test_submission.php");
        }
    }

    include_once 'dc.php';
    include_once 'headerLogin.php';
?>

<html>
    <head>
        <title>Test Set B</title>
        <link rel="stylesheet" href="css/frame.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/headfoot.css">
        <link rel="stylesheet" href="css/layout.css">
        <link rel="stylesheet" href="/external/fontawesome-free-5.12.1-web/css/all.css">
        <!-- link .css here (a demo test_wrap.css) -->
        <!--<link rel="stylesheet" href="_Front-End_Beta/test_wrap.css">-->
        <link rel="stylesheet" href="css/TestB.css">
        
        <!-- -->
        <meta name="viewport" content="width=device-width, initial-scale=1">   
    </head>
    <body>
    <div class = "bgrd">
        <div class="limiter">
            <div class="container">
                <div class="wrapContainer">
                    <div class = "row1"><h3>Test B</h3></div>
                    <div class="row2">
                        <div id="timerCountDown" class="timerDIV">Time left=<span id="timer"></span></div>
                    
                        <canvas id="canvas" width="1000px" height="700px"></canvas>
                        <!-- <div class="row2">
                            <a class="button" style="width:10%;text-align:center; margin-left:45%;margin-top:1%;" onclick="startTest()">Start</a>
                        </div> -->
                    </div>
                    <!-- Start Button -->
                    <div id="buttonPopout" class="overlay2">
                        <div class="buttonPopout">
                            <div class="wrap_btn">
                                <div class="form_bgbtn"></div>
                                <!-- Use <a></a> instead of button so u can remove the style after onclick -->
                                <a id="btnStart" type="submit" style="text-decoration: none;" class="login_form_btn" href="#" onclick="Start()">Start</a>
                            </div>
                        </div>
                
                    </div>
                    <!-- END -->
                    <div id="popupEnd" class="overlay2">
                        <div class="buttonPopout">
                            
                            <div class="wrap_btn">
                                <div class="form_bgbtn"></div>
                                <!-- <button type="submit" class="login_form_btn"  onclick="window.location.href = 'Report.php';"> View Result</button> -->
                                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <button class="login_form_btn" type="submit" name = "finish">View Result</button>
                                </form>
                            </div>
                        </div>
                
                    </div>

                    <!-- <div id="TestResult" class="overlay">
                    <div class="popup">
                        <h2 style="text-align:center;">Your test result</h2>
                        
                        <div class="content">
                        <div class="flex-wrapper">
                            <div class="single-chart">
                                <h3 style="text-align:center;">TMT_A</h3>
                                <svg viewBox="0 0 36 36" class="circular-chart orange">
                                <path class="circle-bg"
                                    d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                                <path class="circle"
                                    stroke-dasharray="100, 100"
                                    d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                                <text id="tmtAResult" x="18" y="20.35" class="percentage"></text>
                                </svg>
                            </div>
                            
                            <div class="single-chart">
                                <h3 style="text-align:center;">TMT_B</h3>
                                <svg viewBox="0 0 36 36" class="circular-chart green">
                                <path class="circle-bg"
                                    d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                                <path class="circle"
                                    stroke-dasharray="100, 100"
                                    d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                                <text id="tmtBResult" x="18" y="20.35" class="percentage"></text>
                                </svg>
                            </div>

                            <div class="single-chart">
                            <h3 style="text-align:center;">Total</h3>
                                <svg viewBox="0 0 36 36" class="circular-chart blue">
                                <path class="circle-bg"
                                    d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                                <path class="circle"
                                    stroke-dasharray="100, 100"
                                    d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                                <text id="totalResult" x="18" y="20.35" class="percentage"></text>
                                </svg>
                            </div>
                        
                        </div>
                        <p id="RESULT" style="text-align:center;"></p>
                        <p id="risk" style="text-align:center;magin-top:1%;"></p>
                        <div class="box">
                            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <button class="button" type="submit" name = "finish">FINISH</button>
                            </form>
                        </div>
                    </div> 
                </div>-->
                </div>
          
            </div>
        </div>
    </div>
</body>
    <!-- link .js here -->

    <!-- -->
    <script src= "/external/jquery/jquery-3.4.1.js"></script> 
    <script type= "text/javascript" src="js/bgrd.js"></script>
    <script type= "text/javascript" src="js/cookie.js"></script>
    <script type="text/javascript" src="js/testBAlgo.js"></script>

</html>

<?php
    include('footerLogin.php');
?>