<?php
include 'connection.php';

if (isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    
    if ($type === 'basic') {
        $sql = "SELECT full_name, designation, email, mobileno, address, selfDescription, photo FROM creative WHERE id = '$id'";
        $result = mysqli_query($connection, $sql);
        
        if ($row = mysqli_fetch_assoc($result)) {
            header('Content-Type: application/json');
            echo json_encode($row);
        }
    }
}
?>
