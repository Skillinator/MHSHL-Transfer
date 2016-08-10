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
	$query = "SELECT * FROM players WHERE Major_Key > " . $majorkey . ";";
}else{
	$query = "SELECT * FROM players;";
}

$result = $conn->query($query);

echo "PL";
echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
		echo $row['Major_Key'] . ',';
		echo $row['team'] . ',';
		echo $row['name'] . ',';
		echo $row['id'] . ',';
		echo $row['number'] . ',';
		echo $row['season'] . ',';
		echo $row['gp'] . ',';
		echo $row['goalie'];
		echo ')';
	}
}

echo ']';

$conn->close();

?>
