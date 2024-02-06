<?php
class View_Product
{
    // protected $_catModObj = null;
    public function __construct()
    {
        // $this->_catModObj = new Model_Category();
    }
    public function toHtml()
    {
        echo "<br>This is Product file<br>";
        // return $this->createForm($category, $product);
    }

    public function createForm($category, $product)
    {
        if($product){
            $form = '<form action="" method="POST">';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[product_name]', "Product Name: ", $product->getProduct_name());
            $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[sku]', "Sku: ", $product->getProductSku());
            $form .= '</div>';
            $form .= '<div>';
                    $form .= $this->createRadioBtn("pdata[product_type]", 'Product Type', ['simple', 'bundle'], 'product_type', $product->getProduct_type());
            $form .= '</div>';
            $form.= '<div>';
                // $form .= $this->createDropDown('pdata[cat_id]','Category', $this->_catModObj->getCategoryArray(), 1);
                $form .= $this->createDropDown('pdata[cat_id]','Category', $category, $product->getCat_id(), 'product_category');
            $form.= '</div>';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[manufacturer_cost]', "Manufacturer Cost: ", $product->getManufacturer_cost());
            $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[shipping_cost]', "Shipping Cost: ", $product->getShipping_cost());
            $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[total_cost]', "Total Cost: ", $product->getTotal_cost());
            $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[price]', "Price: ", $product->getPrice()); 
            $form .= '</div>';
            $form.= '<div>';
                $form .= $this->createDropDown('pdata[status]','Status: ', [
                    "enabled" => 'Enabled',
                    "disabled" => 'Disabled',
                ], $product->getProduct_status(), 'product_status');
            $form.= '</div>';
            $form .= '<div>';
            $form .= $this->createDate('pdata[created_at]', 'Created At: ', $product->getCreated_at());
            $form .= '</div>';
            $form .= '<div>';
            $form .= $this->createDate('pdata[updated_at]', 'Updated At: ', $product->getUpdated_at());
            $form .= '</div>';
            $form .= '<div>';
                    $form .= $this->createUpdateBtn();
                $form .= '</div>';
            $form .= '</form>';
            return $form;
        }else{
            $form = '<form action="" method="POST">';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[product_name]', "Product Name: ", '');
            $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[sku]', "Sku: ", '');
            $form .= '</div>';
            $form .= '<div>';
                    $form .= $this->createRadioBtn("pdata[product_type]", 'Product Type', ['simple', 'bundle'], 'product_type', '');
            $form .= '</div>';
            $form.= '<div>';
                // $form .= $this->createDropDown('pdata[cat_id]','Category', $this->_catModObj->getCategoryArray(), 1);
                $form .= $this->createDropDown('pdata[cat_id]','Category', $category, $product->getCat_id(), '');
            $form.= '</div>';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[manufacturer_cost]', "Manufacturer Cost: ", '');
            $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[shipping_cost]', "Shipping Cost: ", '');
            $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[total_cost]', "Total Cost: ", '');
            $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createTextField('pdata[price]', "Price: ", ''); 
            $form .= '</div>';
            $form.= '<div>';
                $form .= $this->createDropDown('pdata[status]','Status: ', [
                    "enabled" => 'Enabled',
                    "disabled" => 'Disabled',
                ], $product->getProduct_status(), 'product_status');
            $form.= '</div>';
            $form .= '<div>';
            $form .= $this->createDate('pdata[created_at]', 'Created At: ', $product->getCreated_at());
            $form .= '</div>';
            $form .= '<div>';
            $form .= $this->createDate('pdata[updated_at]', 'Updated At: ', $product->getUpdated_at());
            $form .= '</div>';
            $form .= '<div>';
                    $form .= $this->createSubmitBtn();
                $form .= '</div>';
            $form .= '</form>';
            return $form;
        }
    }
    public function createTextField($name, $title, $value = '', $id = '')
    {
        return '<span> ' . $title . ' </span><input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '">';
    }
    public function createRadioBtn($name, $title, $values, $class, $default='')
    {
        $radioBtns = '<span> ' . $title . ' </span>';
        foreach ($values as $value) {
            $checked = ($value == $default) ? 'checked' : '';
            $radioBtns .= '<input type="radio" name="' . $name . '" value="' . $value . '" class="'. $class .'"' . $checked . '> ' . $value . ' ';
        }
        return $radioBtns;
    }
    public function createDropDown($name, $title,$options=array(), $default='', $id){
        $drop = '<span> ' . $title . ' </span>';
        $drop .= '<select name="'.$name.'">';
        
        foreach($options as $key=>$val){
            $selected = ($key == $default) ? 'selected':'';
            $drop .= '<option value="'.$key.'" class="'.$id.'"'.$selected.'>'.$val.'</option>';
        }
        $drop.='</select>';
        return $drop;
    }
    public function createDate($name, $title, $value=''){
        $create = '<label>'.$title.'</label>';
        $create .=  '<input type="date" name="'.$name.'" value="'.$value.'"/>';
        return $create;
    }
    public function createLabel($title){
        return '<label>'.$title.'</label>';
    }
    public function createSubmitBtn()
    {
        return '<input type="submit" name="submit" value="Submit">';
    }
    private function createUpdateBtn()
    {
        return "
        <div>
            <input type='submit' name='update' value='Update' id='update'>
        </div>
        ";
    }
}
