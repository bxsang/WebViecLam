<?php
require_once '../components/auth.php';
require_once '../components/db.php';

header("Content-Type: application/json; charset=utf-8");

$db = new Delete();
$auth = new Auth();
$auth->getTokenFromClient();
try {
    $role = $auth->decodeToken()->role;
} catch (\Throwable $th) {
    $db->printStatus();
    die();
}

if (isset($_REQUEST['field']) && $role == 'admin') {
    $field = $_REQUEST['field'];
    header("Content-Type: application/json; charset=utf-8");
}
else {
    $db->printStatus();
    die();
}

switch ($field) {
    case 'employee':
        $id = $_REQUEST['id'];

        $db->deleteEmployee($id);
        break;
    
    case 'employer':
        $id = $_REQUEST['id'];

        $db->deleteEmployer($id);
        break;

    case 'company':
        $id = $_REQUEST['id'];

        $db->deleteCompany($id);
        break;

    case 'category':
        $id = $_REQUEST['id'];

        $db->deleteCategory($id);
        break;

    case 'job':
        $id = $_REQUEST['id'];

        $db->deleteJob($id);
        break;

    case 'applicant':
        $id = $_REQUEST['id'];

        $db->deleteApplicant($id);
        break;

    case 'response':
        $id = $_REQUEST['id'];

        $db->deleteResponse($id);
        break;
    
    default:
        break;
}

$db->printStatus();

?>
