<?php
require $_SERVER['PWD']."/vendor/autoload.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/components/db.php';

if (isset($_POST['field'])) {
    $field = $_POST['field'];
    $db = new Update();
    header("Content-Type: application/json; charset=utf-8");
}

switch ($field) {
    // case 'admin':
    //     $id = $_REQUEST['id'];
    //     $name = $_REQUEST['name'];
    //     $password = $_REQUEST['password'];
    //     $email = $_REQUEST['email'];

    //     $db->updateAdmin($id, $name, $password, $email);
    //     break;

    case 'employee':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $birth_date = $_POST['birth_date'];
        $address = $_POST['address'];
        if ($_POST['gender_male'] == 'on') {
            $gender = 'Nam';
        } elseif ($_POST['gender_female'] == 'on') {
            $gender = 'Nữ';
        } else {
            $gender = 'not_defined';
        }
        $academic_level = $_POST['academic_level'];

        $db->updateEmployee($id, $name, $phone_number, $email, $password, $birth_date, $address, $gender, $academic_level);
        break;

    case 'employer':
        $id = $_POST['id'];
        $acc_email = $_POST['acc_email'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $com_email = $_POST['com_email'];
        $scale = $_POST['scale'];
        $contact_name = $_POST['contact_name'];
        $contact_phone = $_POST['contact_phone'];

        $db->updateEmployer($id, $acc_email, $name, $address, $com_email, $scale, $contact_name, $contact_phone);
        break;

    // case 'company':
    //     $id = $_REQUEST['id'];
    //     $name = $_REQUEST['name'];
    //     $address = $_REQUEST['address'];
    //     $phone_number = $_REQUEST['phone_number'];

    //     $db->updateCompany($id, $name, $address, $phone_number);
    //     break;

    // case 'category':
    //     $id = $_REQUEST['id'];
    //     $name = $_REQUEST['name'];

    //     $db->updateCategory($id, $name);
    //     break;

    // case 'job':
    //     $id = $_REQUEST['id'];
    //     $title = $_REQUEST['title'];
    //     $type = $_REQUEST['type'];
    //     $salary = $_REQUEST['salary'];
    //     $description = $_REQUEST['description'];
    //     $expiry_date = $_REQUEST['expiry_date'];
    //     $requirement = $_REQUEST['requirement'];
    //     $cat_id = $_REQUEST['cat_id'];
    //     $com_id = $_REQUEST['com_id'];

    //     $db->updateJob($id, $title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id);
    //     break;

    // case 'applicant':
    //     $id = $_REQUEST['id'];
    //     $ee_id = $_REQUEST['ee_id'];
    //     $job_id = $_REQUEST['job_id'];
    //     $er_id = $_REQUEST['er_id'];

    //     $db->updateApplicant($id, $ee_id, $job_id, $er_id);
    //     break;

    // case 'response':
    //     $id = $_REQUEST['id'];
    //     $message = $_REQUEST['message'];
    //     $a_id = $_REQUEST['a_id'];

    //     $db->updateResponse($id, $message, $a_id);
    //     break;
    
    default:
        break;
}

$db->printStatus();

?>
