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
    <h2>Update password</h2>
    <form action="update.php" method="POST">
        <div class="form-group">
            <input type="username" class="form-control" placeholder="Username" name="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Old password" name="acc_pas">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="New password" name="new_acc_pas">
        </div>
        
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
</body>
</html>