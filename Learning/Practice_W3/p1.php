<?php
    class calculator{
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
        public function exponentiation($val1, $val2){
            return ($val1 ** $val2);
        }
    }

    $calc_obj = new calculator();
?>