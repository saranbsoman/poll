<?php
echo "<center><h1><a href='logout.php'>Logout</a></h1></center>";    session_start();
    $id = $_SESSION['id'];
    // echo $id;exit;
    $con = mysqli_connect('localhost','root','','evote');

    if(isset($_POST['submit']))
    {
        $vote = $_POST['vote'];
        // echo $vote;exit;

        $sql = mysqli_query($con, 'SELECT * FROM voter WHERE lid="'.$id.'" AND status="1"');
        if(mysqli_num_rows($sql) > 0 ) {
            echo "<script>alert('Already voted')</script>"; // used script for pop-up message
            echo "<script> location.href='index.php'; </script>";
        }

        else
        {    
            $q1 = "update candidate set votecount = votecount + 1 where party ='".$vote."'";
            $q2 = "update voter set status = 1 where lid ='".$id."'";
            $r1 = mysqli_query($con,$q1);
            $r2 = mysqli_query($con,$q2);

            
            
            if($r1 && $r2)
            {
                echo "<script>alert('Voted successful')</script>"; // used script for pop-up message
                echo "<script> location.href='vote.php'; </script>";
            }
            else{
                echo "<script>alert('voting failed')</script>";
                
            }
        }
    }

?>