<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/components/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/components/db.php';

$db = new Insertion();
header("Content-Type: application/json; charset=utf-8");

$auth = new Auth();
$auth->getTokenFromClient();
try {
    $role = $auth->decodeToken()->role;
} catch (\Throwable $th) {
    $db->printStatus();
    die();
}

if (isset($_POST['field']) && ($role == 'admin' || $role == 'employer')) {
    $field = $_POST['field'];
}
else {
    $db->printStatus();
    die();
}

switch ($field) {
    case 'category':
        $name = $_POST['name'];

        $db->insertCategory($name);
        break;

    case 'applicant':
        $ee_id = $_POST['ee_id'];
        $job_id = $_POST['job_id'];

        $db->insertApplicant($ee_id, $job_id);
        break;

    case 'response':
        $message = $_POST['message'];
        $a_id = $_POST['a_id'];

        $db->insertResponse($message, $a_id);
        break;
    
    default:
        break;
}

$db->printStatus();

?>
