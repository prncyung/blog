<?php

include('Book.php');
include('Customer.php');

//$book = new Book();
$customer = new Customer(12, "prncyung", "benson");

//echo $customer->name;

$book = new Book();


$book->title = "PHP FOR BEGINNERS";
$book->available = 15;
$book->isbn = 234765;
$book->author = "Benson Iruobe";

try {
    if ($book->available > 12) {
        throw new Exception($book->available . ' cannot be low');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
/*if ($book->getCopy()) {
    echo 'Here, your copy.';
} else {
    echo 'I am afraid that book is not available.';
}*/

//echo $book->title;
