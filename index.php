<?php

require_once 'bmm.php';

$bmm = new bmm('http://bmmbackend.local', '99492276-d0f2-4097-9688-8ab7dd04322a');

switch ($_GET['r']) {
    case 'getevents':
        echo $bmm->getEvents();
        break;
    case 'postevent':

        break;
    default:
        echo 'ok';
}
