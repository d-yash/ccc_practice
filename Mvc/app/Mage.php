<?php
class Mage{
    protected static $_baseDir = 'C:/xampp/htdocs/Practice/Project';
    protected static $_baseUrl = 'http://localhost/Practice/Project';
    protected static $_singleton = [];
    public static function init(){
        $frontController = new Core_Controller_Front();
        $frontController->init();
    }
    public static function getModel($className){
        $className = str_replace('/','_Model_', $className);
        $className = ucwords($className, '_');
        return new $className();
    }
    public static function getBlock($className){
        $className = str_replace('/','_Block_', $className);
        $className = ucwords($className, '_');
        return new $className();
    }
    public static function getBaseUrl($subUrl = null){
        if(is_null($subUrl)){
            return self::$_baseUrl;
        }else{
           return self::$_baseUrl. "/" . $subUrl; 
        }
    }
    public static function getBaseDir($subDir = null){
        if(is_null($subDir)){
            return self::$_baseDir;
        }
        else{
            return self::$_baseDir . "/" . $subDir;
        }
    }
    public static function getSingleton($className){
        if(isset(self::$_singleton[$className])){
            return self::$_singleton[$className];
        }else{
            return self::$_singleton[$className] = self::getModel($className);
        }
    }
}