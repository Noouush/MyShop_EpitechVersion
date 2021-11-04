<?php
session_start();
require_once('connect.php');
if ($_SESSION['is_admin'] == 1){ 

        $id = strip_tags($_GET['id']);
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $email = strip_tags($_POST['email']);
        $admin = strip_tags($_POST['admin']);

        $sql = "UPDATE `users` SET `username`=:username, `password`=:password, `email`=:email, `admin`=:admin WHERE `id`=:id;";

        $query = $db->prepare($sql);

        $query->bindValue(':username', $username);
        $query->bindValue(':password', $password);
        $query->bindValue(':email', $email);
        $query->bindValue(':admin', $admin);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `users` WHERE `id`=:id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<h1>Edit a user</h1>
<form method="post">
    <p>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= $result['username'] ?>">
    </p>
    <p>
        <label for="password">Password</label>
        <input type="text" name="password" id="password" value="<?= $result['password'] ?>">
    </p>
    <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= $result['email'] ?>">
    </p>
    <p>
        <label for="Admin">Is admin ? (Yes = 1 // No = 0)</label>
        <input type="number" name="admin" id="admin" value="<?= $result['admin'] ?>" min="0" max="1" placeholder="<?=$result['admin']?>">
    </p>
    <p>
        <button class="btn btn-primary">Save</button> <a href="admin-index.php" class="btn btn-secondary">Back</a>
    </p>
    <input type="hidden" name="id" value="<?= $result['id'] ?>">
</form>
</body>
</html>

<?php }

else {
    header("Location: signin.php?error-admin=NotAnAdmin");
    exit();
}
?>
