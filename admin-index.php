<?php

session_start();
require_once('connect.php');

if ($_SESSION['is_admin'] == 1){ 

$sql = 'SELECT * FROM `users`';

$query = $db->prepare($sql);

$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Users table</h1>
                <a href="admin.php" class="btn btn-secondary">Back</a></br></br>
                <input class="form-control" id="myInput" type="text" placeholder="Search a user...">
                <table class="table">
                    <thead>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>E-mail</th>
                    <th>Admin</th>
                    <th>Action</th>
                    </thead>
                    <tbody id="products">
                    <?php
                    foreach ($result as $user){
                    ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['password'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['admin'] ?></td>
                            <td><a href="edit.php?id=<?= $user['id']?>" class="btn btn-warning">Edit</a> <a class="btn btn-danger btn-sm remove" href="delete.php?id=<?= $user['id']?>">Delete</a> </td>
                            <td></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#products tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

<?php }

else {
    header("Location: signin.php?error-admin=NotAnAdmin");
    exit();
}

?>


