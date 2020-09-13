<?php

include 'db.php';

$username = $_POST['username'];
$acc_pas = $_POST['acc_pas'];
$new_acc_pas = $_POST['new_acc_pas'];


$sql = "SELECT username, acc_pas FROM new_user";
$result = $conn->query($sql);

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




mysqli_close($conn);

?>