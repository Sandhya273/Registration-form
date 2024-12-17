<?php
class Chair {
  public $brand;
  public $color;

  function __construct($brand,$color) {
    $this->brand = $brand;
    $this->color=$color;
  }
  function get_brand() {
    return $this->brand. "<br>" . $this->color;
  }
}

$ikea = new Chair("Ikea","Blue");
echo $ikea->get_brand();
?>