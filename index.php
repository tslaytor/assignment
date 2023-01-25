

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
    require_once 'ProductLister.php';
    // The getList function lists all the products in the database
    ProductLister::getList();
    ?>
</div>

</body>

<?php   
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = json_decode(file_get_contents('php://input'), true);
    // The massDelete() function deletes all selected products from the database and redirects to this page using GET method
    ProductLister::massDelete($_POST);
}
?>










