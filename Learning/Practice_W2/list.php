<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Page</title>
    <style>
        ul {
            list-style-type: none;
        }
        ul li{
            font-size: medium;
            margin-bottom: 5px;
            background-color: #f2f2f2;
            /* border: 1px solid; */
            width: fit-content;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Last 10 Records</h2>
    
    <ul>
        <?php
        require ('../Function/mysql_func.php');
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "ccc_practice";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = select("ccc_product", "*") . " ORDER BY product_id DESC LIMIT 10";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['product_id']} - {$row['product_name']} - {$row['sku']} - {$row['product_type']} - {$row['category']} - {$row['manufacturer_cost']} - {$row['shipping_cost']} - {$row['total_cost']} - {$row['price']} - {$row['status']} - {$row['created_at']} - {$row['updated_at']}</li>";
                // echo "<li>{$row['product_id']} - {$row['product_name']} - {$row['sku']}</li>";
            }
        } else {
            echo "<li>No records found</li>";
        }

        $conn->close();
        ?>
    </ul>
</body>
</html>
