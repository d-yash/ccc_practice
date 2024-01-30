<?php
    class Shape{
        private $_clr;
        function __construct($clr){
            $this->_clr = $clr;
        }
        function getColor(){
            return $this->_clr;
        }
        /**
         * Must override this method
         */
        function calcArea(){}
        function displayShape(){}
    }
    class Circle extends Shape{
        private $_rad;
        function __construct($rad, $clr){
            $this->_rad = $rad;
            parent::__construct($clr);
        }
        function calcArea()
        {
            return pi()*pow($this->_rad, 2);
        }
        function displayShape()
        {
            echo "<br>Circle ...<br>";
            echo "Color : " . parent::getColor() . "<br>";
            echo "Area : " . round($this->calcArea(), 2) . "<br>";
        }
    }
    class Sqaure extends Shape{
        private $_length;
        function __construct($len, $clr){
            $this->_length = $len;
            parent::__construct($clr);
        }
        function calcArea(){
            return pow($this->_length, 2);
        }
        function displayShape()
        {
            echo "<br>Sqaure ...<br>";
            echo "Color : " . parent::getColor() . "<br>";
            echo "Area : " . $this->calcArea() . "<br>";
        }
    }

    $circleObj = new Circle(2, "Red");
    $squareObj = new Sqaure(4, "Nardo Gray");

    $circleObj->displayShape();
    $squareObj->displayShape();
?>