<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "ccc_practice";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $product_name = $_POST['product_name'];

    $product_name = $_POST['product_name'];
    $sku = $_POST['sku'];
    $product_type = $_POST['product_type'];
    $category = $_POST['category'];
    $manufacturer_cost = $_POST['manufacturer_cost'];
    $shipping_cost = $_POST['shipping_cost'];
    $total_cost = $_POST['total_cost'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $created_at = date('Y-m-d', strtotime($_POST['created_at']));
    $updated_at = date('Y-m-d', strtotime($_POST['updated_at'])); 

    $sql = "INSERT INTO ccc_product (product_name, sku, product_type, category, manufacturer_cost, shipping_cost, total_cost, price, status, created_at, updated_at)
            VALUES ('$product_name', '$sku', '$product_type', '$category', '$manufacturer_cost', '$shipping_cost', '$total_cost', '$price', '$status', '$created_at', '$updated_at')";

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