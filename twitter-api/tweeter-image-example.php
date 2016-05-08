<?php
header("HTTP/1.1 404 File Not Found", 404);
exit;






// require codebird
require_once('codebird.php');
 
\Codebird\Codebird::setConsumerKey('YOURKEY', 'YOURSECRET');
$cb = \Codebird\Codebird::getInstance();
$cb->setToken('YOURTOKEN', 'YOURTOKENSECRET');

// Tweet media can be uploaded in a 2-step process. First you send each image to Twitter, like this

// these files to upload. You can also just upload 1 image!
$media_files = array(
#    'bird1.jpg', 'bird2.jpg', 'bird3.jpg'
    '../hhh.png'
);
// will hold the uploaded IDs
$media_ids = array();

foreach ($media_files as $file) {
    // upload all media files
    $reply = $cb->media_upload(array(
        'media' => $file
#        'media' => 'http://hhh-world.com/hhh_pd_.jpg' # medias depuis les internets possible

    ));
    // and collect their IDs
    $media_ids[] = $reply->media_id_string;
}

// Second, you attach the collected media ids for all images to your call to statuses/update, like this

// convert media ids to string list
$media_ids = implode(',', $media_ids);

// send tweet with these medias
$reply = $cb->statuses_update(array(
    'status' => 'Test post de status avec image via PHP.',
    'media_ids' => $media_ids
));
print_r($reply);
?>