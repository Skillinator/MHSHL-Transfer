<?php

include 'dbinfo.php';

$conn = new mysqli('localhost', $user, $pass, 'varsity');

if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

$query = "SELECT * FROM players WHERE TRUE;";

$result = $conn->query($query);

echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
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
