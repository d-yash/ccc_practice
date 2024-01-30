<?php
    // require 'sql/connection.php';
    require 'sql/functions.php';
    $conn = getDBConnection("ccc_practice");
    $query = select("ccc_category", "*");
    $result = $conn->query($query);
    $catArray = [];

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $catArray[$row['cat_id']] = $row['name'];
        }
    }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        table {
            border-collapse: collapse;
            width: fit-content;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Product List</h2>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>SKU</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = getDBConnection("ccc_practice");
            $query = select("ccc_product", "*") . " ORDER BY product_id DESC LIMIT 20";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['product_id']}</td>";
                    echo "<td>{$row['product_name']}</td>";
                    echo "<td>{$row['sku']}</td>";
                    echo "<td>{$catArray[$row['cat_id']]}</td>";
                    echo "<td><a href='product.php?action=edit&id={$row['product_id']}'>Edit</a></td>";
                    echo "<td><a href='product.php?action=delete&id={$row["product_id"]}'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
