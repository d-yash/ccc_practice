<?php
    class Book{
        private $_title;
        private $_author;

        function setBook($title = null, $author = null){
            $this->_title = $title;
            $this->_author = $author;
        }
        function displayBook(){
            echo "Title : $this->_title\t\t\t- \"$this->_author\"";
        }
    }
    class Library{
        private $_books = array();
        function addBook(Book $book){
            $this->_books[] = $book;
        }
        function displayAllBooks(){
            foreach($this->_books as $b){
                $b->displayBook();
                echo "<br>";
            }
        }
    }
    $lib_obj = new Library();

    $b1 = new Book();
    $b1->setBook("Rich Dad, Poor Dad", "Robert kiyosaki");
    $lib_obj->addBook($b1);

    $b2 = new Book();
    $b2->setBook("Do epic shit!", "Ankur warikoo");
    $lib_obj->addBook($b2);

    $b2 = new Book();
    $b2->setBook("Think like a monk", "Jay shetty");
    $lib_obj->addBook($b2);

    $lib_obj->displayAllBooks();
?>