<?php
    echo "<br><b>Predicting Days of month</b>";
    $monthInDigit = 3;
    switch($monthInDigit){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            echo "<br>31 days are there in the month.";
            break;
        case 2:
            echo "<br>28/29 days are there ";
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            echo "<br>30 days are there in the month";
            break;
        default:
            echo "<br>Please enter month correctly.";
    }


    echo "<br><br><b>Predicting Result</b>";
    $grade = "B";
    switch($grade){
        case "A":
            echo "<br>Excellent!";
            break;
        case "B":
            echo "<br>Good job!";
            break;
        case "C":
            echo "<br>You can Improve!";
            break;
        case "D":
            echo  "<br>Passed!";
            break;
        case "F":
            echo "<br>Failed!";
            break;
        default:
            echo "Please Enter grade correctly";
    }

    echo "<br><br><b>Predicting occupation</b>";
    $scienceGroup = "A";
    $major = "Civil";

    switch($scienceGroup){
        case "A":
            switch($major){
                case "Computer":
                    echo "<br>You are Computer Engineer.";
                    break;
                case "Mechanical":
                    echo "<br>You are Mechanical Engineer.";
                    break;
                default:
                    echo "<br>You may like the maths.";
            }
            break;
        case "B":
            switch($major){
                case "Pharmacy":
                    echo "<br>You are Pharmacist.";
                    break;
                case "Dental":
                    echo "<br>You are Dentist.";
                    break;
                default:
                    echo "<br>You may like the Biology.";
            }
            break;
        default:
            echo "<br>Invalid group!";
    }
?>