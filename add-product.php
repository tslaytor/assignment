<?php

require_once 'FormClasses/Form.php';
require_once 'ProductClasses/Dvd.php';
require_once 'ProductClasses/Book.php';
require_once 'ProductClasses/Furniture.php';

// use FormClasses\Form;
// use FormClasses\FormInputWrap;
// use FormClasses\TypedInput;
// use FormClasses\SelectInput;
// use ProductClasses\Dvd as Dvd;
// use ProductClasses\Book;
// use ProductClasses\Furniture;

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = ucfirst(strtolower($_POST['productType']));
    unset($_POST['productType'], $_POST['submit']);
    $args = array_filter($_POST);
    // create and save new product object
    $newProduct = new $product(...$args);
    $catch = $newProduct->save();
    if ($catch) {
        $errorMessage = '<div class="alert">' . $catch . '</div>';
    } else {
        header("Location: index.php");
        die();
    }
}

// make a new form object
$productForm = new Form();

// create a new form group object for sku code
$skuWrap = new FormInputWrap(cssClass:'formGroup');
$skuWrap->inputElements([new TypedInput(id:'sku', label:'SKU', type:'text', required:true)]);
$productForm->addInput($skuWrap);

// create a new form group object for product name
$nameWrap = new FormInputWrap(cssClass:'formGroup');
$nameWrap->inputElements([new TypedInput(id:'name', label:'Name', type:'text', required:true)]);
$productForm->addInput($nameWrap);

// create a new form group object for the price
$priceWrap = new FormInputWrap(cssClass:'formGroup');
$priceWrap->inputElements([new TypedInput(id:'price', label:'Price', type:'number', required:true)]);
$productForm->addInput($priceWrap);

// create the product type switcher
$productForm->addInput(new SelectInput(id:'productType', label:'Type Switcher', options:['DVD', 'Book', 'Furniture']));

// create a new form group object for the size property
$sizeWrap = new FormInputWrap(cssClass:'formGroup sizeWrap', instruction: 'Please, provide size');
$sizeWrap->inputElements([new TypedInput(id:'size', label:'Size', type:'number')]);
$productForm->addInput($sizeWrap);

// create a new form group object for the weight property
$weightWrap = new FormInputWrap(cssClass:'formGroup weightWrap', instruction: 'Please, provide weight');
$weightWrap->inputElements([new TypedInput(id:'weight', label:'Weight', type:'number')]);
$productForm->addInput($weightWrap);

// create a new form group object for the dimension properties (height, width and length)
$dimensionWrap = new FormInputWrap(cssClass:'dimensionWrap', instruction: 'Please, provide dimensions');
$dimensionWrap->inputElements([
    new TypedInput(id: 'height', label:'Height', type:'number'),
    new TypedInput(id:'width', label:'Width', type:'number'),
    new TypedInput(id:'length', label:'Length', type:'number')]);
$productForm->addInput($dimensionWrap);

?>
<html>
    <head>
        <script src="static/create.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="static/styles.css">
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
            echo $productForm->display(id:'product_form', method:'post');
            ?>
        </div>
        <footer>
            <p>Scandiweb Test assignment</p>
        </footer>
    </body>
</html>