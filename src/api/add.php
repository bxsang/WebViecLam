<?php
require "../../vendor/autoload.php";
require_once 'db.php';

if (isset($_REQUEST['table'])) {
    $table = $_REQUEST['table'];
    header("Content-Type: application/json; charset=utf-8");
}

switch ($table) {
    case 'company':
        $name = $_REQUEST['name'];
        $address = $_REQUEST['address'];
        $phone_number = $_REQUEST['phone_number'];
        $founding_date = $_REQUEST['founding_date'];

        $db = new Database();
        if ($db->insertCompany($name, $address, $phone_number, $founding_date)) {
            echo json_encode([
                'status' => 'success'
            ]);
        }
        else {
            echo json_encode([
                'status' => 'failed'
            ]);
        }
        break;

    case 'category':
        $name = $_REQUEST['name'];
        $db = new Database();
        if ($db->insertCategory($name)) {
            echo json_encode([
                'status' => 'success'
            ]);
        }
        else {
            echo json_encode([
                'status' => 'failed'
            ]);
        }
        break;

    case 'job':
        $title = $_REQUEST['title'];
        $type = $_REQUEST['type'];
        $salary = $_REQUEST['salary'];
        $description = $_REQUEST['description'];
        $expiry_date = $_REQUEST['expiry_date'];
        $requirement = $_REQUEST['requirement'];
        $cat_id = $_REQUEST['cat_id'];
        $com_id = $_REQUEST['com_id'];

        $db = new Database();
        if ($db->insertJob($title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id)) {
            echo json_encode([
                'status' => 'success'
            ]);
        }
        else {
            echo json_encode([
                'status' => 'failed'
            ]);
        }
        break;

    case 'applicant':
        $ee_id = $_REQUEST['ee_id'];
        $job_id = $_REQUEST['job_id'];
        $er_id = $_REQUEST['er_id'];

        $db = new Database();
        if ($db->insertApplicant($ee_id, $job_id, $er_id)) {
            echo json_encode([
                'status' => 'success'
            ]);
        }
        else {
            echo json_encode([
                'status' => 'failed'
            ]);
        }
        break;

    case 'response':
        $message = $_REQUEST['message'];
        $a_id = $_REQUEST['a_id'];

        $db = new Database();
        if ($db->insertResponse($message, $a_id)) {
            echo json_encode([
                'status' => 'success'
            ]);
        }
        else {
            echo json_encode([
                'status' => 'failed'
            ]);
        }
        break;
    
    default:
        echo json_encode([
            'status' => 'failed'
        ]);
        break;
}

?>