<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-vote</title>
</head>
<body>
    


<?php
include 'header.php';
include 'footer.php';
// echo "<center><h1><a href='logout.php'>Logout</a></h1></center>";
$con = mysqli_connect('localhost','root','','evote');
$q = "select * from candidate where status = '1'";
// echo $q;exit;
$result = mysqli_query($con,$q);
// $result = mysql_query($query);
echo "<center>";
echo "<table border='3'>"; // start a table tag in the HTML
echo "<tr><th>PARTY</th><th>VOTE</th></tr>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<h2><tr><td> " . $row['party'] . "</td><br><td>". $row['votecount'] ."</td></tr></h2>";  //$row['index'] the index here is a field name
}

echo "</table>";
echo "</center>";
?>
</body>
</html>