<?php
session_start();
require_once('connect.php');

if ($_SESSION['is_admin'] == 1){ 

if (isset($_POST)) {
    $name = strip_tags($_POST['name']);
    $category = strip_tags($_POST['category_name']);
    $color = strip_tags($_POST['main_color']);
    $material = strip_tags($_POST['main_material']);
    $description = strip_tags($_POST['description']);
    $price = strip_tags($_POST['price']);
    $image = "assets/products/" . $_POST['image'];

    $sql = 'INSERT INTO `products` (`name`, `category_name`, `main_color`, `main_material`, `description`, `price`, `image`) VALUES (:name, :category_name, :main_color, :main_material, :description, :price, :image);';

    $query = $db->prepare($sql);

    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->bindValue(':category_name', $category);
    $query->bindValue(':main_color', $color, PDO::PARAM_STR);
    $query->bindValue(':main_material', $material, PDO::PARAM_STR);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':price', $price, PDO::PARAM_STR);
    $query->bindValue(':image', $image);

    $query->execute();

}



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
            <h1>Add a product</h1>
            <form method="post">
                <div class="form-group">
                    <label for="name">Name : </label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category_name">Category : </label>
                    <input type="text" id="category" name="category" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="main_color">Main color : </label>
                    <input type="text" id="main_color" name="main_color" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="main_material">Main material : </label>
                    <input type="text" id="main_material" name="main_material" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description : </label>
                    <input type="text" id="description" name="description" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">Price : </label>
                    <input type="text" id="price" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="image">Choose a picture : </label>
                    <input type="file" id="image" name="image" accept="image/png, image/jpeg" required>
                </div>
                <button class="btn btn-primary">Confirm</button> <a href="prodindex.php" class="btn btn-secondary">Back</a>
            </form>
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
