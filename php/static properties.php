<?php
class pi {
    public static $value=3.14159;
}
class x extends pi {
    public function xstatic() {
        return parent::$value;
    }
}
echo x::$value;
$x = new x();
echo $x->xstatic();
?>