<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/components/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/components/db.php';

header("Content-Type: application/json; charset=utf-8");

switch ($_REQUEST['field']) {
    case 'get':
        $com_id = $_GET['com_id'];
        $selection = new Selection();
        echo json_encode($selection->getSpecificCompany($com_id));
        break;
    
    default:
        # code...
        break;
}

?>
