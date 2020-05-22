<?php
require "../../vendor/autoload.php";
require_once '../components/db.php';

if (isset($_REQUEST['field'])) {
    $field = $_REQUEST['field'];
    $db = new Update();
    header("Content-Type: application/json; charset=utf-8");
}

switch ($field) {
    case 'admin':
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];

        $db->updateAdmin($id, $name, $password, $email);
        break;

    case 'employee':
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $gender = $_REQUEST['gender'];
        $address = $_REQUEST['address'];
        $current_occupation = $_REQUEST['current_occupation'];
        $phone_number = $_REQUEST['phone_number'];
        $avatar_path = 'avatar/employees/1.jpg';
        $experience = $_REQUEST['experience'];
        $cv_path = 'cv/1.docx';

        $db->updateEmployee($id, $name, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path);
        break;
    
    case 'employer':
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $gender = $_REQUEST['gender'];
        $address = $_REQUEST['address'];
        $phone_number = $_REQUEST['phone_number'];
        $avatar_path = 'avatar/employers/2.jpg';
        $com_id = $_REQUEST['com_id'];

        $db->updateEmployer($id, $name, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id);
        break;

    case 'company':
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $address = $_REQUEST['address'];
        $phone_number = $_REQUEST['phone_number'];

        $db->updateCompany($id, $name, $address, $phone_number);
        break;

    case 'category':
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];

        $db->updateCategory($id, $name);
        break;

    case 'job':
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $type = $_REQUEST['type'];
        $salary = $_REQUEST['salary'];
        $description = $_REQUEST['description'];
        $expiry_date = $_REQUEST['expiry_date'];
        $requirement = $_REQUEST['requirement'];
        $cat_id = $_REQUEST['cat_id'];
        $com_id = $_REQUEST['com_id'];

        $db->updateJob($id, $title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id);
        break;

    case 'applicant':
        $id = $_REQUEST['id'];
        $ee_id = $_REQUEST['ee_id'];
        $job_id = $_REQUEST['job_id'];
        $er_id = $_REQUEST['er_id'];

        $db->updateApplicant($id, $ee_id, $job_id, $er_id);
        break;

    case 'response':
        $id = $_REQUEST['id'];
        $message = $_REQUEST['message'];
        $a_id = $_REQUEST['a_id'];

        $db->updateResponse($id, $message, $a_id);
        break;
    
    default:
        break;
}

$db->printStatus();

?>
