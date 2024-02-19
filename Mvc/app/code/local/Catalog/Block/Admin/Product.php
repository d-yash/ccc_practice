<?php

class Catalog_Block_Admin_Product{
    public function __construct(){
        print_r($this);
    }
    public function toHtml(){
        return $this->createProductForm();
    }
    public function createProductForm(){
        $form = '<form action="" method="POST">';
        $form .= $this->renderTextField("catalog_product[sku]", "Sku ");
        return $form;
    }
    private function renderTextField($name, $label, $value = '')
    {
        $textfield = "
        <div>
            <label for={$name}>{$label}</label>
            <input type='text' name={$name} id={$name} value='{$value}'>
        </div>
        ";
        return $textfield;
    }
    private function renderSubmitButton()
    {
        $textfield = "
        <div>
            <input type='submit' name='submit' value='Submit' id='submit'>
        </div>
        ";
        return $textfield;
    }
}