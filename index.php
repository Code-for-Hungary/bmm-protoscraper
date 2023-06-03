<?php

require_once 'bmm.php';
$config = require_once 'config.php';

$bmm = new bmm($config['backendUrl'], $config['uuid']);

function randomStr($length = 16)
{
    $string = '';

    while (($len = strlen($string)) < $length) {
        $size = $length - $len;
        $bytesSize = (int)ceil($size / 3) * 3;
        $bytes = random_bytes($bytesSize);
        $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
    }
    $string = str_replace(['0', '2', '4', '6', '8'], ' ', $string);

    return $string;
}


switch ($_GET['r']) {
    case 'getevents':
        echo $bmm->getEvents();
        break;
    case 'notifyevent':
        echo $bmm->notifyEvent($_GET['u'], randomStr(2500));
        break;
    default:
        echo 'ok';
}
