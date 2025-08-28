<?php
include 'connection.php';

$cv_id = $_GET['cv_id'];
$sql = "SELECT * FROM experiences WHERE cv_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $cv_id);
$stmt->execute();
$result = $stmt->get_result();

$experiences = array();
while ($row = $result->fetch_assoc()) {
    $experiences[] = $row;
}

header('Content-Type: application/json');
echo json_encode($experiences);
?>
