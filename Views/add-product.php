<?php

require_once '../Controllers/Create.php';
require_once '../Controllers/FormBuilder.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Create::createObject($_POST);
}

?>
<html>
    <head>
        <script src="../static/create.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../static/styles.css">
    </head>
    <body>
        <header id="header">
            <h1>Product Add</h1>
            <div class="button-wrap">
                <button form="product_form" type="submit" name="Save">SAVE</button>
                <a href="index.php"><button>CANCEL</button></a>
            </div>
        </header>
        <div id="formContainer">
            <?php
            // display error message (if there is one)
            echo $errorMessage;
            // display the form
            echo FormBuilder::display(id:'product_form', method:'post');
            ?>
        </div>
        <footer>
            <p>Scandiweb Test assignment</p>
        </footer>
    </body>
</html>