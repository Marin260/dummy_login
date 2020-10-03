<?php

include "db.php";

$username = $_POST['username'];
$acc_pas = $_POST['acc_pas'];


$sql = "SELECT username, acc_pas FROM new_user WHERE username=?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ./delete_page.php?error=sqlerror");
    exit();
}
else{
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) != 1){
        header("Location: ./delete_page.php?error=wrongusername");
        exit();
    }
    else if(mysqli_num_rows($result) == 1){
        if($row = mysqli_fetch_assoc($result)){
            $pass_check = password_verify($acc_pas, $row['acc_pas']);
            if($pass_check == false){
                header("Location: ./delete_page.php?error=wrongpassword");
                exit();
            }
            else if($pass_check == true){
                //brisat lika iz baze
                $sql = "DELETE FROM new_user WHERE username=?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ./delete_page.php?error=sqlerror");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt, 's', $username);
                    mysqli_stmt_execute($stmt);
                    header("Location: ./delete_page.php?delete_status=success");;
                }
            }
        }
    }
}
mysqli_close($conn);

?>