<?php
session_start();
require('connect.php');
if ($_SESSION['is_admin'] == 1){ 

$id = 0;

if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if ( !empty($_POST)){
    $id = $_POST['id'];

    $sql = "DELETE FROM `users` WHERE `id`=:id;";
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    header('Location: admin-index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" style="text-align: center; justify-self: center">

    <div>

        <h3>Warning !</h3>


        <form class="form-horizontal" action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <p class="alert alert-error">Are you sure to delete this user ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a href="admin-index.php" class="btn btn-secondary">No</a>
            </div>
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
