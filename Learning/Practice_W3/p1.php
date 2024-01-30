<?php
    class Calculator{
        public function addition($val1, $val2){
            return ($val1 + $val2);
        }
        public function subtraction($val1, $val2){
            return ($val1 - $val2);
        }
        public function multiplication($val1, $val2){
            return ($val1 * $val2);
        }
        public function division($val1, $val2){
            return ($val1 / $val2);
        }
        public function modulus($val1, $val2){
            return ($val1 % $val2);
        }
        public function exponential($val1, $val2){
            return ($val1 ** $val2);
        }
    }

    $calc_obj = new Calculator();
    echo "Addition : " . $calc_obj->addition(4,6) . "<br>";
    echo "Modulus : " . $calc_obj->modulus(11, 3) . "<br>";
    echo "Exponential : " . $calc_obj->exponential(2,3) . "<br>";
?>