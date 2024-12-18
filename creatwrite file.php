<?php
$myfile = fopen("newfile.txt","w") or die ("unable to open file!");
$txt = "john doe\n";
fwrite($myfile, $txt);
$txt = "jane doe\n";
fwrite($myfile, $txt);
fclose($myfile);
?>