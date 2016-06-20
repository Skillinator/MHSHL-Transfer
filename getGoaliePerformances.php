<?php

include 'dbinfo.php';

$conn = new mysqli('localhost', $user, $pass,  'varsity');

if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

$query = "SELECT * FROM goaliePerformances WHERE TRUE;";

$result = $conn->query($query);

echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
		echo $row['GameID'] . ',';
		echo $row['TeamID'] . ',';
		echo $row['player'] . ',';
		echo $row['minutes'] . ',';
		echo $row['ga'] . ',';
		echo $row['sa'] . ',';
		echo $row['seasons'];
		echo ')';
	}
}

echo ']';

$conn->close();

?>
