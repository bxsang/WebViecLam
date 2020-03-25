<?php
require_once 'auth.php';
require_once 'db.php';

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

if (isset($_REQUEST['field']) && ($role == 'admin' || $role == 'employer')) {
    $field = $_REQUEST['field'];
}
else {
    $db->printStatus();
    die();
}

switch ($field) {
    case 'company':
        $name = $_REQUEST['name'];
        $address = $_REQUEST['address'];
        $phone_number = $_REQUEST['phone_number'];

        $db->insertCompany($name, $address, $phone_number);
        break;

    case 'category':
        $name = $_REQUEST['name'];

        $db->insertCategory($name);
        break;

    case 'job':
        $title = $_REQUEST['title'];
        $type = $_REQUEST['type'];
        $salary = $_REQUEST['salary'];
        $description = $_REQUEST['description'];
        $requirement = $_REQUEST['requirement'];
        $job_work_address = $_REQUEST['job_work_address'];
        $expiry_at = $_REQUEST['expiry_at'];
        $com_id = $_REQUEST['com_id'];

        $db->insertJob($title, $type, $salary, $description, $requirement, $job_work_address, $expiry_at, $com_id);
        break;

    case 'applicant':
        $ee_id = $_REQUEST['ee_id'];
        $job_id = $_REQUEST['job_id'];
        $er_id = $_REQUEST['er_id'];

        $db->insertApplicant($ee_id, $job_id, $er_id);
        break;

    case 'response':
        $message = $_REQUEST['message'];
        $a_id = $_REQUEST['a_id'];

        $db->insertResponse($message, $a_id);
        break;
    
    default:
        break;
}

$db->printStatus();

?>