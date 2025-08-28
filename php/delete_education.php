<?php
    include("connection.php");
    
    $id = $_GET['id'];
    
    $query = "DELETE FROM `education` WHERE id='$id'";
    mysqli_query($connection, $query);

    header('location:delete-education.php');
?>
