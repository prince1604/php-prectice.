<?php
namespace html;
class table {
    public $title = "";
    public $numrows = 0;
    public function message() {
        echo"<p>table '{$this->title}' has {$this->numrows} row.</p>";
    }
}
$table = new table();
$table->title = "my table";
$table->numrows = 5;
?>
<html>
    <body>
        <?php
        $table->message();
        ?>
    </body>
</html>