<?php session_start();
require('connect.php');
require('fetch.php');
?>
<!DOCTYPE html>
<!-- Spécification du langage de la page et du sens de lecture -->
<html lang="fr" dir="ltr">
<head>
    <!-- Prise en charge des accents et autres caractères spéciaux -->
    <meta charset="utf-8"/>
    <!-- (meta) Pour être responsive et éviter une mise à l'échelle automatique -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="jquery-ui.js"></script>
    <link href="style.css" rel="stylesheet">
    <!-- CDN de font awesome pour l'utilisation des fa-fa et des icones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- CDN de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Lien avec la page CSS (toujours après Bootstrap pour éviter les bug) -->
    <link rel="stylesheet" href="style.css">

    <!-- Titre de la page affiché dans l'onglet -->
    <title>Welcome to Ikeouf - Best Furnitures in the world</title>
</head>
<body>
<header>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><img src="assets/Logo.png" alt="logo du site"></a>
                <h1><i>IKEOUF</i> THE BEST SHOP FOR DESIGN FURNITURES</h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li>

                            <?php

                            if (isset($_SESSION['username'])) { ?>
                                <p> Hello <?php echo $_SESSION['username']; ?> </p>
                                <form action="logout.php">
                                    <button type="submit" class="btn btn-primary" id="btn_nav_admin1">Logout</button>
                                </form>
                            <?php } else { ?>
                                <form action="signin.php"><button type="submit" class="btn btn-primary" id="btn_nav_admin1">Sign in</button></form> <form action="signup.php">
                                    <button type="submit" class="btn btn-primary" id="btn_nav_admin1">Sign up</button></form>
                            <?php }
                            ?>

                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <div class="row">
            <div>

                <?php if (isset($_SESSION['username'])) { ?>
                    <p> Hello <?php echo $_SESSION['username']; ?> </p>
                <?php } ?>

            </div>
        </div>
    </div>
</header>

<div class="container-fluid" style="margin: 5px">


    <div class="row">
        <div class="col-md-2">

            <div class="list-group">
                <h3>Price Range</h3>
                <input type="hidden" id="min_price_hide" value="0"/>
                <input type="hidden" id="max_price_hide" value="1500"/>
                <p id="price_show">$0 - $1500</p>
                <div id="price_range"></div>
            </div>
            </br>

            <div class="list-group">
                <h3>Categories</h3>
                <?php
                $query = "SELECT distinct category_name FROM products order by category_name ASC";
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach ($result as $row) {
                    ?>
                    <div class="list-group-item checkbox">
                        <label>
                            <input type="checkbox" class="filter_all category"
                                   value="<?php echo $row['category_name']; ?>">
                            <?php echo ucfirst($row['category_name']); ?>
                        </label>
                    </div>
                    <?php
                }
                ?>
            </div>


            <div class="list-group">
                <h3>Material</h3>
                <?php
                $query = "SELECT DISTINCT(main_color) FROM products ORDER BY main_color ASC";
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach ($result as $row) {
                    ?>
                    <div class="list-group-item checkbox">
                        <label>
                            <input type="checkbox" class="filter_all color"
                                   value="<?php echo $row['main_color']; ?>">
                            <?php echo $row['main_color']; ?>
                        </label>
                    </div>
                    <?php
                }
                ?>
            </div>


            <div class="list-group">
                <h3>Material</h3>
                <?php
                $query = "SELECT DISTINCT(main_material) FROM products ORDER BY main_material ASC";
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach ($result as $row) {
                    ?>
                    <div class="list-group-item checkbox">
                        <label>
                            <input type="checkbox" class="filter_all material"
                                   value="<?php echo $row['main_material']; ?>">
                            <?php echo $row['main_material']; ?>
                        </label>
                    </div>
                    <?php
                }
                ?>
            </div>

        </div>

        <div class="col-md-9">
            <div class="row filter_data">
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {

        filter_data();

        function filter_data() {
            $('.filter_data');
            var action = 'fetch_data';
            var minimum_price = $('#min_price_hide').val();
            var maximum_price = $('#max_price_hide').val();
            var material = get_filter('material');
            var color = get_filter('color');
            var category = get_filter('category');
            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {
                    action: action,
                    minimum_price: minimum_price,
                    maximum_price: maximum_price,
                    material: material,
                    color: color,
                    category: category
                },
                success: function (data) {
                    $('.filter_data').html(data);
                }
            });
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function () {
                filter.push($(this).val());
            });
            return filter;
        }

        $('.filter_all').click(function () {
            filter_data();
        });

        $('#price_range').slider({
            range: true,
            min: 0,
            max: 1500,
            values: [0, 1500],
            step: 50,
            stop: function (event, ui) {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#min_price_hide').val(ui.values[0]);
                $('#max_price_hide').val(ui.values[1]);
                filter_data();
            }
        });

    });

</script>

</body>
