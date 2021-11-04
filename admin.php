<?php
session_start();
if ($_SESSION['is_admin'] == 1){ ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
<body>
    <div class="container" style="text-align: center; justify-self: center">
        <h1>Choose a Database :</h1><br></br>
        <form method="post">

        <a href="admin-index.php" class="btn btn-primary btn-lg">Database Users</a> <a href="prodindex.php" class="btn btn-secondary btn-lg">Database Products</a><br><br>
        <a href="index.php" class="btn btn-danger btn-sm" style="text-align: center; justify-self: center">Back</a>
        
        </form>
    </div>
</body>
</html>

    
<?php }

else {
    header("Location: signin.php?error-admin=NotAnAdmin");
    exit();
}

?>
