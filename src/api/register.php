<?php
require_once 'db.php';

header("Content-Type: application/json; charset=utf-8");
if (isset($_POST['role'])) {
    $role = $_POST['role'];
    $db = new Insertion();
}
else {
    $db->printStatus();
    die();
}

switch ($role) {
    case 'employee':
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $current_occupation = $_POST['current_occupation'];
        $phone_number = $_POST['phone_number'];
        $avatar_path = 'avatar/employees/1.jpg';
        $experience = $_POST['experience'];
        $cv_path = 'cv/1.docx';

        $db->insertEmployee($name, $username, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path);
        break;

    case 'employer':
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];
        $avatar_path = 'avatar/employers/2.jpg';
        $com_id = $_POST['com_id'];

        $db->insertEmployer($name, $username, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id);
        break;
    
    default:
        break;
}

$db->printStatus();

?>