<?php  

// This class's static "getList()" function select all product from the database 
// and returns a sorted array of Product objects

// namespace FunctionalClasses;

require_once 'Connection.php';
require_once 'ProductClasses/Dvd.php';
require_once 'ProductClasses/Book.php';
require_once 'ProductClasses/Furniture.php';

// use FunctionalClasses\Connection;
// use ProductClasses\Dvd;
// use ProductClasses\Book;
// use ProductClasses\Furniture;
// use \PDO;

class ProductLister
{
    private static array $list;
    
    public static function getList(): void
    {
        $pdo = Connection::getInstance()->getPdo();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // // get all dvd products

        $statement = $pdo->prepare('SELECT sku, name, price, size, id FROM products WHERE type_id = :type_id');
        $statement->execute(['type_id'=> Dvd::getTypeId()]);
        $dvd = $statement->fetchAll(
            PDO::FETCH_FUNC, 
            function ($sku, $name, $price, $size, $id) { 
                return new Dvd($sku, $name, $price, $size, $id); 
            });

        // get all book products
        $statement = $pdo->prepare('SELECT sku, name, price, weight, id FROM products WHERE type_id = :type_id');
        $statement->execute(['type_id'=> Book::getTypeId()]);
        $book = $statement->fetchAll(
            PDO::FETCH_FUNC, 
            function ($sku, $name, $price, $weight, $id) { 
                return new Book($sku, $name, $price, $weight, $id); 
            });
        // get all furniture products
        $statement = $pdo->prepare('SELECT sku, name, price, height, width, length, id FROM products WHERE type_id = :type_id');
        $statement->execute(['type_id'=> Furniture::getTypeId()]);
        $furniture = $statement->fetchAll(
            PDO::FETCH_FUNC, 
            function ($sku, $name, $price, $height, $width, $length, $id) { 
                return new Furniture($sku, $name, $price, $height, $width, $length, $id); 
            });
        // merge and sort by primary key
        self::$list = array_merge(array_merge($dvd, $book), $furniture);
        usort(self::$list, function($a, $b) {
            return $a->getId() - $b->getId();
        });

        echo count(self::$list);

        foreach (self::$list as $item): ?>
            <article class="product-list_item"> 
            <input type="checkbox" class="delete-checkbox" name="checkbox-delete" value="<?php echo $item->getId() ?>">
                <div class="product-list_text"> <?php echo $item->getSku() ?> </div>
                <div class="product-list_text"> <?php echo $item->getName() ?> </div>
                <div class="product-list_text"> <?php echo $item->getPriceAsCurrency() ?> </div>
                <div class="product-list_text"> <?php echo $item->getProperty() ?> </div>
            </article> 
        <?php endforeach;
    }

    public static function massDelete(array $itemIndexList) 
    {
        foreach (self::$list as $obj) {
            if (in_array($obj->getId(), $itemIndexList)) {
                $obj->delete();
            }
        }
    }
}