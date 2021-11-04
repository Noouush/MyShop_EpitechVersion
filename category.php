<?php

session_start(); 
require_once('connect.php');

if ($_SESSION['is_admin'] == 1){ 

if (isset($_POST['name']) AND ($_POST['parent_id'])) {
    $name = strip_tags($_POST['name']);
    $parent = strip_tags($_POST['parent_id']);

    $sql = 'INSERT INTO `categories` (`name`, `parent_id`) VALUES (:name, :parent_id);';

    $query = $db->prepare($sql);

    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->bindValue(':parent_id', $parent, PDO::PARAM_INT);

    $query->execute();
}

$sql = 'SELECT * FROM `categories`';

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
</head>
<body>
<main class="container">
    <div class="row">
        <section class="col-12">
            <h1>Add a category</h1>
            <form method="post">
                <div class="form-group">
                    <label for="name"> Category Name : </label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="parent_id">Parent ID (1 by default): </label>
                    <input type="number" id="parent_id" name="parent_id" class="form-control" min="1" placeholder="1">
                </div>
                </div>
    <button class="btn btn-primary">Create</button> <a href="prodindex.php" class="btn btn-secondary">Back</a><br></br>

        <table class="table">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Parent ID</th>
        </thead>
            <?php
            foreach ($result as $category) {
            ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= $category['name'] ?></td>
                <td><?= $category['parent_id'] ?></td>
            </tr>
                <?php
            }
            ?>
            </table>
        </section>
    </div>
</main>
</body>

<?php }

else {
    header("Location: signin.php?error-admin=NotAnAdmin");
    exit();
}
?>


