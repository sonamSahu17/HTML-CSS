<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Authorization, X-Requested-With');

include "config.php";
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['sid'];

$sql = "DELETE from students where id = {$id}";

if(mysqli_query($conn, $sql)){
	
    echo json_encode(array('message' => 'Student Record Deleted.', 'status' => true));

}else{

 echo json_encode(array('message' => 'Student Record Not Deleted.', 'status' => false));

}


?>
