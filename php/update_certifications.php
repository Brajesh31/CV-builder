<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cv_id = $_POST['cv_id'];
    $cert_name = $_POST['cert_name'];
    $cert_date = $_POST['cert_date'];

    $sql = "INSERT INTO certifications (cv_id, title, description) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("iss", $cv_id, $cert_name, $cert_date);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index2.php");
    } else {
        echo "Error adding certification: " . mysqli_error($connection);
    }
}
