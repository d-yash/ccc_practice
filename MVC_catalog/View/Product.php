<?php
class View_Product
{
    protected $_catModObj = null;
    public function __construct()
    {
        $this->_catModObj = new Model_Category();
    }
    public function toHtml()
    {
        return $this->createForm();
    }
    public function createForm()
    {
        $form = '<form action="" method="POST">';
        $form .= '<div>';
            $form .= $this->createTextField('pdata[product_name]', "Product Name: ");
        $form .= '</div>';
        $form .= '<div>';
            $form .= $this->createTextField('pdata[sku]', "Sku: ");
        $form .= '</div>';
        $form .= '<div>';
                $form .= $this->createRadioBtn("pdata[product_type]", 'Product Type', ['simple', 'bundle'], 'simple');
        $form .= '</div>';
        $form.= '<div>';
            $form .= $this->createDropDown('pdata[cat_id]','Category', $this->_catModObj->getCategoryArray(), 1);
        $form.= '</div>';
        $form .= '<div>';
            $form .= $this->createTextField('pdata[manufacturer_cost]', "Manufacturer Cost: ");
        $form .= '</div>';
        $form .= '<div>';
            $form .= $this->createTextField('pdata[shipping_cost]', "Shipping Cost: ");
        $form .= '</div>';
        $form .= '<div>';
            $form .= $this->createTextField('pdata[total_cost]', "Total Cost: ");
        $form .= '</div>';
        $form .= '<div>';
            $form .= $this->createTextField('pdata[price]', "Price: "); 
        $form .= '</div>';
        $form.= '<div>';
            $form .= $this->createDropDown('pdata[status]','Category: ', ["Enabled", "Disabled"]);
        $form.= '</div>';
        $form .= '<div>';
        $form .= $this->createDate('pdata[created_at]', 'Created At: ');
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->createDate('pdata[updated_at]', 'Updated At: ');
        $form .= '</div>';
        $form .= '<div>';
	        	$form .= $this->createSubmitBtn('Submit');
	        $form .= '</div>';
        $form .= '</form>';
        return $form;
    }
    public function createTextField($name, $title, $value = '', $id = '')
    {
        return '<span> ' . $title . ' </span><input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '">';
    }
    public function createRadioBtn($name, $title, $values, $default)
    {
        $radioBtns = '<span> ' . $title . ' </span>';
        foreach ($values as $value) {
            $checked = ($value == $default) ? 'checked' : '';
            $radioBtns .= '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . '> ' . $value . ' ';
        }
        return $radioBtns;
    }
    public function createDropDown($name, $title,$options, $default=0){
        $drop = '<span> ' . $title . ' </span>';
        $drop .= '<select name="'.$name.'">';
        
        foreach($options as $key=>$val){
            $selected = ($key == $default) ? 'selected':'';
            $drop .= '<option value="'.$key.'"'.$selected.'>'.$val.'</option>';
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
    public function createSubmitBtn($title)
    {
        return '<input type="submit" name="submit" value="'.$title.'">';
    }
}
