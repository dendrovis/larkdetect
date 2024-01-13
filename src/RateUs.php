<?php
include('header.php');
?>

<html>
    <head>
        <title>Rate Us</title>
        <link rel="stylesheet" href="css/frame.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/headfoot.css">
        <link rel="stylesheet" href="css/layout.css">
        <link rel="stylesheet" href="/external/fontawesome-free-5.12.1-web/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
    </head>
    <body>
    <div class = "bgrd">
        <div class="limiter">
            <div class="container">
                <div class="wrap_RateUs">
                
                    <div class = "RateUs_r1">
                        <h1> Rate Our Service </h1>
                    </div>
                    <div class = "RateUs_r2">
                        <div class = "RateUs_c1" id = "smile" onclick="smile()"><i class="far fa-8x fa-smile"></i></div>
                        <div class = "RateUs_c2" id = "normal" onclick="normal()"><i class="far fa-8x fa-meh"></i></div>
                        <div class = "RateUs_c3" id = "sad" onclick="sad()"><i class="far fa-8x fa-frown"></i></div>
                    </div>
                    <div class = "RateUs_r3">
                        <div class="wrap_btn">
                            <div class="form_bgbtn"></div>
                                <button onclick = "confirm()"  type="submit" class="login_form_btn">Confirm</button>
                        </div>
                    </div>
                    <div id = "overlay_ty" >
                        <h1 class = "ty"> Thank you!!! </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script src= "/external/jquery/jquery-3.4.1.js"></script> 
    <script type= "text/javascript" src="js/bgrd.js"></script>
    <script type= "text/javascript" src="js/rate.js"></script>
    <script type= "text/javascript" src="js/overlay.js"></script>
</html>

<?php
include('footer.php');
?>