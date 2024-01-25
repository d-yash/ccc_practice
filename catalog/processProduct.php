<?php
    require 'sql/connection.php';
    require 'sql/functions.php';
    require '../Learning/Function/php_func.php';
    $conn = getDBConnection("ccc_practice");

    $data = getParams('product');
    $id = $_GET['id'];
    echo $id;
    $query = select("ccc_product", "*") . " WHERE product_id=$id";
    // $result = $conn->query($query);
    $result = mysqli_query($conn, $query);

    // if($result->num_rows > 0){
    //     $sql = update_query('ccc_product', $data, ['product_id'=>$id]);
    //     if ($conn->query($sql) === TRUE) {
    //         echo "<script>alert('Record updated successfully')</script>
    //               <script>location. href='product_list.php'</script>";
    //         exit(0);
    //     } else {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    // }else{
    //     $sql = insert_query('ccc_product', $data);
    //     if ($conn->query($sql) === TRUE) {
    //         echo "<script>alert('Record inserted successfully')</script>
    //               <script>location. href='product.php'</script>";
    //         exit(0);
    //     } else {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    // }


    $conn->close();
?>