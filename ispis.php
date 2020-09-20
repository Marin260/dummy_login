<?php

include "db.php";

$sql = "SELECT id, username, email FROM new_user";
$result = mysqli_query($conn, $sql);

//ispis redaka
if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<br>Id: " . $row["id"] . "   Username: " . htmlspecialchars($row["username"]) . "   Email: " . $row["email"];
    }
}
else{
    echo 'The table is empty<br><br><a href="index.php">Go back</a>';
}


?>