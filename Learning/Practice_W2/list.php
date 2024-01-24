<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Page</title>
</head>
<body>
    <h2>Last 10 Records</h2>
    
    <ul>
        <?php
        // Database connection details
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "ccc_practice";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the last 10 records from the database
        $query = "SELECT * FROM ccc_product ORDER BY id LIMIT 10";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['id']} - {$row['product_name']} - {$row['sku']} - {$row['product_type']} - {$row['category']} - {$row['manufacturer_cost']} - {$row['shipping_cost']} - {$row['total_cost']} - {$row['price']} - {$row['status']} - {$row['created_at']} - {$row['updated_at']}</li>";
            }
        } else {
            echo "<li>No records found</li>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </ul>
</body>
</html>
