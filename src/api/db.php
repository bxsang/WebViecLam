<?php

class Database {
    private $db_server;
    private $db_user;
    private $db_pass;
    private $dbname;

    private $conn;
    private $stmt;
    private $query_string;
    
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

    public function connect() {
        $this->conn = new mysqli($this->db_server, $this->db_user, $this->db_pass, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query() {
        $this->connect();
        $this->stmt = $this->conn->prepare($this->query_string);
    }

    public function closeConnection() {
        $this->stmt->close();
        $this->conn->close();
    }

    public function selectAdmin($login) {
        $this->query_string = 'SELECT ad_id, ad_name, ad_email FROM Admins WHERE ad_username=? AND ad_password=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('ss', $login->getUser(), sha1($login->getPass()));
        $this->stmt->execute();
        $this->stmt->bind_result($id, $name, $email);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Admin($id, $name, $email);
        }
        return null;
    }

    public function selectEmployee($login) {
        $this->query_string = 'SELECT ee_id, ee_name, ee_email, ee_gender, ee_address, ee_current_occupation, ee_phone_number, ee_avatar_path, ee_experience, ee_cv_path FROM Employees WHERE ee_username=? AND ee_password=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('ss', $login->getUser(), sha1($login->getPass()));
        $this->stmt->execute();
        $this->stmt->bind_result($id, $name, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Employee($id, $name, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path);
        }
        return null;
    }

    public function selectEmployer($login) {
        $this->query_string = 'SELECT er_id, er_name, er_email, er_gender, er_address, er_phone_number, er_avatar_path, com_id FROM Employers WHERE er_username=? AND er_password=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('ss', $login->getUser(), sha1($login->getPass()));
        $this->stmt->execute();
        $this->stmt->bind_result($id, $name, $email, $gender, $address, $phone_number, $avatar_path, $com_id);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Employer($id, $name, $email, $gender, $address, $phone_number, $avatar_path, $com_id);
        }
        return null;
    }

    public function selectCompany($id) {
        $this->query_string = 'SELECT com_name, com_address, com_phone_number, com_founding_date FROM Companies WHERE com_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->stmt->execute();
        $this->stmt->bind_result($id, $name, $address, $phone_number, $founding_date);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Company($id, $name, $address, $phone_number, $founding_date);
        }
        return null;
    }

    public function selectCategory($id) {
        $this->query_string = 'SELECT cat_name FROM Categories WHERE cat_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->stmt->execute();
        $this->stmt->bind_result($id, $name);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Category($id, $name);
        }
        return null;
    }

    public function selectJob($id) {
        $this->query_string = 'SELECT job_title, job_type, job_salary, job_description, job_created_date, job_expiry_date, job_requirement, cat_id, com_id FROM Jobs WHERE job_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->stmt->execute();
        $this->stmt->bind_result($id, $title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Job($id, $title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id);
        }
        return null;
    }

    public function selectApplicant($id) {
        $this->query_string = 'SELECT ee_id, job_id, er_id FROM Companies WHERE a_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->stmt->execute();
        $this->stmt->bind_result($id, $ee_id, $job_id, $er_id);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Applicant($id, $ee_id, $job_id, $er_id);
        }
        return null;
    }

    public function selectResponse($id) {
        $this->query_string = 'SELECT res_message, a_id FROM Companies WHERE res_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->stmt->execute();
        $this->stmt->bind_result($id, $message, $a_id);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Response($id, $message, $a_id);
        }
        return null;
    }

    public function insertEmployee($name, $username, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path) {
        $this->query_string = 'INSERT INTO Employees (ee_id, ee_name, ee_username, ee_password, ee_email, ee_gender, ee_address, ee_current_occupation, ee_phone_number, ee_avatar_path, ee_experience, ee_cv_path, ee_created_at, ee_modified_at) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,CURRENT_DATE(),NULL)';
        $this->query($this->query_string);
        $this->stmt->bind_param('sssssssssss', $name, $username, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path);
        $this->stmt->execute();
        if ($this->stmt->affected_rows == 1) {
            $this->closeConnection();
            return true;
        }
        return false;
        $this->closeConnection();
    }

    public function insertEmployer($name, $username, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id) {
        $this->query_string = 'INSERT INTO Employers (er_id, er_name, er_username, er_password, er_email, er_gender, er_address, er_phone_number, er_avatar_path, er_created_at, er_modified_at, com_id) VALUES (NULL,?,?,?,?,?,?,?,?,CURRENT_DATE(),NULL,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('ssssssssi', $name, $username, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id);
        $this->stmt->execute();
        if ($this->stmt->affected_rows == 1) {
            $this->closeConnection();
            return true;
        }
        return false;
        $this->closeConnection();
    }

    public function insertCompany($name, $address, $phone_number, $founding_date) {
        $this->query_string = 'INSERT INTO Companies (com_id, com_name, com_address, com_phone_number, com_founding_date) VALUES (NULL,?,?,?,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('ssss', $name, $address, $phone_number, $founding_date);
        $this->stmt->execute();
        if ($this->stmt->affected_rows == 1) {
            $this->closeConnection();
            return true;
        }
        return false;
        $this->closeConnection();
    }

    public function insertCategory($name)
    {
        $this->query_string = 'INSERT INTO Categories (cat_id, cat_name) VALUES (NULL,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('s', $name);
        $this->stmt->execute();
        if ($this->stmt->affected_rows == 1) {
            $this->closeConnection();
            return true;
        }
        return false;
        $this->closeConnection();
    }

    public function insertJob($title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id) {
        $this->query_string = 'INSERT INTO Jobs (job_id, job_title, job_type, job_salary, job_description, job_created_date, job_expiry_date, job_requirement, cat_id, com_id) VALUES (NULL,?,?,?,?,CURRENT_DATE(),?,?,?,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('ssssssii', $title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id);
        $this->stmt->execute();
        if ($this->stmt->affected_rows == 1) {
            $this->closeConnection();
            // echo 'true';
            return true;
        }
        // echo 'false';
        // echo $stmt->error;
        return false;
        $this->closeConnection();
    }

    public function insertApplicant($ee_id, $job_id, $er_id) {
        $this->query_string = 'INSERT INTO Applicants (a_id, ee_id, job_id, er_id) VALUES (NULL,?,?,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('iii', $ee_id, $job_id, $er_id);
        $this->stmt->execute();
        if ($this->stmt->affected_rows == 1) {
            $this->closeConnection();
            return true;
        }
        return false;
        $this->closeConnection();
    }

    public function insertResponse($message, $a_id) {
        $this->query_string = 'INSERT INTO Responses (res_id, res_message, a_id) VALUES (NULL,?,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('si', $message, $a_id);
        $this->stmt->execute();
        if ($this->stmt->affected_rows == 1) {
            $this->closeConnection();
            return true;
        }
        return false;
        $this->closeConnection();
    }
}

// admin: admin:admin123
// employee1: nva:abcd1234
// employer1: ntb:abcd1234
?>