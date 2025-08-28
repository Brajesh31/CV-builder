<?php
include 'connection.php';

$cv_id = $_GET['cv_id'];
$sql = "SELECT id, title, description FROM certifications WHERE cv_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $cv_id);
$stmt->execute();
$result = $stmt->get_result();

$certifications = array();
while($row = $result->fetch_assoc()) {
    $certifications[] = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'description' => $row['description']
    );
}

header('Content-Type: application/json');
echo json_encode($certifications);
?>
