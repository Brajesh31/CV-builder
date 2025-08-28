<?php
function registrasi($data){
    global $connection;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($connection, $data["password"]);
    $confirmpassword = mysqli_real_escape_string($connection, $data["confirmpassword"]);


    $result = mysqli_query($connection, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Username already exist!');</script>";
        return false;
    }

    if($password !== $confirmpassword){
        echo"<script>alert('Confirmation password not match');</script>";
        return false;
    }

    //encrypt password
    // $password = password_hash($password, PASSWORD_DEFAULT);

    //insert db
    mysqli_query($connection, "INSERT INTO user VALUES('', '$username', '$password')");
    
    // Start the session
    // session_start();
    
    // Store the username in a session variable
    $_SESSION['username'] = $username;
    
    return mysqli_affected_rows($connection);
}
?>