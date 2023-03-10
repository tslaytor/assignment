<?php

require_once 'Connection.php';

class Delete
{
    private static PDO $pdo;

    public static function deleteProduct(ProductBase $product): void
    {
        self::$pdo = Connection::getInstance()->getPdo();

        $statement = self::$pdo->prepare("DELETE FROM products WHERE id = :id");
        $statement->execute(['id' => $product->getId()]);
    }
}