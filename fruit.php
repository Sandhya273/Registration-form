<?php
class Fruit {
    public $name;
    public $color;

    function set_fruit($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    function get_fruit() {
        return $this->name ."<br>" . $this->color;
    }
}


$fruit = new Fruit("banana","yellow");
$fruit->set_fruit("banana", "yellow");

echo $fruit->get_fruit();  
?>
