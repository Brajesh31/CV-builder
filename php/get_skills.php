<?php
include 'connection.php';

$cv_id = $_GET['cv_id'];
$sql = "SELECT id, skill_name FROM skills WHERE cv_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $cv_id);
$stmt->execute();
$result = $stmt->get_result();

$skills = array();
while ($row = $result->fetch_assoc()) {
    $skills[] = $row;
}

header('Content-Type: application/json');
echo json_encode($skills);
?>
