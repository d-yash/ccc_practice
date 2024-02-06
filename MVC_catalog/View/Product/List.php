<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
    }

    .link {
        display: block;
        margin-top: 10px;
    }
</style>
<?php
class View_Product_List
{
    public function __construct()
    {
    }

    public function renderTable($data)
    {
        $table = "<table>";
        $table .= $this->renderTableHead();
        $table .= $this->renderTableBody($data);
        return $table;
    }

    public function renderTableBody($data)
    {
        $table_body = '<tbody>';
        foreach ($data as $value) {
            $table_body .= "<tr>";
            $table_body .= "<td>{$value['product_id']}</td>";
            $table_body .= "<td>{$value['product_name']}</td>";
            $table_body .= "<td>{$value['cat_id']}</td>";
            $table_body .= "<td><a href='../Product.php?action=edit&pid={$value['product_id']}'>Edit</a></td>";
            $table_body .= "<td><a href='../Product.php?action=delete&pid={$value['product_id']}'>Delete</a></td>";
            $table_body .= "<tr>";
        }
        $table_body .= "</tbody>";
        return $table_body;
    }
    public function renderTableHead()
    {
        $table_head = '<thead><tr>';
        $head_data = ["Id", "Name", "Category", "Edit", "Delete"];
        foreach ($head_data as $value) {
            $table_head .= "<th>{$value}</th>";
        }
        $table_head .= "</tr></thead>";
        return $table_head;
    }

    public function toHTML()
    {
        echo "<br>This is List file<br>";
        // return $this->renderTable($data);
    }

}

Root Folder
    /app/code/local
            /Product/
                /Model
                /Controller
                /View
            /Customer
                /Model
                /Controller
                /View
        /design/frontend/tempalte/
            /product
                /form.phtml
                /list.phtml
                /grid.phtml
            /customer/
                /form.phtml
                /list.phtml
                /address/
                    form.phtml

                    
http://myfolderrootdirectory
    product/index/new
    product/index/list
    product/index/save
    product/index/delete

    customer/index/new
    customer/index/list
    customer/index/save
    customer/index/delete

    customer/address/new
    customer/address/list
    customer/address/save
    customer/address/delete

    customer/quote_address/new
    customer/quote_address/list
    customer/quote_address/save
    customer/quote_address/delete