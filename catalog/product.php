<?php
  // require 'sql/connection.php';
  require 'sql/functions.php';
  require '../Learning/Function/php_func.php';
  $conn = getDBConnection("ccc_practice");
  $button_text="submit";
  $query1="SELECT * FROM `ccc_category`";
  $result1 = mysqli_query($conn, $query1);
  $categoryTable = mysqli_fetch_array($result1);
  $key = [];
  $id;
  
  function setValue(){
    global $button_text;
    global $key;
    if($button_text == "submit"){
      $key['product_name'] = "";
      $key['sku'] = "";
      $key['product_type'] = "simple";
      $key['cat_id'] = 1;
      $key['manufacturer_cost'] = "";
      $key['shipping_cost'] = "";
      $key['total_cost'] = "";
      $key['price'] = "";
      $key['status'] = "enabled";
      $key['created_at'] = "";
      $key['updated_at'] = "";
    }else{
      if(isset($_GET['id'])){
        global $conn;
        global $id;
        $id = getParams("id");
        $query = select("ccc_product", "*") . " WHERE `product_id` = $id";
        $result = $conn->query($query);
        if($result->num_rows > 0){
          $row = $result->fetch_assoc();
          $key['product_name'] = $row["product_name"];
          $key['sku'] = $row["sku"];
          $key['product_type'] = $row["product_type"];
          $key['cat_id'] = $row["cat_id"];
          $key['manufacturer_cost'] = $row["manufacturer_cost"];
          $key['shipping_cost'] = $row["shipping_cost"];
          $key['total_cost'] = $row["total_cost"];
          $key['price'] = $row["price"];
          $key['status'] = $row["status"];
          $key['created_at'] = $row["created_at"];
          $key['updated_at'] = $row["updated_at"];
        }
      }
    }
  }
  setValue();   //defaul init

  if (isset($_GET['id']) && getParams("action")=="delete") {
    $id=getParams("id");
    $query =delete_query("ccc_product",['product_id'=>$id]);
    $res=mysqli_query($conn,$query);
    if($res){
        echo "<script>alert('Data Deleted Successfully')</script>
              <script>location. href='product_list.php'</script>";
    }else{
      echo "<script>location. href='product_list.php'</script>";
    }
  } 
  if(isset($_GET['id']) && getParams("action")=="edit"){
    global $button_text;
    global $id;
    $id = getParams("id");
    $button_text = "update";
    setValue();
  }
  if (getParams('submit') == "Submit" && isset($_POST['product'])) {
    // $keys = getKeysFromPostRequest();
    // for ($i = 0; $i < count($keys); $i++) {
        $insertQuery = insert_query("ccc_product", getParams('product'));
        if ($conn->query($insertQuery)) {
            echo "<script>alert('Data submitted Successfully')</script>";
            echo "<script>location. href='product.php'</script>";
        } else {
          echo "<script>alert('Data not submitted')</script>";
          echo "<script>location. href='product.php'</script>";
        }
    };
  // };
  if (getParams('update') == "Update" && isset($_POST['product'])) {
    // $keys = getKeysFromPostRequest();
    // for ($i = 0; $i < count($keys); $i++) {
        $updateQuery = update_query("ccc_product", getParams('product'), ['product_id' => getParams('id')]);
        if ($conn->query($updateQuery)) {
            echo "<script>alert('Data updated Successfully')</script>";
            echo "<script>location. href='product_list.php'</script>";
        } else {
            echo "<script>alert('Data not updated')</script>";
            echo "<script>location. href='product_list.php'</script>";
        }
    };
  // };
    $conn->close();
  // }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="product.css" />
    <title>Form</title>
  </head>
  <body>
    <form action="" method="post">
      <h2>Product Form</h2>
      <br />
      <label for="product_name">Product name : </label>
      <input type="text" name="product[product_name]" value="<?php echo $key['product_name']; ?>" />
      <label for="sku" >SKU : </label>
      <input type="text" name="product[sku]" value="<?php echo $key['sku']; ?>" />

      <label for="product_type">Product Type : </label>
      <div class="p_type">
        <div id="radio_div">
          <input type="radio" id="simple" name="product[product_type]" value="simple" <?php echo ($key['product_type'] == 'simple') ? 'checked' : ''; ?> />
          <label for="simple">Simple</label>
        </div>
        <div id="radio_div">
          <input type="radio" id="bundle" name="product[product_type]" value="bundle" <?php echo ($key['product_type'] == 'bundle') ? 'checked' : ''; ?> />
          <label for="bundle">Bundle</label>
        </div>
      </div>
      <label for="category">Category : </label>
      <select name="product[cat_id]" id="product_category" class="input">
          <?php
          if (mysqli_num_rows($result1) > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
              $selected = ($row1['cat_id'] == $key['cat_id']) ? 'selected' : '';
              echo "<option value='{$row1['cat_id']}' $selected>{$row1['name']}</option>";
            }
          }
          ?>
      </select>
      <label for="manufacturer_cost">Manufacturer Cost : </label>
      <input type="text" name="product[manufacturer_cost]" value="<?php echo $key['manufacturer_cost']; ?>" />
      <label for="shipping_cost">Shipping Cost : </label>
      <input type="text" name="product[shipping_cost]" value="<?php echo $key['shipping_cost']; ?>" />
      <label for="total_cost">Total Cost : </label>
      <input type="text" name="product[total_cost]" value="<?php echo $key['total_cost']; ?>"/>
      <label for="price">Price : </label>
      <input type="text" name="product[price]" value="<?php echo $key['price']; ?>" />
      <label for="status">Status : </label>
      <select name="product[status]">
        <option value="enabled" <?php echo ($key['status'] == "enabled") ? 'selected' : ''; ?>>Enabled</option>
        <option value="disabled" <?php echo ($key['status'] == "disabled") ? 'selected' : ''; ?>>Disabled</option>
      </select>
        <div class="child_date">
          <label for="created_at">Created At : </label>
          <input type="date" name="product[created_at]" value="<?php echo $key['created_at']; ?>"/>
        </div>
        <div class="child_date">
          <label for="updated_at">Updated At : </label>
          <input type="date" name="product[updated_at]" value="<?php echo $key['updated_at']; ?>"/>
        </div>
      <div id="submit_button">
        <?php
        $uppercase=ucwords($button_text);
        echo "<input type='submit' name='$button_text' value='$uppercase' />";
        ?>
      </div>
    </form>
  </body>
</html>
