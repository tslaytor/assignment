<?php

// namespace ProductClasses;

require_once 'ProductBase.php';

// use \ProductClasses\ProductBase;

class Dvd extends ProductBase
{
    private int $size;

    public function __construct($sku, $name, $price, $size, $id = null)
    {
        parent::__construct($sku, $name, $price, $id);
        $this->size = $size;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    public function getProperty(): string
    {
        return 'Size: ' . $this->size . ' MB';
    }
}