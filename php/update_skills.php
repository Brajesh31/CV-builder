<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cv_id = $_POST['cv_id'];
    $skill_name = $_POST['skill_name'];

    $sql = "INSERT INTO skills (cv_id, skill_name) VALUES (?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("is", $cv_id, $skill_name);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index2.php");
    } else {
        echo "Error adding skill: " . mysqli_error($connection);
    }
}
