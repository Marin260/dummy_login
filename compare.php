<?php

include 'db.php';

// var iz forme
$username = $_POST['username'];
$email = $_POST['email'];
$acc_pas = $_POST['acc_pas'];

if(empty($username) || empty($email) || empty($acc_pas)){
    header("Location: ./index.php?error=emptyfieldas");
    exit();
}

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
    
    $hash_pas = password_hash($acc_pas, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hash_pas);
    mysqli_stmt_execute($stmt);
    header("Location: ./login.php?signup=success");
}
else{
    //username exists
    exit("Username or email exists1");
}

?>