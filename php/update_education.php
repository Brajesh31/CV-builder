<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cv_id = $_POST['cv_id'];
    $edu_school = $_POST['edu_school'];
    $edu_degree = $_POST['edu_degree'];
    $edu_city = $_POST['edu_city'];
    $edu_start_date = $_POST['edu_start_date'];
    $edu_end_date = $_POST['edu_end_date'];
    $edu_description = $_POST['edu_description'];

    $sql = "INSERT INTO education (cv_id, school, degree, city, start_date, end_date, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("issssss", $cv_id, $edu_school, $edu_degree, $edu_city, $edu_start_date, $edu_end_date, $edu_description);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index2.php");
    } else {
        echo "Error adding education: " . mysqli_error($connection);
    }
}
?>