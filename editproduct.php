<?php
session_start(); 
require_once('connect.php');
if ($_SESSION['is_admin'] == 1){ 

        $id = strip_tags($_GET['id']);
        $name = strip_tags($_POST['name']);
        $category = strip_tags($_POST['category_name']);
        $color = strip_tags($_POST['main_color']);
        $material = strip_tags($_POST['main_material']);
        $description = strip_tags($_POST['description']);
        $price = strip_tags($_POST['price']);
        $image = "assets/products/" . $_POST['image'];

$sql = "UPDATE products SET name=:name, price=:price, category_name=:category_name, main_color=:main_color, main_material=:main_material, image=:image, description=:description WHERE id=:id;";

        $query = $db->prepare($sql);

        $query->bindValue(':name', $name);
        $query->bindValue(':category_name', $category);
        $query->bindValue(':main_color', $color);
        $query->bindValue(':main_material', $material);
        $query->bindValue(':description', $description);
        $query->bindValue(':price', $price);
        $query->bindValue(':image', $image);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();


if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `products` WHERE `id`=:id;";

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
    <title>Admin</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<main class="container">
    <div class="row">
        <section class="col-12">
            <h1>Modify a product</h1>
            <form method="post">
                <form method="post">
                    <p>
                        <label for="name">Name : </label>
                        <input type="text" id="name" name="name" class="form-control" required value="<?= $result['name']?>">
                    </p>
                    <p class="form-group">
                        <label for="category_name">Category : </label>
                        <input type="text" id="category" name="category" class="form-control" required value="<?= $result['category_name']?>">
                    </p>
                    <p class="form-group">
                        <label for="main_color">Main color : </label>
                        <input type="text" id="main_color" name="main_color" class="form-control" required value="<?= $result['main_color']?>">
                    </p>
                    <p class="form-group">
                        <label for="main_material">Main material : </label>
                        <input type="text" id="main_material" name="main_material" class="form-control" required value="<?= $result['main_material']?>">
                    </p>
                    <p class="form-group">
                        <label for="description">Description : </label>
                        <input type="text" id="description" name="description" class="form-control" required value="<?= $result['description']?>">

                    </p>
                    <p class="form-group">
                        <label for="price">Price : </label>
                        <input type="text" id="price" name="price" class="form-control" required value="<?= $result['price']?>">
                    </p>
                    <p class="form-group">
                        <label for="image">Choose a picture : </label>
                        <input type="file" id="image" name="image" accept="image/png, image/jpeg" value="<?= $result['image']?>">
                    </p>
                    <p>
                        <button class="btn btn-primary">Save</button>  <a href="prodindex.php" class="btn btn-secondary">Back</a>
                    </p>
                    <input type="hidden" name="id" value="<?= $result['id'] ?>">
                </form>
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
