<?php
    class Post{
        private $_title;
        private $_content;

        function setPost($title, $content){
            $this->_title = $title;
            $this->_content = $content;
        }
        function displayPost(){
            echo "<br>$this->_title<br><br>";
            echo "$this->_content<br>";
        }
    }
    class Blog{
        private $_posts = [];
        
        function addBlog(Post $p){
            $this->_posts[] = $p;
        }
        function displayAllBlogs(){
            foreach($this->_posts as $p){
                $p->displayPost();
                echo "<br>";
            }
        }
    }

    $postArr = [];
    $postArr[0] = new Post();
    $postArr[0]->setPost(
        "P1 : php",
        "
        PHP (Hypertext Preprocessor) is a widely used server-side scripting language designed for web development. It is an open-source, general-purpose scripting language that is especially suited for creating dynamic web pages and applications. PHP is embedded within HTML code and executed on the server, generating dynamic content that is then sent to the client's browser.<br>
        Syntax and Structure: Syntax is similar to C, Java, and Perl. Server-side scripting, with results sent as HTML.
        Variables and Data Types: Supports various data types. Variables start with $.
        Control Structures: Familiar control structures (if, loops, switch).
        Functions: Built-in and user-defined functions.
        Error Handling: Custom error handlers and logging.
        Security: Features for input validation and security measures.
        Sessions and Cookies: Manages user sessions and sets cookies.
        File Handling: Functions for working with files and directories.
        Object-Oriented Programming (OOP): Supports OOP concepts.
        Regular Expressions: Supports regular expressions."
    );
    $postArr[1] = new Post();
    $postArr[1]->setPost(
        "P2 : php", 
        "PHP (Hypertext Preprocessor) is a widely used server-side scripting language designed for web development. It is an open-source, general-purpose scripting language that is especially suited for creating dynamic web pages and applications. PHP is embedded within HTML code and executed on the server, generating dynamic content that is then sent to the client's browser.<br>
        Syntax and Structure: Syntax is similar to C, Java, and Perl. Server-side scripting, with results sent as HTML.
        Variables and Data Types: Supports various data types. Variables start with $.
        Control Structures: Familiar control structures (if, loops, switch).
        Functions: Built-in and user-defined functions.
        Error Handling: Custom error handlers and logging.
        Security: Features for input validation and security measures.
        Sessions and Cookies: Manages user sessions and sets cookies.
        File Handling: Functions for working with files and directories.
        Object-Oriented Programming (OOP): Supports OOP concepts.
        Regular Expressions: Supports regular expressions."
    );
    $postArr[2] = new Post();
    $postArr[2]->setPost(
        "P3 : php", 
        "PHP (Hypertext Preprocessor) is a widely used server-side scripting language designed for web development. It is an open-source, general-purpose scripting language that is especially suited for creating dynamic web pages and applications. PHP is embedded within HTML code and executed on the server, generating dynamic content that is then sent to the client's browser.<br>
        Syntax and Structure: Syntax is similar to C, Java, and Perl. Server-side scripting, with results sent as HTML.
        Variables and Data Types: Supports various data types. Variables start with $.
        Control Structures: Familiar control structures (if, loops, switch).
        Functions: Built-in and user-defined functions.
        Error Handling: Custom error handlers and logging.
        Security: Features for input validation and security measures.
        Sessions and Cookies: Manages user sessions and sets cookies.
        File Handling: Functions for working with files and directories.
        Object-Oriented Programming (OOP): Supports OOP concepts.
        Regular Expressions: Supports regular expressions."
    );
    $blogObj = new Blog();
    foreach($postArr as $p){
        $blogObj->addBlog($p);
    }
    $blogObj->displayAllBlogs();
?>