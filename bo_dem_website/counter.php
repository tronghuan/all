<?php  
$viewss = file("counterlog.txt");  
$views = $viewss[0]; $views++;  
$fp = fopen("counterlog.txt", "w");  
fwrite($fp, $views);  
fclose($fp);  
?>