<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecomplaintprotal";
    $invalidUser = true;
    $crctpsd = false;
    $_SESSION['uname'] = null;
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if(!isset($_SESSION['loggedin'])) {
                if (isset($_POST['Login'])) {
                    $sql = "select pssd from users where uname = '" . $_POST['uname']. "';";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0) {
                        $invalidUser = false;
                        if($_POST['pssd'] == $result->fetch_assoc()["pssd"])
                            $crctpsd = true;
                            $_SESSION['loggedin'] = true;
                            $_SESSION['uname'] = $_POST['uname'];
                        }
                    }
                }  else {
                    $invalidUser = false;
                    $crctpsd = true;
                    $_SESSION['uname'] = $_POST['uname'];
            }
        } else {
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Complaint</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        if($invalidUser)
            echo "<div class=\"login\" id=\"login\">
            <div class=\"close\">
                <button onclick=\"showLogin()\"><img src=\"../res/icon/close.png\" alt=\"close\" width=\"20px\" height=\"20px\"></button>
            </div>
            <div class=\"login-container\">
                <div class=\"right\">
                    <div class=\"head\">
                        <h1>Welcome Back</h1>
                        <p>Login to E-Complaint Portal and become a change </p>
                    </div>
                    <div class=\"form\">
                        <form action=\"../src/loggedin.php\" method=\"POST\">
                            <div class=\"user input-container\">
                                <img src=\"../res/icon/user.png\" alt=\"User\" srcset=\"\" width=\"40px\">
                                <input type=\"text\" placeholder=\"User Name\" name=\"uname\" id=\"uname\" class=\"signin-input\" required=\"true\"/>
                                </div>
                            <lable class=\"error\">*  enter a valid username</lable>
                            <div class=\"password input-container\">
                                <img src=\"../res/icon/padlock.png\" alt=\"User\" srcset=\"\" width=\"40px\">
                                <input type=\"password\" placeholder =\"Pasword\"  name=\"pssd\" id=\"pssd\" class=\"signin-input\" required=\"true\"/>
                            </div>
                            <div class=\"input-container\">
                                <input type=\"submit\" value=\"Login\" id=\"Login\" class=\"login-submit\" name=\"Login\"/>
                            </div>
                        </form>
                    </div>
                    <div class=\"foot\">
    
                    </div>
                </div>
            </div>
        </div>";
        else if(!$crctpsd)
            echo "<div class=\"login\" id=\"login\">
            <div class=\"close\">
                <button onclick=\"showLogin()\"><img src=\"../res/icon/close.png\" alt=\"close\" width=\"20px\" height=\"20px\"></button>
            </div>
            <div class=\"login-container\">
                <div class=\"right\">
                    <div class=\"head\">
                        <h1>Welcome Back</h1>
                        <p>Login to E-Complaint Portal and become a change </p>
                    </div>
                    <div class=\"form\">
                        <form action=\"../src/loggedin.php\" method=\"POST\">
                            <div class=\"user input-container\">
                                <img src=\"../res/icon/user.png\" alt=\"User\" srcset=\"\" width=\"40px\">
                                <input type=\"text\" placeholder=\"User Name\" name=\"uname\" id=\"uname\" class=\"signin-input\" required=\"true\"/>
                                </div>
                                <div class=\"password input-container\">
                                <img src=\"../res/icon/padlock.png\" alt=\"User\" srcset=\"\" width=\"40px\">
                                <input type=\"password\" placeholder =\"Pasword\"  name=\"pssd\" id=\"pssd\" class=\"signin-input\" required=\"true\"/>
                                </div>
                            <lable class=\"error\">*  incorrect password</lable>
                            <div class=\"input-container\">
                                <input type=\"submit\" value=\"Login\" id=\"Login\" class=\"login-submit\" name=\"Login\"/>
                            </div>
                        </form>
                    </div>
                    <div class=\"foot\">
    
                    </div>
                </div>
            </div>
        </div>
            ";
    ?>
    <nav id="navbar">
        <div class="logo">
            <img src="../res/icon/E-Complaint.png" alt="E Complaint Portal" width="200">
        </div>
        <div class="links">
            <a href="#">Home</a>
            <a href="#">Complaint</a>
            <a href="#">Track</a>
            <a href="#">Contact</a>
            <lable class="welcome">
                <?= "Welcome, " . $_SESSION['uname'] ?>
            </lable>
        </div>
    </nav>

    <div class="hero">
        <div class="left text-container">
            <h2>What is E Complaint Portal</h2>
            <p>
                Centralised Public Grievance Redress and Monitoring System (CPGRAMS) is an online platform available to the citizens 24x7 to lodge their grievances to the public authorities on any subject related to service delivery. It is a single portal connected to all the Ministries/Departments of Government of India and States. Every Ministry and States have role-based access to this system. CPGRAMS is also accessible to the citizens through standalone mobile application downloadable through Google Play store and mobile application integrated with UMANG.
            </p>
        </div>

        <div class="right">
            <img src="../res/img/Complaints.png" alt="Complaint" width="800px"/>
        </div>
    </div>


    <div class="complaint">
        <h2>Complaint on any department</h2>
        <form>
        <div class="complaint-container">
            <div class="complaint-box bank">
                <input type="submit" value="Banking" class="complaint-btn"/>
            </div>

            <div class="complaint-box post">
                <input type="submit" value="Post" class="complaint-btn"/>
            </div>

            <div class="complaint-box education">
                <input type="submit" value="Educaton" class="complaint-btn"/>
            </div>

            <div class="complaint-box transport">
                <input type="submit" value="Transport" class="complaint-btn"/>
            </div>

            <div class="complaint-box education">
                <input type="submit" value="Educaton" class="complaint-btn"/>
            </div>

            <div class="complaint-box transport">
                <input type="submit" value="Transport" class="complaint-btn"/>
            </div>
        </div>
        </form>
    </div>
    <div class="track-complaint">
        <div class="left text-container">
            <h2>Track you Complaints here</h2>
            <p>Enter your unique complaint id below to track the progress of your complaint. You can also find information about who is handling your complant how much progress has been made. Whith this we will be even more transprent about your complaints. You can even update your complaint in the middle of your progress.</p>
            <form>
                <input type="text" class="track-form"/>
                <input type="submit" value="Track" class="track-form"/>
            </form>
        </div>
        <div class="right">
            <img src="../res/icon/tracking.png" alt="tracking" width="800px"/>
        </div>
    </div>

    <div class="about text-container">
        <h2>How does we work</h2>
        <p>
            You can file your grievance online with the Central Government Ministries, Departments and various State Government Departments. This service is provided by the Department of Administrative Reforms and Public Grievances. Users can lodge grievances, get reminder or clarification on past grievances and check the status of already lodged complaints. Detailed information about the grievance redressal is also given
        </p>
        <br><br>
        <p>The status of the grievance filed in CPGRAMS can be tracked with the unique registration ID provided at the time of registration of the complainant. CPGRAMS also provides appeal facility to the citizens if they are not satisfied with the resolution by the Grievance Officer. After closure of grievance if the complainant is not satisfied with the resolution, he/she can provide feedback. If the rating is ‘Poor’ the option to file an appeal is enabled. The status of the Appeal can also be tracked by the petitioner with the grievance registration number.</p>
    </div>

    <div class="footer">
        <div class="link-container">
            <a href="https://www.instagram.com/sudarshan_karthiktk/"><img src="../res/icon/instagramc.png" alt="Instagram" class="footer-icons"/></a>
            <a href="https://github.com/sudarshankarthik"><img src="../res/icon/githubc.png" alt="Github" class="footer-icons"/></a>
            <a href="https://twitter.com/Sudarshan_Karth"><img src="../res/icon/twitterc.png" alt="Twitter" class="footer-icons"/></a>
            <a href="https://www.linkedin.com/in/sudarshan-karthik-thirukandiyur-45583a1ba/"><img src="../res/icon/linkedinc.png" alt="Linkdin" class="footer-icons"/></a>
        </div>
        <div class="footer-text">
            <p>Devloped by Sudarshan Karthik, VIT</p><br>
            <p>© 2023 Sudarshan Karthik</p>
        </div>
    </div>

    <script>
        function showLogin() {
            var x = document.getElementById("login");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }

        }

        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-80px";
        }
        prevScrollpos = currentScrollPos;
        }
    </script>
</body>
</html>