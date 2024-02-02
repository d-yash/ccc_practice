<?php
class View_Product
{
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
    public function createLabel($title){
        return '<label>'.$title.'</label>';
    }
    public function createSubmitBtn($title)
    {
        return '<input type="submit" name="submit" value="'.$title.'">';
    }
}
