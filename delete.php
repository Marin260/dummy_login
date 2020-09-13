<?php

include "db.php"

$username = $_POST['username'];
$acc_pas = $_POST['acc_pas'];


$sql = "SELECT username, acc_pas FROM new_user";
$result = $conn->query($sql);

$found = 0;

if ($result->num_rows > 0){
    while($row = result->fetch_assoc()){
        if($row['username'] == $username && $row['acc_pas'] == $acc_pas){
            $found = 1;
            break;
        }
        elseif($row['username'] == $username && $row['acc_pas'] != $acc_pas){
            echo "Wrong password";
            $found = 2;
            break;
        }
    }
    if($found == 0){
        echo "This user does not exist";
    }
}

if($found == 1){
    $sql = "DELETE FROM new_user WHERE username=$username";
    if($conn->query(sql) === TRUE){
        echo "User deleted succesfully";
    }
    else{
        echo "Error deleting user" . $conn->error;
    }
}

?>