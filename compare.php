<?php

include 'db.php';

// var iz forme
$username = $_POST['username'];
$email = $_POST['email'];
$acc_pas = $_POST['acc_pas'];

// usporedba
$sql = "SELECT username, email FROM new_user WHERE username=? OR email=?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 0){
    $sql = "INSERT INTO new_user (username, email, acc_pas)
    VALUES (?, ?, ?)";
    if(!mysqli_stmt_prepare($stmt, $sql)){
        exit("SQL error: " + mysqli_errno($conn));
    }
    
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $acc_pas);
    mysqli_stmt_execute($stmt);
    echo "yes";
}
else{
    //username exists
    exit("Username or email exists");
}

?>