<?php
    session_start();

    include_once "connect.php";

    if(isset($_SESSION['doctorid'])){
        $doctor_id = $_SESSION['doctorid'];
    }else{
        header('Location: Index.php');
    }

    if(isset($_SESSION['search'])){
        $search = $_SESSION['search'];
        $query = "SELECT id, test.NRIC, Name, gender, time_A, time_B  FROM test INNER JOIN patient ON test.NRIC = patient.NRIC WHERE patient.NRIC = '" .$search . "'";
        $result = mysqli_query($conn,$query);
        if($result){
        }
        unset($_SESSION['search']);
    }else{
        $query = "SELECT id, test.NRIC, Name, gender, time_A, time_B  FROM test INNER JOIN patient ON test.NRIC = patient.NRIC";
        $result=mysqli_query($conn,$query);
    }

    if(isset($_POST['search'])){
        $search = mysqli_real_escape_string($conn,$_POST['searchbar']);
        $_SESSION["search"] = $search;
        header('Location: doctor.php');
    }

    include_once 'header.php';
?>
<html>
    <head>
        <title>Doctor</title>
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
    <div class = "bgrd">
        <div class="limiter">
            <div class="container">
                <!-- Do rescale your class "wrap_(your identifier)" -->
                <div class="wrap_doc"> <!-- Do customize them with seperated .css or .js to prevent code conflict --> 
                <!-- fill your content -->
                    <!-- Minimum HTML, please alter according to your content freely --> 
                    <div class = "doc_r1"><h3 class ="doc_title">Patient Records</h3></div>
                    <div class = "doc_r2">
                        <!--<div class = "doc_c1">-->
                            <!--<div class = "select">
                                <select id="searchbar" value = "EMPTY">
                                    <option value="" disabled selected hidden>Click Here to Search</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                            </div>-->
                            <div class="search">
                                <form class = "searchf" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
                                    <input type="text" class="searchTerm" placeholder="Search NRIC" name="searchbar" onfocus="this.placeholder=''">
                                    <button type="submit" name="search" class="searchButton"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                       <!-- </div>-->
                        <!--<div class = "doc_c2">
                            <div class = "select2">
                                <select id="searchby2" value = "EMPTY">
                                    <option value="" disabled selected hidden>Search By</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                            </div>
                        </div>-->
                      <!--  <div class = "doc_c3">
                            <i class="fas fa-2x fa-sort-amount-up-alt"></i>
                        </div>-->
                    </div>
                    <div class = "doc_r3">
                        <table class = "doc_table">
                        <thead >
                            <tr >
                                <th class = "doc_table_d">ID</th>
                                <th class = "doc_table_d">NRIC</th> 
                                <th class = "doc_table_d">FULL NAME</th>
                                <th class = "doc_table_d">Gender</th>
                                <th class = "doc_table_d">Test A(sec)</th>
                                <th class = "doc_table_d">Test B(sec)</th>
                                <th class = "doc_table_d">Total Time Taken(sec)</th>
                            </tr>
                        </thead>
                        <?php
                            //below code is a while loop...it will repeat till the table had listed completely...
                            while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <tbody>
                            <tr>
                                <th class = "doc_table_g"><?php echo $row['id']; ?></th>
                                <th class = "doc_table_g"><?php echo "<a href='record.php?nric_view=".$row['NRIC']."'>".$row['NRIC']."</a>"; ?></th>
                                <th class = "doc_table_g"><?php echo $row['Name']; ?></th>
                                <th class = "doc_table_g"><?php echo $row['gender']; ?></th>
                                <th class = "doc_table_g"><?php echo $row['time_A']; ?></th>
                                <th class = "doc_table_g"><?php echo $row['time_B']; ?></th>
                                <th class = "doc_table_g"><?php echo ($row['time_A'] + $row['time_B']);?></th>
                            </tr>
                        </tbody>
                        
                        <?php
                            }
                            //free result is not a neccesary code...add syok je... 
                            mysqli_free_result($result); 
                        ?>
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
</html>
<?php
    include_once 'dc.php';
    include('footer.php');
?>