<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-vote</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="candidate_reg.php" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="cname" id="name" placeholder="Candidate Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="party"  placeholder="Which Party?"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                &emsp;&emsp;Gender                               
                            </div>
                            <div class="form-group">
                                <input type="radio" name="gender" value="male" />Male
                                <input type="radio" name="gender" value="female" />Female
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="date" name="dob" id="email" placeholder="Which Party?"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="uname" id="pass" placeholder="Set Username"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Set Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>



<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="candidate_reg.php" method="POST">
    <center>
        <table>
        <input type="hidden" name="hide">
        <tr><td>Candidate Name<input type="text" name="cname"></td></tr>
        <tr><td>Party<input type="text" name="party"></td></tr>
        <tr>
        <td>Gender<input type="radio" name="gender" value="female"> Female</td>
        <td><input type="radio" name="gender" value="male"> Male</td>
        </tr>
        <tr><td>Date of Birth<input type="date" name="dob"></td></tr>
        <tr><td>Set username<input type="text" name="uname"></td></tr>
        <tr><td>Set password<input type="password" name="pass"></td></tr>

        </table>
        <input type="submit" name="register" value="Register">
    
    </center>
    </form>
</body>

</html> -->

<?php

    $con = mysqli_connect('localhost','root','','evote');

    if(isset($_POST['register']))
    {
        $name = $_POST['cname'];
        $party = $_POST['party'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        // exit;
        $rank = "candidate";
        $status = 0;
        $password =md5($pass);

        $q = "INSERT INTO login(username,password,rank,status) VALUES ('".$uname."','".$password."','".$rank."','".$status."')";
        // echo $q;exit;
        $r = mysqli_query($con,$q);

        // $qry1 = "insert into login(username,password,rank,status) values (")";
        $qry = "select * from login where username='$uname' and password = '$pass'";
        // echo "hello";exit;
        // echo $qry;exit;
        $r = mysqli_query($con,$qry);
        // $f = mysqli_num_rows($r);
        $row = mysqli_fetch_assoc($r);
        $lid = $row['lid'];
        // echo $lid;exit;
    

        $qry = "INSERT INTO candidate(name,party,gender,dob,status,lid) VALUES ('".$name."','".$party."','".$gender."','".$dob."','".$status."','".$lid."')";
        // echo $qry;exit;
        $r = mysqli_query($con,$qry);
        if($r)
        {
            echo "<script>alert('registration successful')</script>"; // used script for pop-up message
            echo "<script> location.href='index.php'; </script>";
        }
        else{
            echo "<script>alert('registration failed')</script>";
            
        }
    }

?>