<?php
require "../../vendor/autoload.php";
require_once 'db.php';

if (isset($_REQUEST['field'])) {
    $field = $_REQUEST['field'];
}

$db = new Insertion();
header("Content-Type: application/json; charset=utf-8");

switch ($field) {
    case 'employee':
        $name = $_REQUEST['name'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $gender = $_REQUEST['gender'];
        $address = $_REQUEST['address'];
        $current_occupation = $_REQUEST['current_occupation'];
        $phone_number = $_REQUEST['phone_number'];
        $avatar_path = 'avatar/employees/1.jpg';
        $experience = $_REQUEST['experience'];
        $cv_path = 'cv/1.docx';

        $db->insertEmployee($name, $username, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path);
        break;

    case 'employer':
        $name = $_REQUEST['name'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $gender = $_REQUEST['gender'];
        $address = $_REQUEST['address'];
        $phone_number = $_REQUEST['phone_number'];
        $avatar_path = 'avatar/employers/2.jpg';
        $com_id = $_REQUEST['com_id'];

        $db->insertEmployer($name, $username, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id);
        break;

    case 'company':
        $name = $_REQUEST['name'];
        $address = $_REQUEST['address'];
        $phone_number = $_REQUEST['phone_number'];
        $founding_date = $_REQUEST['founding_date'];

        $db->insertCompany($name, $address, $phone_number, $founding_date);
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
        $expiry_date = $_REQUEST['expiry_date'];
        $requirement = $_REQUEST['requirement'];
        $cat_id = $_REQUEST['cat_id'];
        $com_id = $_REQUEST['com_id'];

        $db->insertJob($title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id);
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