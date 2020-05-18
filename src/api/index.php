<?php

$field = $_REQUEST['field'];
switch ($field) {
    case 'login':
        include_once 'login.php';
        break;
    
    case 'register':
        include_once 'register.php';
        break;
    default:
        echo 'failed';
        break;
}

?>
