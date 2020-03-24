<?php
require "../../vendor/autoload.php";
require_once 'objects.php';
require_once 'db.php';

if (isset($_REQUEST['role'])) {
    $role = $_REQUEST['role'];
    header("Content-Type: application/json; charset=utf-8");
}

switch ($role) {
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

        $db = new Database();
        if ($db->insertEmployee($name, $username, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path)) {
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

        $db = new Database();
        if ($db->insertEmployer($name, $username, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id)) {
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
