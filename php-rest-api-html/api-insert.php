<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Authorization, X-Requested-With');

include "config.php";
$data = json_decode(file_get_contents("php://input"), true);

$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];
$sql = "INSERT into students(student_name, age, city)values('{$name}','{$age}','{$city }')";

if(mysqli_query($conn, $sql)){
	
    echo json_encode(array('message' => 'Student Record Inserted', 'status' => true));

}else{

 echo json_encode(array('message' => 'Student Record Not Inserted.', 'status' => false));

}


?>
