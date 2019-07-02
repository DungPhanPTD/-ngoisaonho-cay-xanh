<?php
$SQL_FILE = dirname(__FILE__).'/db.sql';
$file_contents = file_get_contents($SQL_FILE);
$file_contents = str_replace("http://localhost/nsncayxanh
","http://cayxanh.ngoisaonho.net
",$file_contents);
file_put_contents($SQL_FILE,$file_contents);
// foreach(glob('/Applications/XAMPP/xamppfiles/htdocs/ngoisaonho-own-homepage/*') as $path_to_file) {
//     $file_contents = file_get_contents($path_to_file);
//     $file_contents = str_replace("http://localhost/ngoisaonho-own-homepage","http://staging.ngoisaonho.net",$file_contents);
//     file_put_contents($path_to_file,$file_contents);
// }
?>
