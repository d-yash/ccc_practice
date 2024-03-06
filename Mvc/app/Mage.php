<?php

class Mage
{
    private static $baseDir = 'C:/xampp/htdocs/Practice/Mvc';
    private static $baseUrl = 'http://localhost/Practice/Mvc';
    private static $_singleTon = [];
    public static function  init()
    {
        $frontController = new Core_Controller_Front();
        $frontController->init();
    }
    public static function getModel($modelName)
    {
        $modelName = ucwords(str_replace('/', '_Model_', $modelName), "_");
        return new $modelName();
    }
    public static function getBlock($blockName)
    {
        $blockName = ucwords(str_replace('/', '_Block_', $blockName), "_");
        return new $blockName();
    }
    public static function getSingleton($className)
    {

        if (isset(self::$_singleTon[$className])) {
            return  self::$_singleTon[$className];
        } else {
            return self::$_singleTon[$className] = self::getModel($className);
        }
    }
    public static function register($key, $value)
    {
    }
    public static function registry($key)
    {
    }
    public static function getBaseDir($subDir = null)
    {
        if ($subDir) {
            return self::$baseDir . '/' . $subDir;
        }
        return self::$baseDir;
    }
    public static function getBaseUrl($subUrl)
    {
        if ($subUrl) {
            return self::$baseUrl . '/' . $subUrl;
        }
        return self::$baseUrl;
    }
}
