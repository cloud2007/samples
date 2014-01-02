<?php

define('BASEDIR', strtr(dirname(__FILE__) . DIRECTORY_SEPARATOR, "\\", '/'));
define('UPLOAD_PATH', '/uploads');

$config = array(
    'uploadPath' => 'a',
    'thumbSize' => array(
        'small' => array(
            'width' => '200',
            'height' => '200',
            'watermark' => 1,
        ),
        'middle' => array(
            'width' => '400',
            'height' => '400',
            'watermark' => 1,
        )
    )
);

function __autoload($classname) {
    require $classname . '.php';
}

require('Uploader.php');
$uploader = new Uploader($config);
//$uploader->needWaterMark = Uploader::WATER_MARK_IMAGE;
//$uploader->needResize = true;
$uploader->save();
echo $uploader->save();
?>