<?php

include 'dbinfo.php';

$db;
$season;

if($_GET['db'] == 'v'){
	$db = "varsity";
}else if($_GET['db'] == 'j'){
	$db = "jv";
}else{
	die("ERROR: jv/varsity selection failed");
}

$conn = new mysqli('localhost', $user, $pass, $db);

if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

$query = "SELECT * FROM seasons;";

$result = $conn->query($query);

echo "SN";
echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
		echo $row['Major_Key'] . ',';
		echo $row['id'] . ',';
		echo $row['year'] . ',';
		echo $row['playoffs'] . ',';
		echo $row['varsity'];
		echo ')';
	}
}

echo ']';

$conn->close();

?>
