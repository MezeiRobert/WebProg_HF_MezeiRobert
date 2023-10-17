<?php

class ArrayManipulator {
    private $data = [];

    public function __get($key)
    {
        if(isset($this->data[$key]))
        {
            return $this->data[$key];
        }
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public function __unset($key)
    {
        unset($this->data[$key]);
    }

    public function __toString() {
        return "toString method called";
    }

    public function __clone()
    {
        foreach ($this->data as $key => $value) 
        {
            if (is_object($value))
            {
                $this->data[$key] = clone $value;
            } else 
            {
                $this->data[$key] = $value;
            }
        }  
    }  

}

$manipulator = new ArrayManipulator();

$manipulator->item1 = "Value1";
$manipulator->item2 = "Value2";

echo $manipulator->item1;
echo "<br>";

var_dump(isset($manipulator->item1));
echo "<br>";

unset($manipulator->item2);
var_dump(isset($manipulator->item2)); 
echo "<br>";

echo $manipulator; 
echo "<br>";

$copy = clone $manipulator;
$manipulator->item1 = 'New Value 1';
echo $manipulator->item1;
echo "<br>";
echo $copy->item1;
echo "<br>";
?>