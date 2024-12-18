<?php
$myfile = fopen("webdictionary.txt","r") or die ("unable to open file!");
while(!feof($myfile)) {
    echo fgets($myfile);    
}
fclose($myfile);
?>