<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/components/db.php';

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
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];

        $db->insertEmployee($username, $password, $email, $phone_number);
        $db->insertNameToFiles($db->getInsertId(), $name);

        break;

    case 'employer':
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $company_name = $_POST['company_name'];
        $address = $_POST['address'];
        $scale = $_POST['scale'];
        $contact_name = $_POST['contact_name'];
        $contact_phone = $_POST['contact_phone'];
        $contact_email = $_POST['contact_email'];

        $db->insertCompany($company_name, $address, $contact_name, $contact_phone, $contact_email, $scale);
        $db->insertEmployer($username, $password, $email, $db->getInsertId());
        break;
    
    default:
        break;
}

$db->printStatus();

?>
