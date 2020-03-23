<?php

class Database {
    private $db_server;
    private $db_user;
    private $db_pass;
    private $dbname;
    
    public function __construct() {
        try {
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
            $dotenv->load();
            $this->db_server = $_ENV['DB_SERVER'];
            $this->db_user = $_ENV['DB_USER'];
            $this->db_pass = $_ENV['DB_PASS'];
            $this->dbname = $_ENV['DB_NAME'];
        } catch (\Throwable $th) {
            $this->db_server = getenv('DB_SERVER');
            $this->db_user = getenv('DB_USER');
            $this->db_pass = getenv('DB_PASS');
            $this->dbname = getenv('DB_NAME');
        }
    }

    public function selectAdmin($login) {
        $conn = new mysqli($this->db_server, $this->db_user, $this->db_pass, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare('SELECT ad_id, ad_name, ad_email FROM Admins WHERE ad_username=? AND ad_password=?');
        $stmt->bind_param('ss', $login->getUser(), sha1($login->getPass()));
        $stmt->execute();
        $stmt->bind_result($id, $name, $email);
        if ($stmt->fetch()) {
            $stmt->close();
            return new Admin($id, $name, $email);
        }
        return null;
    }

    public function selectEmployee($login) {
        $conn = new mysqli($this->db_server, $this->db_user, $this->db_pass, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare('SELECT ee_id, ee_name, ee_email, ee_gender, ee_address, ee_current_occupation, ee_phone_number, ee_avatar_path, ee_experience, ee_cv_path FROM Employees WHERE ee_username=? AND ee_password=?');
        $stmt->bind_param('ss', $login->getUser(), sha1($login->getPass()));
        $stmt->execute();
        $stmt->bind_result($id, $name, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path);
        if ($stmt->fetch()) {
            $stmt->close();
            return new Employee($id, $name, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path);
        }
        return null;
    }

    public function selectEmployer($login) {
        $conn = new mysqli($this->db_server, $this->db_user, $this->db_pass, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare('SELECT er_id, er_name, er_email, er_gender, er_address, er_phone_number, er_avatar_path, com_id FROM Employers WHERE er_username=? AND er_password=?');
        $stmt->bind_param('ss', $login->getUser(), sha1($login->getPass()));
        $stmt->execute();
        $stmt->bind_result($id, $name, $email, $gender, $address, $phone_number, $avatar_path, $com_id);
        if ($stmt->fetch()) {
            $stmt->close();
            return new Employer($id, $name, $email, $gender, $address, $phone_number, $avatar_path, $com_id);
        }
        return null;
    }
}

// admin: admin:admin123
// employee1: nva:abcd1234
// employer1: ntb:abcd1234
?>