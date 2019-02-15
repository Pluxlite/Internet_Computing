<!DOCTYPE html>
<html>
<body>
<?php 
$FName = $_POST["FName"]; 
$LName = $_POST["LName"]; 
$EmailAddress = $_POST["EmailAddress"]; 
$City = $_POST["City"];
$Activity =  $_POST["Activity"]; 
$Rating = $_POST["Rating"];

$servername = "localhost";
try{
$username = "rbowen4";
$password = "wordto72";
$conn= new PDO("mysql:host=$servername;dbname=rbowen4",trim($username),trim($password));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected Succesfully"."<br>";
}
catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}

/*try{
	$sql = "create table website_log(FName varchar(9), LName varchar(12), EmailAddress varchar(25),";
	$sql .= "City varchar(20), Activity varchar(20), Rating varchar(5));";
	$conn->exec($sql);
	echo "Table website_log created successfully";
}
catch(PDOException $e){
	echo $sql . "<br>" . $e->getMessage();
}*/

try{
	$sql = "insert into website_log values('".$_POST["FName"]."','".$_POST["LName"]."','".$_POST["EmailAddress"]."',";
	$sql .= "'".$_POST["City"]."','".$_POST["Activity"]."','".$_POST["Rating"]."')";
	$conn->exec($sql);
	echo "New record created successfully in website_log"."<br/><br/>";
}
catch(PDOException $e){
	echo $sql . "<br>" . $e->getMessage();
}
	
	/*$sql = " SELECT FName, LName, EmailAddress, City, Activity, Rating FROM website_log";
$result = $conn-> query($sql);	
	
if( $result-> rowCount > 0)	{
	while($row = $result-> fetch_assoc()){
		echo "<tr><td>". $row["FName"]."<td><td>". $row["LName"]."<td><td>". $row["EmailAddress"]."<td><td>". $row["City"]."<td><td>". $row["Activity"]."<td><td>". $row["Rating"]."<td><td>";
	}
	ech
	o "</table>";
}
	else{
		echo "0 result";
	}*/
	
$sql = "SELECT FName, LName, EmailAddress, City, Activity, Rating FROM website_log";
$result = $conn->query($sql);
 
if ($result->rowCount() > 0) {
    // output data of each row
    while($row = $result->fetch()) {
        echo "FirstName=  " . $row["FName"]. "   LastName= " . $row["LName"]. "   EmailAddress= " . $row["EmailAddress"]. "   City= " . $row["City"]. "   Activity= ". $row["Activity"]. "   Rating= " .$row["Rating"]."<br>";
    }
} else {
    echo "0 results";
}
	
	
//header("Location: profiles.html");
?> 
</body>
</html>
		