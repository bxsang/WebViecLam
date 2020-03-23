<?php
require "../../vendor/autoload.php";
use \Firebase\JWT\JWT;
require_once 'user.php';
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

    public function genrateToken($id, $name, $role) {
        $token = [
            'username' => $this->user,
            'id' => $id,
            'name' => $name,
            'role' => $role
        ];
        $jwt = JWT::encode($token, $this->secret);
        return $jwt;
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
}

$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];
$role = $_REQUEST['role'];
$login = new Login($user, $pass);

$db = new Database();
// var_dump($db->selectAdmin($login));
// var_dump($db->selectEmployee($login));
// var_dump($db->selectEmployer($login));

header("Content-Type: application/json; charset=utf-8");

switch ($role) {
    case 'admin':
        $user = $db->selectAdmin($login);
        $token = $login->genrateToken($user->getID(), $user->getName(), 'admin');
        echo json_encode([
            'status' => 'success',
            'token' => $token
        ]);
        break;
    case 'employee':
        $user = $db->selectEmployee($login);
        $token = $login->genrateToken($user->getID(), $user->getName(), 'employee');
        echo json_encode([
            'status' => 'success',
            'token' => $token
        ]);
        break;
    case 'employer':
        $user = $db->selectEmployer($login);
        $token = $login->genrateToken($user->getID(), $user->getName(), 'employer');
        echo json_encode([
            'status' => 'success',
            'token' => $token
        ]);
        break;
    default:
        echo json_encode([
            'status' => 'failed',
            'token' => null
        ]);
        break;
}

?>