<?php
require "../../vendor/autoload.php";
use \Firebase\JWT\JWT;

class Auth {
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

    public function checkPassword($user) {
        if ($user != null) {
            return true;
        }
        return false;
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

    public function setCookieWithToken() {
        setcookie("token", $this->token, time() + (86400 * 1), "/", "", false, true); // 86400 = 1 day;
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

?>
