<?php
    session_start();
    include_once "connect.php";

	if(isset($_SESSION['NRIC'])) {
        $nric = $_SESSION['NRIC'];
    }elseif (isset($_SESSION['doctorid'])) {
        $nric = $_GET["nric_view"];
    }
    else{
        header('Location: Index.php');
    }

    ##get user data -- 
    $query = "SELECT * FROM test WHERE NRIC='".$nric."' ORDER BY id";
    $result = mysqli_query($conn, $query);
    $exists = mysqli_num_rows($result);
    if ($exists == 0){
        header('Location: Index.php');
    }

    $data = new stdClass();
    $data->year = array();
    $data->month = array();
    $data->day = array();
    $data->time_A_arr = array();
    $data->time_B_arr = array();
    $data->risk = array();
    $data->error_A = array();
    $data->error_B = array();

    $query = "SELECT * FROM patient WHERE NRIC='".$nric."' LIMIT 5";
    $result1 = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result1)){
        $name = $row["Name"];
        $gender = $row["gender"];
    }

    while($row = mysqli_fetch_assoc($result)){
        #pass into array
        array_push($data->year, $row['Year']);
        array_push($data->month, $row['Month']);
        array_push($data->day, $row['Day']);
        array_push($data->time_A_arr, $row['time_A']);
        array_push($data->time_B_arr, $row['time_B']); 
        array_push($data->risk, $row['risk']);
        array_push($data->error_A, $row['error_A']);
        array_push($data->error_B, $row['error_B']);
    }

    $A = $data->time_A_arr[count($data->time_A_arr) - 1];
    $B = $data->time_B_arr[count($data->time_B_arr) - 1];
    $total = intval($A) + intval($B);

    $day = $data->day[count($data->day) - 1];
    $month = $data->month[count($data->month) - 1];
    $year = $data->year[count($data->year) - 1];

    $error_A = $data->error_A[count($data->error_A) - 1];
    $error_B = $data->error_B[count($data->error_B) - 1];
    $error = intval($error_A) + intval($error_B);

    $risk = $data->risk[count($data->risk) - 1];  
    if($total <= 273){
        $show_result = "PASS";
    }else {
        $show_result = "FAIL";
    }

    $query = "SELECT * FROM global";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)){
        $var_name = $row['average'];
        ${$var_name} = $row['time'];
    }
    
    if(isset($_POST['back'])){
        if(isset($_SESSION['doctorid'])) {
            header("Location: doctor.php");
        }elseif(isset($_SESSION['NRIC'])) {
            header("Location: Report.php");
        }
    }

    ##the data the chart need
    include_once "dc.php";
    include_once 'header.php';
?>

<html>
    <head>
        <title>Record</title>
        <link rel="stylesheet" href="css/frame.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/headfoot.css">
        <link rel="stylesheet" href="css/layout.css">
        <link rel="stylesheet" href="/external/fontawesome-free-5.12.1-web/css/all.css">
        <!-- link .css here (a demo test_wrap.css) -->
        
        <link rel="stylesheet" href="css/record.css">
        <!-- -->
        <meta name="viewport" content="width=device-width, initial-scale=1">  
    </head>
    <body>
    <div class = "bgrd">
        <div class="limiter">
            <div class="container">
                <!-- Do rescale your class "wrap_(your identifier)" -->
                <div class="recordWrapper"> <!-- Do customize them with seperated .css or .js to prevent code conflict --> 
                <!-- fill your content -->
                    <!-- Minimum HTML, please alter according to your content freely --> 
                    <div class = "heading"><h3>Records</h3></div>
                    <div class = "rec_r2">
                        <div class = "rec_c1"> 
                            <div class = "rec_c1r2">
                                <div class = "rec_c1r2c1">
                                    <div class = "adds">
                                        <?php
                                            if ($gender == "male"){
                                                echo "<h1 >Mr</h1>";
                                                echo "<h2>" . $name . "</h2>";
                                                echo "<h2>" . $nric . "</h2>";
                                            }
                                            else{
                                                echo "<h1>Ms</h1>";
                                                echo "<h2>" . $name . "</h2>";
                                                echo "<h2>" . $nric . "</h2>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class = "rec_c1r2c2">
                                        
                                        <?php
                                        if ($gender == "male"){
                                            echo "<div class='fa-stack fa-3x male2'> 
                                                <font color='#5b92e5'><i class='far fa-2x fa-circle fa-stack-2x'></i>
                                                <i class='fas fa-1x fa-mars fa-stack-1x'></i></font>
                                            </div>";
                                        }else{
                                            echo "<div class='fa-stack fa-3x female2'>
                                                <font color='#ff5ba5'><i class='far fa-2x fa-circle fa-stack-2x'></i>
                                                <i class='fas fa-1x fa-venus fa-stack-1x'></i></font>
                                            </div>";
                                        }
                                        
                                        
                                        
                                        ?>
                                        


                                </div>
                            </div>
                           <!-- <div class = "rec_c1r3">
                                
                                
                            </div>-->
                            <div class = "rec_c1r4">
                                <h2>Last Test Taken: <font color="red"><?php echo $day . "-" . $month . "-" . $year?></font></h2> 

                                <!-- Start of the Circular progress bar -->
                                <div class="flex-wrapper">
                                <div class="single-chart" >
                                    <h2 style="text-align:center; font-weight:bold;">Test A</h2> 
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
                                    <text id="tmtAResult" x="18" y="20.35" class="percentage"><?php echo $A . " Sec";?></text>
                                    </svg>
                                </div>
                                
                                <div class="single-chart">
                                    <h2 style="text-align:center;font-weight:bold;">Test B</h2>
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
                                    <text id="tmtBResult" x="18" y="20.35" class="percentage"><?php echo $B . " Sec";?></text>
                                    </svg>
                                </div>

                                <div class="single-chart">
                                <h2 style="text-align:center;font-weight:bold;">Total Time Taken</h2>
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
                                    <text id="totalResult" x="18" y="20.35" class="percentage"><?php echo $total. " Sec";?></text>
                                    </svg>
                                </div>
                            
                                </div>

                                <h2 id="ErrorRate"><br><br>No. Of Errors Made: <?php echo $error;?><br><br><h2>
                                <!--<h3 id="RESULT" style="text-align:center;">php echo "Test Result: ".$show_result; ?></h3> -->
                                 <h2 id="risk" style="text-align:center;magin-top:1%;"><?php echo "Risk Of Dementia: ". "<font color='blue'>". $risk ."</font>";?><br><br><br><br></h2>
                                 <!-- End of the circular progress bar -->
                                <div class="container_btn">
                                    <div class="wrap_btn">
                                        <div class="form_bgbtn"></div>
                                        <!-- is this form necessary? -->
                                        <button type="submit" name = "back" class="form_btn" onClick="javascript:history.go(-1)">Back</button>
                                        <!-- patient/doctor should access from Report.php or Doctor.php respectively-->
                                           
                                         
                                        
                                     
                                        </div>
					                </div>
                                </div>
                                
                            
                      
                            
                            </div>
                        <!-- CHART -->
                        <div class = "rec_c2" >
                         
                            <div id="chartContainer" style="height: 350px; width: 100%;top: 0;">
                                <?php
                                    include('chart.php');
                                ?>
                            </div>
                            <div id="chartContainer1" style="height: 350px; width: 100%;">
                                <?php
                                    include('chart.php');
                                ?>
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!-- <script src="./js/chart.js"></script> -->
    <script src="./js/cookie.js"></script>  
</html>
<?php
    include('footer.php');
?>