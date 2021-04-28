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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>

    
            

    <!-- <center>
        <h1>
            <a href="voter_register.php"><button type="button" class="btn btn-success">Add new Voter</button></a>&ensp;
            <a href="vote_results.php"><button type="button" class="btn btn-info">Results</button></a>&ensp;
            <a href="index.php"><button type="button" class="btn btn-danger">Logout</button></a>&ensp;
        </h1>
    </center> -->
    <!-- <center><h1><a href="vote_results.php">Results</a></h1></center>
    <center><h1><a href="index.php">Logout</a></h1></center> -->

    

    






<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-vote</title>
</head>
<body>
    <center><h1><a href="voter_register.php">Add new Voter</a></h1></center>
    <center><h1><a href="vote_results.php">Results</a></h1></center>
    <center><h1><a href="index.php">Logout</a></h1></center>

</body>
</html> -->

<?php
include 'header_admin.php';
include 'footer.php';
$con = mysqli_connect('localhost','root','','evote');
$q = "select * from candidate where status = '0'";
// echo $q;exit;
$result = mysqli_query($con,$q);
$n = mysqli_num_rows($result);
// $result = mysql_query($query);
echo "<center>";
if($n>0)
{

echo "<table border='3' >"; // start a table tag in the HTML
echo "<tr><th>CANDIDATE</th><th>PARTY</th></tr>";

    while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
    echo "<h2><tr><td> " . $row['name'] . "</td><br><td>". $row['party'] ."</td><td><a href='add_candidate.php?v=".$row['lid']."'>ADD</a></td></tr></h2>";  //$row['index'] the index here is a field name
    }
}
else{
    echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
    echo "<h2>No new candidates</h2>";
}
echo "</table>";
echo "</center>";
?>



</div>
</div>
</div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>