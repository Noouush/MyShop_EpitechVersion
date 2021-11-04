<?php
session_start(); 
if ($_SESSION['is_admin'] == 1){ 

if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    // Nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `products` WHERE `id` = :id;';

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    $product = $query->fetch();

} else {
    header('Location: prodindex.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product detail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1><?= $product['name']?></h1>
                <p>ID: <?=$product['id']?></p>
                <p>Category: <?=$product['category_name']?></p>
                <p>Main Color: <?=$product['main_color']?></p>
                <p>Main Material: <?=$product['main_material']?></p>
                <p>Description: <?=$product['description']?></p>
                <p>Price: <?=$product['price']?></p>
                <p>Picture: <img width="280px" src="<?=$product['image']?>"></p>
                <p><a href="prodindex.php" class="btn btn-secondary">Back</a> <a class="btn btn-warning" href="editproduct.php?id=<?= $product['id']?>">Edit</a></p>
            </section>
        </div>
    </main>
</body>
</html>
<?php }

else {
    header("Location: signin.php?error-admin=NotAnAdmin");
    exit();
}
?>
