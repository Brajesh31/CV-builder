<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $full_name = mysqli_real_escape_string($connection, $_POST['full_name']);
    $designation = mysqli_real_escape_string($connection, $_POST['designation']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $mobileno = mysqli_real_escape_string($connection, $_POST['mobileno']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $selfDescription = mysqli_real_escape_string($connection, $_POST['selfDescription']);

    // Handle photo upload if a new file is selected
    if(isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_destination = "../uploads/" . $photo;
        move_uploaded_file($photo_tmp, $photo_destination);
        
        $sql = "UPDATE creative SET full_name = '$full_name', designation = '$designation', email = '$email', mobileno = '$mobileno', address = '$address', selfDescription = '$selfDescription', photo = '$photo' WHERE id = '$id'";
    } else {
        $sql = "UPDATE creative SET full_name = '$full_name', designation = '$designation', email = '$email', mobileno = '$mobileno', address = '$address', selfDescription = '$selfDescription' WHERE id = '$id'";
    }
    
    if (mysqli_query($connection, $sql)) {
        header("Location: index2.php");
        exit();
    }
}
?>
