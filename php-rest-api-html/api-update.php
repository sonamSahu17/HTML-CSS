<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Authorization, X-Requested-With');

include "config.php";
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];
$sql = "UPDATE students SET student_name = '{$name}', age = {$age}, city = '{$city}' where id = {$id}";

if(mysqli_query($conn, $sql)){
	
    echo json_encode(array('message' => 'Student Record Updated', 'status' => true));

}else{

 echo json_encode(array('message' => 'Student Record Not Updated.', 'status' => false));

}

?>
