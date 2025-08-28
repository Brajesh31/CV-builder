<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cv_id = $_POST['cv_id'];
    $title = $_POST['exp_title'];
    $organization = $_POST['exp_organization'];
    $location = $_POST['exp_location'];
    $start_date = $_POST['exp_start_date'];
    $end_date = $_POST['exp_end_date'];
    $description = $_POST['exp_description'];

    $sql = "INSERT INTO experiences (cv_id, title, organization, location, start_date, end_date, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("issssss", $cv_id, $title, $organization, $location, $start_date, $end_date, $description);

    if ($stmt->execute()) {
        header("Location: index2.php");
    } else {
        echo "Error adding experience: " . $connection->error;
    }
}
?>
