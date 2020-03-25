<?php
require "../../vendor/autoload.php";
use \Firebase\JWT\JWT;
require_once 'db.php';

class Login {
    private $username;
    private $password;
    private $secret = 'BI_MAT';
    private $token;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
	}
	
	public function getUsername() {
		return $this->username;
	}

	public function getPassword() {
		return $this->password;
    }
    
    public function getToken() {
        return $this->token;
    }

    public function getSecretCode() {
        return $this->secret;
    }

    public function genrateToken($user, $role) {
        $elements = [
            'username' => $this->username,
            'id' => $user->id,
            'name' => $user->name,
            'role' => $role
        ];
        $this->token = JWT::encode($elements, $this->secret);
    }

    public function getTokenFromClient() {
        if (isset($_COOKIE['token'])) {
            $this->token = $_COOKIE['token'];
        }
        else {
            $this->token = '';
        }
    }

    public function decodeToken() {
        $decoded = JWT::decode($this->token, $this->secret, array('HS256'));
        return $decoded;
    }

    public function checkLoggedIn() {
        $this->getTokenFromClient();
        if ($this->token != '') {
            return true;
        }
        return false;
    }
    
    public function printStatus($status) {
        if ($status == true) {
            echo json_encode([
                'status' => 'success',
                'token' => $this->token
            ]); 
        }
        else {
            echo json_encode([
                'status' => 'failed',
                'token' => null
            ]); 
        }
    }
}

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$role = $_REQUEST['role'];
$login = new Login($username, $password);

$selector = new selection();

header("Content-Type: application/json; charset=utf-8");

switch ($role) {
    case 'admin':
        $user = $selector->selectAdmin($login);
        $login->genrateToken($user, 'admin');
        $login->printStatus(true);
        break;
    case 'employee':
        $user = $selector->selectEmployee($login);
        $login->genrateToken($user, 'employee');
        $login->printStatus(true);
        break;
    case 'employer':
        $user = $selector->selectEmployer($login);
        $login->genrateToken($user, 'employer');
        $login->printStatus(true);
        break;
    default:
        $login->printStatus(false);
        break;
}

?>