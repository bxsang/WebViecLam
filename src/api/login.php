<?php
require "../../vendor/autoload.php";
use \Firebase\JWT\JWT;
require_once 'objects.php';
require_once 'db.php';

class Login {
    private $user;
    private $pass;
    private $secret = 'BI_MAT';
    private $token;

    public function __construct($user, $pass) {
        $this->user = $user;
        $this->pass = $pass;
	}
	
	public function getUser() {
		return $this->user;
	}

	public function getPass() {
		return $this->pass;
    }
    
    public function getToken() {
        return $this->token;
    }

    public function genrateToken($user, $role) {
        $elements = [
            'username' => $this->user,
            'id' => $user->getID(),
            'name' => $user->getName(),
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
    
    public function printMessage($status) {
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

$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];
$role = $_REQUEST['role'];
$login = new Login($user, $pass);

$db = new Database();

header("Content-Type: application/json; charset=utf-8");

switch ($role) {
    case 'admin':
        $user = $db->selectAdmin($login);
        $login->genrateToken($user, 'admin');
        $login->printMessage(true);
        break;
    case 'employee':
        $user = $db->selectEmployee($login);
        $login->genrateToken($user, 'employee');
        $login->printMessage(true);
        break;
    case 'employer':
        $user = $db->selectEmployer($login);
        $login->genrateToken($user, 'employer');
        $login->printMessage(true);
        break;
    default:
        $login->printMessage(false);
        break;
}

?>