<?php
class Model_Request
{
    public function getParams($key = '')
    {
        return ($key == '')
            ? $_REQUEST
            : (isset($_REQUEST[$key])
                ? $_REQUEST[$key]
                : ''
            );
    }
    public function getPostData($key = '')
    {
        return ($key = '')
            ? $_REQUEST
            : (isset($_POST[$key])
                ? $_POST[$key]
                : ''
            );
    }
    public function getQueryData($key = '')
    {
        return ($key = '')
            ? $_REQUEST
            : (isset($_POST[$key])
                ? $_POST[$key]
                : ''
            );
    }
    public function isPost()
    {
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
    }
}
