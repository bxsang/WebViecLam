<?php
require "../../vendor/autoload.php";
use \Firebase\JWT\JWT;

class Auth {
    private $secret;
    private $token;

    public function __construct() {
        $this->secret = 'BI_MAT';
        $this->token = null;
	}
    
    public function getToken() {
        return $this->token;
    }

    public function getSecretCode() {
        return $this->secret;
    }

    public function genrateToken($user, $role) {
        $elements = [
            'username' => $user->username,
            'id' => $user->id,
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

    public function isLoggedIn() {
        if ($this->token != '') {
            return true;
        }
        return false;
    }
}

?>
