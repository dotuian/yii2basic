<?php


class Student {
    private $name;
    private $sex;
    private $age;
    
    function __construct() {
        echo __METHOD__ . PHP_EOL;
    }
    
    function __set($name, $value) {
        echo __METHOD__ . PHP_EOL;
        
        $this->$name = $value;
    }
    
    function __get($name) {
        echo __METHOD__ . PHP_EOL;
        return $this->$name;
    }
    
//    function __isset($name) {
//        echo __METHOD__ . PHP_EOL;
//        return $this->$name !== null;
//    }
    
    function __call($name, $arguments) {
        echo __METHOD__ . PHP_EOL;
        print_r($name);
        print_r($arguments);
    }
    
    
}

$s = new Student();
$s->age = "1";
//printf("%s". PHP_EOL, $s->age);
//echo isset($s->name) . PHP_EOL;
//echo isset($s->age) . PHP_EOL;

echo $s->toString1123();


?>
