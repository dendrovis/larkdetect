<?php
    session_start();
    include_once 'connect.php';
	if(isset($_SESSION['NRIC'])){
        $nric = $_SESSION['NRIC'];
    }else{
        header('Location: Index.php');
    }
    
    #user only can do 3 times per year
    $year = date("Y", time());

    $query = "SELECT * FROM test WHERE NRIC='".$nric."' AND Year='".$year."'";
    $result = mysqli_query($conn, $query);
    $exists = mysqli_num_rows($result);
    if ($exists == 0){
        echo '<script language="javascript">';
        echo 'alert("You do not have any existing record!");window.location.href="Main.php";';
        echo '</script>';
    }else{
        header('Location: Record.php');
    }

    include_once 'dc.php';
?>