<?php
    echo "<center><h1><a href='logout.php'>Logout</a></h1></center>";
    $id = $_GET['v'];
    // echo $id;exit;

    $con = mysqli_connect('localhost','root','','evote');


    $q2 = "update candidate set status = 2 where lid ='".$id."'";
            $r1 = mysqli_query($con,$q2);

            if($q2)
            {
                echo "<script>alert('Added successful')</script>"; // used script for pop-up message
                echo "<script> location.href='admin.php'; </script>";
            }
            else{
                echo "<script>alert('Adding candidate failed')</script>";
                echo "<script> location.href='admin.php'; </script>";
            }

?>