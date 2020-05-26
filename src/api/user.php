<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/components/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/components/db.php';

$db = new Insertion();
header("Content-Type: application/json; charset=utf-8");

$auth = new Auth();
$auth->getTokenFromClient();
try {
    $role = $auth->decodeToken()->role;
    $id = $auth->getUserId();
} catch (\Throwable $th) {
    $db->printStatus();
    die();
}

if (isset($_GET['field'])) {
    $field = $_GET['field'];
}
else {
    $db->printStatus();
    die();
}

switch ($field) {
    case 'get-info':
        if ($role == 'employee') {
            $selection = new Selection();
            echo json_encode($selection->getEmployeeInfo($id));
        } elseif ($role == 'employer') {
            $selection = new Selection();
            echo json_encode($selection->getEmployerInfo($id));
        }
        break;
    
    default:
        break;
}

?>
