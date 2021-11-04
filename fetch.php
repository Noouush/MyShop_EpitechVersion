<?php
include('connect.php'); //Database Connection

if (isset($_POST["action"])) {
    $query = "SELECT * FROM products WHERE id > 0";
    if (isset($_POST["minimum_price"], $_POST["maximum_price"])) {
        $query .= " AND (price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "')";
    }
    if (isset($_POST["color"])) {
        $color_filter = implode("','", $_POST["color"]);
        $query .= " AND main_color IN('" . $color_filter . "')";
    }
    if (isset($_POST["material"])) {
        $material_filter = implode("','", $_POST["material"]);
        $query .= " AND main_material IN('" . $material_filter . "')";
    }
    if (isset($_POST["category"])) {
        $cat_filter = implode("','", $_POST["category"]);
        $query .= " AND category_name IN('" . $cat_filter . "')";
    }

    //nom de la variable de connexion à voir !!
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output = '';
    if ($total_row > 0) {
        foreach ($result as $row) {
            $output .= '
   <div class="col-md-3 col-sm-8">
   <div class="product-grid">
       <div class="product-image4"><a href="#"><img class="pic-1" src="' . $row['image'] . '"></a></div>
       <div class="product-content">
           <h3 class="title"><a href="#">' . $row['name'] . '</a></h3>
           <div class="category">'.$row['category_name'] .'</div>
           <div class="price">$' . $row['price'] . ' <a class="add-to-cart" href=""><img src="assets/CartButton2.png" alt="add to cart"></a>
       </div>
       </div>
   </div>
</div>';
        }
    } else {
        $output = '<h3>No Product Found</h3>';
    }
    echo $output;
}

?>


