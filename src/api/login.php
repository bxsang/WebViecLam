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

    public function genrateToken() {
        $token = [
            'username' => $this->user
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

switch ($role) {
    case 'admin':
        var_dump($db->selectAdmin($login));
        break;
    case 'employee':
        var_dump($db->selectEmployee($login));
        break;
    case 'employer':
        var_dump($db->selectEmployer($login));
        break;
    default:
        echo '';
        break;
}

?>