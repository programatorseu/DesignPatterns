<?php
require 'BookInterface.php';
require 'Book.php';
require 'eReaderInterface.php';
require 'Kindle.php';
require 'KindleAdapter.php';


use Piczor\Book;
use Piczor\BookInterface;
use Piczor\eReaderInterface;
use Piczor\Kindle;
use Piczor\KindleAdapter;





class Person {
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}
(new Person)->read(new KindleAdapter(new Kindle));
