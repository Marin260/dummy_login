<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Create a new account</h2>
        <form action="compare.php" method="POST">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <input type="username" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="acc_pas">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
        <a href="ispis.php">Click here for the list of all users</a>
        <br>
        <br>
        <a href="update_page.php">Click here to change the password for your user</a>
        <br>
        <br>
        <a href="delete_page.php">Click here to delete your acc</a>
    </div>


</body>
</html>