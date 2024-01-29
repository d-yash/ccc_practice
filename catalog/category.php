<?php
    require 'sql/functions.php';
    require '../Learning/Function/php_func.php';

    if(isset($_POST['cat'])){
        if(insert_exe("ccc_practice", "ccc_category", getParams("cat"))){
                echo "<script>alert('Data submitted Successfully')</script>";
                echo "<script>location. href='category.php'</script>";
                exit(0);
        }else{
            echo "<script>alert('Data not submitted')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category form</title>
    <style>
        body,
        h2,
        form {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #d3d1d4;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 10px;
        }

        label,
        input {
            margin-top: 20px;
        }

        input {
            margin-left: 10px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        input[type="text"]{
            width: 60%;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 8px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin: auto;
            margin-top: 15px;
            font-size: 16px;
        }

        .submit_button {
            display: flex;
            align-items: center;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h2>Category Form</h2>
        <label>Category : </label>
        <input type="text" name="cat[name]">
        <input type="submit" value="submit" class="submit_button">
    </form>
</body>

</html>