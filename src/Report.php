<?php
    session_start();
    include_once "connect.php";

    ##login session -- whr to 
	if(isset($_SESSION['NRIC'])){
        $nric = $_SESSION['NRIC'];
    }else{
        header('Location: Index.php');
    }

    ##get user data
    $query = "SELECT * FROM test WHERE NRIC='".$nric."' ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result)){
        $time_A = $row['time_A'];
        $time_B = $row['time_B'];
        $risk = $row['risk'];
    }

    ##get average data -- $test_A. $test_B
    $query = "SELECT * FROM global";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)){
        $var_name = $row['average'];
        ${$var_name} = $row['time'];
    }
    
    include_once "dc.php";
    include_once 'header.php';
?>
<html>
    <head>
        <title>Report</title>
        <link rel="stylesheet" href="css/frame.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/headfoot.css">
        <link rel="stylesheet" href="css/layout.css">
        <link rel="stylesheet" href="/external/fontawesome-free-5.12.1-web/css/all.css">
        <!-- link .css here (a demo test_wrap.css) -->
        <!--<link rel="stylesheet" href="_Front-End_Beta/test_wrap.css">-->
        <!-- -->
        <meta name="viewport" content="width=device-width, initial-scale=1">   
    </head>
    <body>
    <div class = "bgrd2">
        <div class="limiter">
            <div class="container">
                <!-- Do rescale your class "wrap_(your identifier)" -->
                <div class="wrap_report"> <!-- Do customize them with seperated .css or .js to prevent code conflict --> 
                <!-- fill your content -->
                    <!-- Minimum HTML, please alter according to your content freely --> 
                    <div class = "report_r1"><h3>Result</h3></div>
                    <div class = "report_r2">
                        <div class = "report_c1">
                            <div class = "report_c1_1"><h1 class = "report_ttt">Total Time Taken</h1></div>
                            <div class = "report_c1_2"><div class="containerL chartL" data-size="360" data-value="<?php echo $time_A+$time_B; ?>" data-arrow="up"> </div></div><!-- data-size no use one-->
                            <div class = "report_c1_3"><h1 class = "report_rod">Risk to Dementia:</h1><h1><?php echo $risk;?></h1></div>
                        </div>
                        <div class = "report_c2">
                            <div class = "report_c2_c1"><h1 class = "report_t">Test A</h1></div>
                            <div class = "report_c2_c2"><div class="containerM chartM" data-size="360" data-value="<?php echo $time_A; ?>" data-arrow="up"> </div></div>
                            <div class = "report_c2_c3"><h1 class = "report_t">Test B</h1></div>
                            <div class = "report_c2_c4"><div class="containerM chartM2" data-size="360" data-value="<?php echo $time_B; ?>" data-arrow="up"> </div></div>
                            <div class = "report_c2_c5">
                                <div class = "report_c2_c5l">
                                    <!--<button type="submit" name = "records" class="login_form_btn" onclick="window.location.href = 'Record.php';">Records</button>--> 
                                    <div class="wrap_btn">
                                        <div class="form_bgbtn"></div>
                                            <button name="records" type="submit" class="login_form_btn" onclick="window.location.href = 'Record.php';">Records</button>
                                    </div>
                                </div>
                                <div class = "report_c2_c5r">
                                    <!--<button type="submit" name = "end" class="login_form_btn" onclick="window.location.href = 'Main.php';">End</button>-->
                                    <div class="wrap_btn">
                                        <div class="form_bgbtn"></div>
                                            <button name="end" type="submit" class="login_form_btn" onclick="window.location.href = 'Main.php';">End</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "report_c3">
                            <div class = "report_c3r1">
                                <div class = "report_c3r1_c1"><div class="containerS chartS" data-size="360" data-value="<?php echo $all; ?>" data-arrow="up"> </div></div>
                                <div class = "report_c3r1_c2"><h2 class = "report_a">Average Time of All User:</h2></div>
                            </div>
                            <div class = "report_c3r2">
                                <div class = "report_c3r2_c1"><div class="containerS chartS2" data-size="360" data-value="<?php echo $female; ?>" data-arrow="up"> </div></div>
                                <div class = "report_c3r2_c2"><h2 class = "report_a">Average Time (Female):</h2></div>
                            </div>
                            <div class = "report_c3r3">
                                <div class = "report_c3r3_c1"><div class="containerS chartS3" data-size="360" data-value="<?php echo $male; ?>" data-arrow="up"> </div></div>
                                <div class = "report_c3r3_c2"><h2 class = "report_a">Average Time (Male):</h2></div>
                            </div>
                        </div>
                    </div>

                <!-- end of content -->
                </div> 
            </div>
        </div>
    </div>
    </body>
    <!-- link .js here -->

    <!-- -->
    <script src= "/external/jquery/jquery-3.4.1.js"></script> 
    <script type= "text/javascript" src="js/bgrd.js"></script>
    <script src= "js/piechartL.js"></script>
    <script src= "js/piechartM.js"></script>
    <script src= "js/piechartM2.js"></script>
    <script src= "js/piechartS.js"></script>
    <script src= "js/piechartS2.js"></script>
    <script src= "js/piechartS3.js"></script>
</html>
<?php
    include('footer.php');
?>