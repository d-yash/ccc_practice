<?php
    class Point{
        private $_x;
        private $_y;

        function __construct($x = 0, $y = 0){
            $this->_x = $x;
            $this->_y = $y;
        }
        function calcDistance(Point $other){
            return sqrt(pow($this->_x - $other->_x, 2) + pow($this->_y - $other->_y, 2));
        }
    }

    $point1 = new Point(1,1);
    $point2 = new Point(3,1);

    $distance = $point1->calcDistance($point2);
    echo "Distance between both points : $distance<br>";
?>