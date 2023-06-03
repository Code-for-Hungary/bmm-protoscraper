<?php

require_once 'bmm.php';
$config = require_once 'config.php';

$bmm = new bmm($config['backendUrl'], $config['uuid']);

switch ($_GET['r']) {
    case 'getevents':
        echo $bmm->getEvents();
        break;
    case 'postevent':

        break;
    default:
        echo 'ok';
}
