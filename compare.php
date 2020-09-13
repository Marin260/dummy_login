<?php

include 'db.php';

// var iz forme
$username = $_POST['username'];
$email = $_POST['email'];
$acc_pas = $_POST['acc_pas'];

// usporedba
$sql = "SELECT username, email FROM new_user";
$result = $conn->query($sql);

$exists = 0; //varijabla koja gleda postoji li vec korisnik


if ($result->num_rows > 0)
    while($row = $result->fetch_assoc()){
        if($row["username"] == $username){
            echo "<br>This username is already taken<br>";
            $exists = 1;
            break;
        }
        elseif($row["email"] == $email){
            echo "<br>Email addres already in use<br>";
            $exists = 1;
            break;
        }
    }

//unos
if($exists == 0){
    $sql = "INSERT INTO new_user (username, email, acc_pas)    
        VALUES ('$username', '$email', '$acc_pas')";
    
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
}

?>