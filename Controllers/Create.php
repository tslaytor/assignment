<?php

require_once 'Save.php';
require_once 'Models/Products/Dvd.php';
require_once 'Models/Products/Book.php';
require_once 'Models/Products/Furniture.php';

class Create
{
    public static function createObject($postData): void
    {
        $product = ucfirst(strtolower($postData['productType']));
        unset($postData['productType'], $postData['submit']);
        $args = array_filter($postData);
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
}