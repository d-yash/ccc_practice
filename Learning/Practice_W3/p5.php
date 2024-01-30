<?php
    class Employee{
        private $_name;
        private $_position;
        private $_salary;

        function setEmployee($name = null, $position=null, $salary=null){
            $this->_name = $name;
            $this->_position = $position;
            $this->_salary = $salary;
        }
        function calcYearlyInc(){
            switch($this->_position){
                case "developer":
                case "sales":
                    $this->_salary += $this->_salary * 0.1;
                    break;
                case "manager":
                    $this->_salary += $this->_salary * 0.15;
                    break;
                case "admin":
                    $this->_salary += $this->_salary * 0.05;
                    break;
                default:
                    return "NO bonus!";
            }
        }
        function displayEmployee(){
            echo "Name: $this->_name<br>Position: $this->_position<br>Salary: $this->_salary<br>";
        }
    }

    $emp = [];

    $emp[0] = new Employee();
    $emp[0]->setEmployee("Yash", "manager", "100");
    $emp[1] = new Employee();
    $emp[1]->setEmployee("Manan", "developer", "50");
    $emp[2] = new Employee();
    $emp[2]->setEmployee("Parth", "sales", "35");

    foreach($emp as $i){
        $i->displayEmployee();
        $i->calcYearlyInc();
        echo "<br>";
    }
    echo "After yearly Increment ... <br><br>";
    foreach($emp as $i){
        $i->displayEmployee();
        echo "<br>";
    }



?>