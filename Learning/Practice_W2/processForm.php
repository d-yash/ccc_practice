<?php    
    require '../Function/mysql_func.php';
    require '../Function/php_func.php';
    
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "ccc_practice";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    // $sql = "INSERT INTO ccc_product (product_name, sku, product_type, category, manufacturer_cost, shipping_cost, total_cost, price, status, created_at, updated_at)
    //         VALUES ('$product_name', '$sku', '$product_type', '$category', '$manufacturer_cost', '$shipping_cost', '$total_cost', '$price', '$status', '$created_at', '$updated_at')";
    $data = getParams('product');
    $sql = insert_query('ccc_product', $data);
    if ($conn->query($sql) === TRUE) {
        echo "<h3>Record inserted successfully</h3>";
        echo '<script>
                setTimeout(function() {
                    window.location.href = "form.html";
                }, 2000);
              </script>';
        exit(0);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>