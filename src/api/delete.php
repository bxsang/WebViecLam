<?php
require "../../vendor/autoload.php";
require_once 'db.php';

if (isset($_REQUEST['field'])) {
    $field = $_REQUEST['field'];
    $db = new Delete();
    header("Content-Type: application/json; charset=utf-8");
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