<?php
    class Stud{
        public $name;
        public $age;
        public $sem;
        public function __construct($name = "NA", $age = "NA", $sem = "NA") {
            $this->name = $name;
            $this->age = $age;
            $this->sem = $sem;
        }
        public function set_stud($name = "NA", $age = "NA", $sem = "NA"){
            $this->name = $name;
            $this->age = $age;
            $this->sem = $sem;
        }
        public function display_stud(){
            echo "Name : $this->name<br>";
            echo "Age : $this->age<br>";
            echo "Sem : $this->sem<br><br>";
        }
    }
    echo "<pre>";
    $stud1 = new Stud();
    $stud1->display_stud();

    $stud2 = new Stud("Yash", 20);
    $stud2->display_stud();
    
    $stud3 = new Stud("Manan", 19, 6);
    $stud3->display_stud();
    
    $stud4 = new Stud("Neer", 21, 7);
    $stud4->display_stud();
    ?>