<?php

require_once 'Connection.php';

class Save
{
    private static PDO $pdo;

    public static function saveProduct(ProductBase $product): string|bool
    {
        self::$pdo = Connection::getInstance()->getPdo();

        $statement = self::$pdo->prepare("
        INSERT INTO products (
            id, sku, type_id, name, price, size, weight, height, width, length
            )
        VALUES (
            :id, :sku, :type_id, :name, :price, :size,:weight,:height,:width,:length
            )");
        try {
            $statement->execute([
            'id' => $product->getId(),
            'sku' => $product->getSku(),
            'type_id' => $product->getTypeId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'size' => $product->getSize(),
            'weight' => $product->getWeight(),
            'height' => $product->getHeight(),
            'width' => $product->getWidth(),
            'length' => $product->getLength()]);
        } catch (Exception $error) {
            return $error->getMessage();
        }
        return false;
    }
}