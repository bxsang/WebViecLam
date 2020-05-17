<?php
require_once 'auth.php';
require_once 'db.php';

class Login extends Auth {
    private $username;
    private $password;

    public function __construct($username, $password) {
        parent::__construct();
        $this->username = $username;
        $this->password = $password;
    }
    
    public function getUsername() {
		return $this->username;
	}

	public function getPassword() {
		return $this->password;
    }

    public function checkPassword($user) {
        if ($user != null) {
            return true;
        }
        return false;
    }

    public function printStatus($status) {
        if ($status == true) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Dang nhap thanh cong'
            ]); 
        }
        else {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Dang nhap that bai'
            ]); 
        }
    }
}

if (!isset($_POST['role'])) {
    die();
}

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$login = new Login($username, $password);

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