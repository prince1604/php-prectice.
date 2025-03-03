<?php
class fruit {
    public $name;
    public $color;
    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
}
    public function intro() {
        echo"the fruit is{$this->name}and the color is{$this->color}.";
    }
}
class strawberry extends fruit {
    public function message() {
        echo " am i a fruit or a berry ?";
    }
}
$strawberry = new strawberry("strawberry","red");
$strawberry->message();
$strawberry->intro();
?>
