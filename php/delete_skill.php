<?php
    include("connection.php");
    
    $id = $_GET['id'];
    
    $query = "DELETE FROM `skills` WHERE id='$id'";
    mysqli_query($connection, $query);

    header('location:index3.php');
?>
