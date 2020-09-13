<?php

include "db.php";

$username = $_POST['username'];
$acc_pas = $_POST['acc_pas'];


$sql = "SELECT username, acc_pas FROM new_user";
$result = $conn->query($sql);

$found = 0;

if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($row['username'] == $username && $row['acc_pas'] == $acc_pas){
            $found = 1;
            break;
        }
        elseif($row['username'] == $username && $row['acc_pas'] != $acc_pas){
            echo 'Wrong password<br><br><a href="delete_page.php">Try again</a>';
            $found = 2;
            break;
        }
    }
    if($found == 0){
        echo 'This user does not exist<br><br><a href="delete_page.php">Go back</a>';
    }
}
else{
    echo "The table is empty";
}

if($found == 1){
    $sql = "DELETE FROM new_user WHERE username='$username'";
    if(mysqli_query($conn, $sql)){
        echo 'User deleted succesfully<br><br><a href="index.php">Go back</a>';
    }
    else{
        echo "Error deleting user" . $conn->error;
    }
}

mysqli_close($conn);

?>