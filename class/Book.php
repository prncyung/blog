<?php

class Book
{

    public $title;
    public $available;
    public $isbn;
    public $author;

    public function getPrintableBook(): string
    {
        $result = '<i>' . $this->title . $this->author . '</i>';
        if (!$this->available) {
            $result = "Not available";
        }
        return $result;
    }

    public function getCopy(): bool
    {
        if ($this->available < 1) {
            return false;
        } else {
            $this->available--;
            return true;
        }
    }
}

/*$book = new Book();


$book->title = "PHP FOR BEGINNERS";
$book->available = 12;
$book->isbn = 234765;
$book->author = "Benson Iruobe";


if ($book->getCopy()) {
    echo 'Here, your copy.';
} else {
    echo 'I am afraid that book is not available.';
}

echo $book->title;*/
//var_dump($book);
