<?php
    require_once 'FunctionalClasses/ProductLister.php';

    // use FunctionalClasses\ProductLister;
?>
<html>
    <head>
        <script src="static/index.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="static/styles.css">
    </head>
    <body>
        <header id="header">
            <h1>Product List</h1>
            <div class="button-wrap">
                <a href="add-product.php"><button>ADD</button></a>
                <button id="delete-product-btn">MASS DELETE</button>
            </div>
        </header>
        <div id="product-list_container">
            <?php
            // The getList function lists all the products in the database
            ProductLister::getList();
            ?>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = json_decode(file_get_contents('php://input'), true);
            // delete all selected products from the database and refresh this page
            ProductLister::massDelete($_POST);
        }
        ?>
        <footer>
            <p>Scandiweb Test assignment</p>
        </footer>
    </body>
</html>