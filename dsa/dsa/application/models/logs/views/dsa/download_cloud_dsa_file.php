<?php
/*
header("Content-Disposition: attachment; filename=\"" . basename($url) . "\"");
header("Content-Type: application/octet-stream");
header("Content-Length: " . filesize($url));
header("Connection: close");
*/
?>
<a href="<?php

echo $url;

?>" download > Download </a> 



