<?php
require_once 'auth.php';
require_once 'db.php';

if (!isset($_REQUEST['role'])) {
    die();
}

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$role = $_REQUEST['role'];
$login = new Auth($username, $password);

$selector = new selection();
$status = false;

header("Content-Type: application/json; charset=utf-8");

switch ($role) {
    case 'admin':
        $user = $selector->selectAdmin($login);
        if ($login->checkPassword($user)) {
            $login->genrateToken($user, 'admin');
            $login->setCookieWithToken();
            $status = true;
        }
        $login->printStatus($status);
        break;
    case 'employee':
        $user = $selector->selectEmployee($login);
        if ($login->checkPassword($user)) {
            $login->genrateToken($user, 'employee');
            $login->setCookieWithToken();
            $status = true;
        }
        $login->printStatus($status);
        break;
    case 'employer':
        $user = $selector->selectEmployer($login);
        if ($login->checkPassword($user)) {
            $login->genrateToken($user, 'employer');
            $login->setCookieWithToken();
            $status = true;
        }
        $login->printStatus($status);
        break;
    default:
        $login->printStatus($status);
        break;
}

?>