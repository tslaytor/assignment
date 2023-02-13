<?php

require_once '../Models/Forms/Form.php';
require_once '../Models/Forms/TypedInput.php';
require_once '../Models/Forms/SelectInput.php';
require_once '../Models/Forms/FormInputWrap.php';

class FormBuilder
{
    public static function display(string $id, string $method): string
    {
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

        return $productForm->generate($id, $method);
    }
}