<?php
    session_start();
    
    include_once "connect.php";
    setcookie("reg", "Null"); 
    if(isset($_POST['register'])){
        $gender = mysqli_real_escape_string($conn, $_COOKIE['gender']);
        $name = mysqli_real_escape_string($conn, $_POST['Reg_FullName']);
        $nric = mysqli_real_escape_string($conn, $_POST['Reg_NRIC']);
        $email = mysqli_real_escape_string($conn, $_POST['Reg_Email']);
        $password = mysqli_real_escape_string($conn, $_POST['Reg_PW']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $month = mysqli_real_escape_string($conn, $_POST['month']);
        $day = mysqli_real_escape_string($conn, $_POST['day']);
        $result=mysqli_query($conn,"INSERT INTO patient(NRIC,Name,gender,password,email,Year,Month,Day) 
        VALUES('" . $nric . "', '" . $name . "', '" . $gender . "', '" . $password . "', '" . $email . "', '" . $year . "', '" . $month . "', '" . $day . "')");
        if ($result == TRUE){
            setcookie("reg", "Yes");
            header("Location: Index.php");
        } else {
            setcookie("reg", "No");
            /*header("Location: wrong.php");*/
        }
    }

    /*$NRIC = mysqli_real_escape_string($conn,$_POST['NRIC']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $result=mysqli_query($conn,"SELECT * FROM patient WHERE NRIC = '" . $NRIC. "' and password = '" . $password . "'");
    if ($row = mysqli_fetch_array($result)){
        $_SESSION['NRIC'] = $row['NRIC'];
        setcookie("login", "Yes");
        header("Location: Main.php");*/

    include_once 'dc.php';
    include_once 'headerLogin.php';
?>
<html>
    <head>
        <title>Register</title>
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
                <div class="wrap_Reg">
                    <form role="form" onsubmit = "return toRegister()" method="post" name="registerform" novalidate> <!-- action="php echo $_SERVER['PHP_SELF']; ?>"-->
                        <div class = "reg_r1"><h1> Registration </h1></div>
                        
                        <div class = "reg_r2">
                            <div class="fa-stack fa-3x male" id = "male" onclick="male()">
                                <i class="far fa-2x fa-circle fa-stack-2x"></i>
                                <i class="fas fa-1x fa-mars fa-stack-1x"></i>
                            </div>
                        

                            <div class="fa-stack fa-3x female" id = "female" onclick="female()">
                                <i class="far fa-2x fa-circle fa-stack-2x"></i>
                                <i class="fas fa-1x fa-venus fa-stack-1x"></i>
                            </div>
                        </div>

                        <div class = "reg_r3">
                            <!--<input type="text" placeholder="Enter Full Name (as in NRIC)" name="Uname" required>-->
                            <div class="login_pw">
                                    <input type="text" id="Reg_FullName" name = "Reg_FullName" class="form__field" placeholder="Enter Full Name (as in NRIC)" required>
                                    <label id="Reg_FullNameL" class="form__label">Enter Full Name (as in NRIC)</label>
                            </div>
                        </div>

                        <div class = "reg_r4">
                            <!--<input type="text" placeholder="Enter NRIC" name="nric" required>-->
                            <div class="login_pw">
                                    <input type="text" id="Reg_NRIC" name = "Reg_NRIC" class="form__field" placeholder="Enter NRIC" required>
                                    <label id="Reg_NRICL" class="form__label">Enter NRIC</label>
                            </div>
                        </div>

                        <div class = "reg_r5">
                            <!--<input type="text" placeholder="E-mail" name="email" required>-->
                            <div class="login_pw">
                                    <input type="text" id="Reg_E-mail" name = "Reg_Email" class="form__field" placeholder="E-mail" required>
                                    <label id="Reg_E-mailL" class="form__label">E-mail</label>
                            </div>
                        </div>

                        <div class = "reg_r6">
                            <!--<input type="password" placeholder="Password" name="password" required>-->
                            <div class="login_pw">
                                    <input type="password" id="Reg_PW" name = "Reg_PW" class="form__field" placeholder="Enter Password" required>
                                    <label id="Reg_PWL" class="form__label">Enter Password</label>
                            </div>
                        </div>

                        <div class = "reg_r7">
                            <!--<input type="password" placeholder="Re-type Password" name="re_password" required>-->
                            <div class="login_pw">
                                    <input type="password" id="Reg_RPW" name = "Reg_RPW" class="form__field" placeholder="Re-Enter Password" required>
                                    <label id="Reg_RPWL" class="form__label">Re-Enter Password</label>
                            </div>
                        </div>

                        <div class = "reg_r8">
                            <p>D.O.B</p>
                        </div>
                        <div class = "reg_r9">
                            <div class = "reg_c1">
                                <div class = "select">
                                    <select id="daySelect" name = "day" value = "DD">
                                        <option value="" disabled selected hidden>DD</option>
                                    </select>
                                </div>
                            </div>
                            <div class = "reg_c2">
                                <div class = "select">
                                    <select id="monthSelect" name = "month" value = "MM">
                                        <option value="" disabled selected hidden>MM</option>
                                        <option value="1">JAN</option>
                                        <option value="2">FEB</option>
                                        <option value="3">MAR</option>
                                        <option value="4">APR</option>
                                        <option value="5">MAY</option>
                                        <option value="6">JUN</option>
                                        <option value="7">JUL</option>
                                        <option value="8">AUG</option>
                                        <option value="9">SEP</option>
                                        <option value="10">OCT</option>
                                        <option value="11">NOV</option>
                                        <option value="12">DEC</option>
                                    </select>
                                </div>
                            </div>
                            <div class = "reg_c3">
                                <div class = "select">
                                    <select id="yearSelect" name = "year" value = "YYYY">
                                        <option value="" disabled selected hidden>YYYY</option>
                                        <option value="1980">1980</option>
                                        <option value="1979">1979</option>
                                        <option value="1978">1978</option>
                                        <option value="1977">1977</option>
                                        <option value="1976">1976</option>
                                        <option value="1975">1975</option>
                                        <option value="1974">1974</option>
                                        <option value="1973">1973</option>
                                        <option value="1972">1972</option>
                                        <option value="1971">1971</option>
                                        <option value="1970">1970</option>
                                        <option value="1969">1969</option>
                                        <option value="1968">1968</option>
                                        <option value="1967">1967</option>
                                        <option value="1966">1966</option>
                                        <option value="1965">1965</option>
                                        <option value="1964">1964</option>
                                        <option value="1963">1963</option>
                                        <option value="1962">1962</option>
                                        <option value="1961">1961</option>
                                        <option value="1960">1960</option>
                                        <option value="1959">1959</option>
                                        <option value="1958">1958</option>
                                        <option value="1957">1957</option>
                                        <option value="1956">1956</option>
                                        <option value="1955">1955</option>
                                        <option value="1954">1954</option>
                                        <option value="1953">1953</option>
                                        <option value="1952">1952</option>
                                        <option value="1951">1951</option>
                                        <option value="1950">1950</option>
                                        <option value="1949">1949</option>
                                        <option value="1948">1948</option>
                                        <option value="1947">1947</option>
                                        <option value="1946">1946</option>
                                        <option value="1945">1945</option>
                                        <option value="1944">1944</option>
                                        <option value="1943">1943</option>
                                        <option value="1942">1942</option>
                                        <option value="1941">1941</option>
                                        <option value="1940">1940</option>
                                        <option value="1939">1939</option>
                                        <option value="1938">1938</option>
                                        <option value="1937">1937</option>
                                        <option value="1936">1936</option>
                                        <option value="1935">1935</option>
                                        <option value="1934">1934</option>
                                        <option value="1933">1933</option>
                                        <option value="1932">1932</option>
                                        <option value="1931">1931</option>
                                        <option value="1930">1930</option>
                                        <option value="1929">1929</option>
                                        <option value="1928">1928</option>
                                        <option value="1927">1927</option>
                                        <option value="1926">1926</option>
                                        <option value="1925">1925</option>
                                        <option value="1924">1924</option>
                                        <option value="1923">1923</option>
                                        <option value="1922">1922</option>
                                        <option value="1921">1921</option>
                                        <option value="1920">1920</option>
                                        <option value="1919">1919</option>
                                        <option value="1918">1918</option>
                                        <option value="1917">1917</option>
                                        <option value="1916">1916</option>
                                        <option value="1915">1915</option>
                                        <option value="1914">1914</option>
                                        <option value="1913">1913</option>
                                        <option value="1912">1912</option>
                                        <option value="1911">1911</option>
                                        <option value="1910">1910</option>
                                        <option value="1909">1909</option>
                                        <option value="1908">1908</option>
                                        <option value="1907">1907</option>
                                        <option value="1906">1906</option>
                                        <option value="1905">1905</option>
                                        <option value="1904">1904</option>
                                        <option value="1903">1903</option>
                                        <option value="1902">1902</option>
                                        <option value="1901">1901</option>
                                        <option value="1900">1900</option>
                                        <option value="1899">1899</option>
                                        <option value="1898">1898</option>
                                        <option value="1897">1897</option>
                                        <option value="1896">1896</option>
                                        <option value="1895">1895</option>
                                        <option value="1894">1894</option>
                                        <option value="1893">1893</option>
                                        <option value="1892">1892</option>
                                        <option value="1891">1891</option>
                                        <option value="1890">1890</option>
                                        <option value="1889">1889</option>
                                        <option value="1888">1888</option>
                                        <option value="1887">1887</option>
                                        <option value="1886">1886</option>
                                        <option value="1885">1885</option>
                                        <option value="1884">1884</option>
                                        <option value="1883">1883</option>
                                        <option value="1882">1882</option>
                                        <option value="1881">1881</option>
                                        <option value="1880">1880</option>
                                        <option value="1879">1879</option>
                                        <option value="1878">1878</option>
                                        <option value="1877">1877</option>
                                        <option value="1876">1876</option>
                                        <option value="1875">1875</option>
                                        <option value="1874">1874</option>
                                        <option value="1873">1873</option>
                                        <option value="1872">1872</option>
                                        <option value="1871">1871</option>
                                        <option value="1870">1870</option>
                                        <option value="1869">1869</option>
                                        <option value="1868">1868</option>
                                        <option value="1867">1867</option>
                                        <option value="1866">1866</option>
                                        <option value="1865">1865</option>
                                        <option value="1864">1864</option>
                                        <option value="1863">1863</option>
                                        <option value="1862">1862</option>
                                        <option value="1861">1861</option>
                                        <option value="1860">1860</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class = "reg_r10">
                            <!--<form action="Index.php">-->
                                <div class="wrap_btn">
                                <div class="form_bgbtn"></div>
                                    <button name="register" type="submit" class="login_form_btn">Register</button>
                                </div>
                           <!-- </form>-->
                        </div>
                        </div><!-- hidden gender value-->
                            <input type="hidden" type="text" id="genderV" name = "genderV"  placeholder="NULL">
                        <div>
                    </form>
                </div>
            </div>
        </div>
    
        
    </div>
    </body>
    <script src = "js/gender.js"></script>
    <script src = "js/cookie.js"></script>
    <script src= "/external/jquery/jquery-3.4.1.js"></script> 
    <script type= "text/javascript" src="js/date.js"></script>
    <script type= "text/javascript" src="js/bgrd.js"></script>
    <script type= "text/javascript" src="js/validate_client.js"></script>
    <script type= "text/javascript" src="js/validate_server.js"></script>
    <script> if(getCookie("reg") == "No"){failReg();}
             /*else if (getCookie("login") == "Yes"){alert("pass");passLogin();}
             else {alert("lol")}*/
    </script>
<?php
    include('footerLogin.php');
?>