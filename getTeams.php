<?php

include 'dbinfo.php';

$conn = new mysqli('localhost', $user, $pass, 'varsity');

if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

$query = "SELECT * FROM teams WHERE TRUE;";

$result = $conn->query($query);

echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
		echo $row['abbr'] . ',';
		echo $row['name'] . ',';
		echo $row['city'] . ',';
		echo $row['id'] . ',';
		echo $row['season'];
		echo ')';
	}
}

echo ']';

$conn->close();

?>
