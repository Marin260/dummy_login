<?php

include "db.php";

$sql = "SELECT id, username, email FROM new_user";
$result = $conn->query($sql);

//ispis redaka
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<br>Id: " . $row["id"] . "   Username: " . $row["username"] . "   Email: " . $row["email"];
    }
}
else{
    echo 'The table is empty<br><br><a href="index.php">Go back</a>';
}


?>