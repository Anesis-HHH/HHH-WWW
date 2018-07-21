<?php
header("Pragma: no-cache");
include 'include/head.php';

echo '<div id="main" style="margin: 80px;"><pre>';
readfile('/srv/hhh-world/logs/www-error.log');
echo '</pre></div>';

include 'include/foot.php';
?>
