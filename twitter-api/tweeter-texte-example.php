<?php
header("HTTP/1.1 404 File Not Found", 404);
exit;






// example de code, ne pas utiliser tel quel

// require codebird
require_once('/twitter-api/codebird.php');
 
\Codebird\Codebird::setConsumerKey('YOURKEY', 'YOURSECRET');
$cb = \Codebird\Codebird::getInstance();
$cb->setToken('YOURTOKEN', 'YOURTOKENSECRET');

$params = array(
  'status' => 'Test post auto de status texte via PHP'
);
$reply = $cb->statuses_update($params);
print_r($reply);
?>
