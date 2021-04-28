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
        

        <!-- Sing in  Form -->
        <section class="sign-in">
        
            <div class="container">
            <h1></h1>
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="candidate_reg.php" class="signup-image-link">Register Candidate</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="index.php" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="uname" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <!-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> -->
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
    
    
    <form action="index.php" method="POST">
    <center>
    <table>

        <tr>
            <td>Username<input type="text" name="uname" ></td>
        </tr>
        <tr>
            <td>Password<input type="password" name="pass"></td>
        </tr>
        
    
    </center>
    </table>
    <input type="submit" name="login" value="Login">
    <center><a href="voter_register.php">new user</a></center>
    <center><a href="candidate_reg.php">new candidate</a></center>
    </form>   
    
</body>
</html> -->

<?php
// echo "hello";exit;
session_start();
if(isset($_POST['signin']))
{
    // echo "hello";exit;
    $user = $_POST['uname'];
    $pass = $_POST['pass'];
    $pass = md5($pass);

    $con = mysqli_connect('localhost','root','','evote');

    $qry = "select * from login where username='$user' and password = '$pass'";
    // echo "helloiiii";exit;
    // echo $qry;exit;
    $r = mysqli_query($con,$qry);
    $f = mysqli_num_rows($r);

    $row = mysqli_fetch_assoc($r);

    // echo $row['id'];exit;
    $status = $row['status'];
    $id = $row['lid'];
    $_SESSION['id'] = $row['lid'];                  //session declared
    // $user = $row['name'];
    // echo "haaaiii";exit;
    // echo $row['password'];exit;
    // echo $id;exit;
    // echo $status;exit;

    if($f)
    {
        if($status == '1')
        {
            header("location:vote.php?v=$id");

        }
        elseif($status == '2')
        {
            header("location:vote_results.php?v=$id");

        }
        elseif($status == '3')
        {
            header("location:admin.php?v=$id");

        }
        elseif($status == '0')
        {
            echo"<script>alert('Admin not approved')</script>";
        }
        
    }
    else
    {
        // echo"wrong passsword";
        
        echo"<script>alert('Wrong credentials')</script>"; // used script for pop-up message
     /*  header('location:index.php'); */
    }
}

// reloading the page keep says wrong credentials because of the lack of session

?>
