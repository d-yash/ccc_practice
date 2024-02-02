<?php
    class File
    {
        private $_filename;
        private $_size;
        
        function __construct($file, $size)
        {   
            $this->_filename = $file;
            $this->_size = $size;
        }
        public function getFileExtension()
        {
            $parts = explode(".", $this->_filename);
            return end($parts);
        }

        public function displayFileInfo()
        {
            echo "Filename: $this->_filename, Size: $this->_size KB";
        }
    }

    $f = new File("demo.php", 20);
    echo "Extension : " . $f->getFileExtension() . "<br>";
    $f->displayFileInfo();
