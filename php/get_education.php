<?php
include 'connection.php';

$cv_id = $_GET['cv_id'];
$query = "SELECT * FROM education WHERE cv_id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $cv_id);
$stmt->execute();
$result = $stmt->get_result();

$educations = array();
while ($row = $result->fetch_assoc()) {
    $educations[] = $row;
}

header('Content-Type: application/json');
echo json_encode($educations);
?>
