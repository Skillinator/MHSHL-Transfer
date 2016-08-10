<?php

include 'dbinfo.php';

$db;
$majorkey;

if($_GET['db'] == 'v'){
	$db = "varsity";
}else if($_GET['db'] == 'j'){
	$db = "jv";
}else{
	die("ERROR: jv/varsity selection failed");
}

if($_GET['majorkey'] > 0){
	$majorkey = $_GET['majorkey'];
}else{
	$majorkey = 0;
}

$conn = new mysqli('localhost', $user, $pass, $db);

if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

if($majorkey){
	$query = "SELECT * FROM scoringEvents WHERE Major_Key > " . $majorkey . ";";
}else{
	$query = "SELECT * FROM scoringEvents;";
}
$result = $conn->query($query);

echo "SE";
echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
		echo $row['Major_Key'] . ',';
		echo $row['GameID'] . ',';
		echo $row['TeamID'] . ',';
		echo $row['scorer'] . ',';
		echo $row['a1'] . ',';
		echo $row['a2'] . ',';
		echo $row['period'] . ',';
		echo $row['time'] . ',';
		echo $row['pp'] . ',';
		echo $row['season'];
		echo ')';
	}
}

echo ']';

$conn->close();

?>
