<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "config.php";
$data = json_decode(file_get_contents("php://input"), true);
$search_term = $data['search'];
$sql = "SELECT * FROM students where student_name LIKE '%{$search_term}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result) > 0 ){

	$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($output);

}else{

 echo json_encode(array('message' => 'No Search Found.', 'status' => false));

}

?>
