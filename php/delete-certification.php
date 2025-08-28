<?php
    include("connection.php");
    
    $id = $_GET['id'];
    
    $query = "DELETE FROM certifications WHERE id='$id'";
    mysqli_query($connection, $query);

    header('location:create-certifications.php');
?>
