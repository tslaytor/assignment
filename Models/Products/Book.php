<?php

// namespace ProductClasses;

require_once 'ProductBase.php';

// use \ProductClasses\ProductBase;

class Book extends ProductBase
{
    private int $weight;

    public function __construct($sku, $name, $price, $weight, $id = null)
    {
        parent::__construct($sku, $name, $price, $id);

        $this->weight = $weight;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    public function getProperty(): string
    {
        return 'Weight: ' . $this->weight . ' KG';
    }
}
