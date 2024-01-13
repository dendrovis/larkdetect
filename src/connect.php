<?php
    $conn = mysqli_connect("cz3002.cdarujhvamzz.ap-southeast-1.rds.amazonaws.com","admin","a1a2a3a4a5","innodb");

    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>