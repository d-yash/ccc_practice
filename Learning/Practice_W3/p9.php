<?php
    class BankAccount{
        private $_accountNumber;
        private $_accountHolder;
        private $_balance;

        function __construct($no, $name, $balance)
        {   
            $this->_accountNumber = $no;
            $this->_accountHolder = $name;
            $this->_balance = $balance;
        }

        function deposite($amount){
            $this->_balance += $amount;
        }

        function withdraw($amount){
            $rem = $this->_balance - $amount;
            if($rem >= 0){
                $this->_balance = $rem;
                echo "<br>Withdrawed : $rem <br>";
            }else{
                echo "Insufficient funds for withdrawal";
            }
        }

        function displayAccountInfo(){
            echo "<br>Name : $this->_accountHolder<br>";
            echo "Account number : $this->_accountNumber<br>";
            echo "Balance : $this->_balance <br>";
        }
    }

    $user1 = new BankAccount("11223344", "Yash", 100);
    // $user2 = new BankAccount("55667788", "Manan", 70);

    $user1->displayAccountInfo();
    $user1->withdraw(10);
    $user1->displayAccountInfo();
    $user1->withdraw(120);
?>