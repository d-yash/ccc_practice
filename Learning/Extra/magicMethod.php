<?php
// phpinfo();
    class Person{
        public $name;
        public $age;
        function __construct($name = null, $age = null)
        {   
            $this->name = $name;
            $this->age = $age;
        }
        function __destruct()
        {
            echo "<br>Destroying obj<br>";
        }
        function test(){
            $this->b = 1;
            return $this;
        }
        // public function __clone() {
        //     // Optionally perform additional actions during cloning
        //     echo "Cloning the object...\n";
        // }
    }    
    $person1 = new Person('John', 25);    
    // $person2 = clone $person1;
    
    // $person2->name = 'Jane';
    // $person2->age = 30;
    $person1->test();
    var_dump($person1);