<?php
    // require 'sql/connection.php';
    // require 'sql/functions.php';
    require '../Function/sqlFunc.php';
    $qb = new QueryBuilder();
    $qe = new QueryExecuter();
    // $conn = getDBConnection("ccc_practice");
    $query = $qb->select("ccc_category", "*");
    // $query = $conn->query($query);
    $result = $qe->fetchAssoc($qe->execute($query));
    $catArray = [];

    if($result!=null){
        // while($row = $qe->fetchAssoc($result)){
        //     $catArray[$row['cat_id']] = $row['name'];
        // }
        for($i=0; $i<count($result); $i++){
            $catArray[$result[$i]['cat_id']] = $result[$i]['name'];
        }
    }
    // $conn->close();
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
            // $conn = getDBConnection("ccc_practice");
            // $query = select("ccc_product", "*") . " ORDER BY product_id DESC LIMIT 20";
            $query = $qb->select("ccc_product", "*") . " ORDER BY product_id DESC LIMIT 20";
            $result = $qe->fetchAssoc($qe->execute($query));
           
            if ($result != null) {
                // while ($row = ) {
                //     echo "<tr>";
                //     echo "<td>{$row['product_id']}</td>";
                //     echo "<td>{$row['product_name']}</td>";
                //     echo "<td>{$row['sku']}</td>";
                //     echo "<td>{$catArray[$row['cat_id']]}</td>";
                //     echo "<td><a href='product.php?action=edit&id={$row['product_id']}'>Edit</a></td>";
                //     echo "<td><a href='product.php?action=delete&id={$row["product_id"]}'>Delete</a></td>";
                //     echo "</tr>";
                // }
                for ($i = 0; $i < count($result); $i++) {
                    echo "<tr>";
                    echo "<td>{$result[$i]['product_id']}</td>";
                    echo "<td>{$result[$i]['product_name']}</td>";
                    echo "<td>{$result[$i]['sku']}</td>";
                    echo "<td>{$catArray[$result[$i]['cat_id']]}</td>";
                    echo "<td><a href='product.php?action=edit&id={$result[$i]['product_id']}'>Edit</a></td>";
                    echo "<td><a href='product.php?action=delete&id={$result[$i]["product_id"]}'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            // $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
