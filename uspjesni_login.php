<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

if(isset($_SESSION['username'])){
    echo '<p>You are loged in as ' . $_SESSION['username'] . '</p>';
    echo '<br><form action="logout_script.php" method="POST"><button type="submit" class="btn btn-primary" name="logout_submit">Log out</button></form>';
}
else{
    echo '<p>You are loged out</p>';
    echo '<br><button type="submit" class="btn btn-primary" name="logout_submit"><a href="login.php">Log in</a></button>';
}

?>

</body>
</html>