<?php

if (isset($_POST['login_submit'])){
    require "db.php";
    $username = $_POST['username'];
    $acc_pas = $_POST['acc_pas'];

    if(empty($username) || empty($acc_pas)){
        header("Location: ./login.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM new_user WHERE username=? OR email=?";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ./login.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, 'ss', $username, $acc_pas);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pass_check = password_verify($acc_pas, $row['acc_pas']);
                if($pass_check == false){
                    header("Location: ./login.php?error=wrongpassword");
                    exit();
                }
                else if($pass_check == true){
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    header("Location: ./uspjesni_login.php");
                }
            }
            else{
                header("Location: ./login.php?error=nouser");
                exit();
            }
        }
        
    }

}
else{
    header("Location: ./index.php");
    exit();
}



?>