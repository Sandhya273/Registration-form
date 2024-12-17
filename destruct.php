<?php
class Table {
  public $brand;
  public $color;

  function __construct($brand,$color) {
    $this->brand = $brand;
    $this->color = $color;
  }
  function __destruct() {
    echo "The brand is {$this->brand}.";
    echo "The color is {$this->color}.";
  }
}

$ikea = new Table("Ikea","Black");

?>