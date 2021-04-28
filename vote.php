<?php
include 'header.php';
include 'footer.php';
// echo "<center><h1><a href='logout.php'>Logout</a></h1></center>";
if(!isset($_SESSION)) { 
session_start();
}
$con = mysqli_connect('localhost','root','','evote');
$id = $_GET['v'];
// echo $id;exit;
$qry = "select * from voter where lid = '$id' and status = '1'";
        // echo "hello";exit;
        // echo $qry;exit;
        $r = mysqli_query($con,$qry);
        // $f = mysqli_num_rows($r);
        $row = mysqli_fetch_assoc($r);
        $name = $row['name'];

 
?>
<h4> Welcome <?php echo $name; ?> </h4>
<!-- "<h3>Make a Vote </h3>" -->
<center><h1><a href="logout.php">Logout</a></h1></center>
<form action="submit_vote.php" name="vote" method="post" id="myform" >
<center>
<?php



$q = "select * from candidate where status = '1'";
// echo $q;exit;
$result = mysqli_query($con,$q);
// $result = mysql_query($query);
if(mysqli_num_rows($r) > 0 ) {
        echo "<h3> $name, You have already voted</h3>"; 
    }

    else
    {
        echo "<font size='6'> What is your favorite political party? <BR>";
        echo "<table>"; // start a table tag in the HTML

        while($row = mysqli_fetch_array($result))
        {   //Creates a loop to loop through results
                echo "<h2><tr><td><input type='radio' name ='vote' value= " . $row['party'] . ">". $row['party'] ."</td></tr></h2>";  //$row['index'] the index here is a field name
        }

        echo "</table>";

        
        echo '
        </font></center><br>

        <center><input type="submit" value="Submit Vote" name="submit" style="height:30px; width:100px" /></center>
        </form>';
}
        ?>
       


