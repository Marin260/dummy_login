<?php

include 'db.php';

$username = $_POST['username'];
$acc_pas = $_POST['acc_pas'];
$new_acc_pas = $_POST['new_acc_pas'];


$sql = "SELECT username, acc_pas FROM new_user WHERE username=? OR email=?";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ./update_page.php?error=sqlerror");
    exit();
}
else{
    mysqli_stmt_bind_param($stmt, 'ss', $username, $acc_pas);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) != 1){
        header("Location: ./update_page.php?error=wrongusername");
        exit();
    }
    else if(mysqli_num_rows($result) == 1){
        if($row = mysqli_fetch_assoc($result)){
            $pass_check = password_verify($acc_pas, $row['acc_pas']);
            if($pass_check == false){
                header("Location: ./update_page.php?error=wrongpassword");
                exit();
            }
            else if($pass_check == true){
                //brisat lika iz baze
                $sql = "UPDATE new_user SET acc_pas=? WHERE username=?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ./update_page.php?error=sqlerror");
                    exit();
                }
                else{
                    $hash_pas = password_hash($new_acc_pas, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, 'ss', $hash_pas, $username);
                    mysqli_stmt_execute($stmt);
                    header("Location: ./update_page.php?update_status=success");;
                }
            }
        }

    }
}














/*
$change = 0;

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($row['username'] == $username && $row['acc_pas'] == $acc_pas){
            $change = 1;
        }
        elseif($row['username'] == $username && $row['acc_pas'] != $acc_pas){
            echo "Wrong password";
            $change = 2;
        }
    }
    if($change == 0){
        echo "This user does not exist";
    }
}

if($change == 1){
    $sql = "UPDATE new_user SET acc_pas='$new_acc_pas' WHERE username='$username'";

    if(mysqli_query($conn, $sql)){
        echo 'Your password has been updated succesfully<br><br><a href="index.php">Go back</a>';
    }
    else{
        echo 'Error while updating';
    }
}
*/



mysqli_close($conn);

?>