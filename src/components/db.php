<?php
require $_SERVER['PWD']."/vendor/autoload.php";
require_once 'objects.php';

class Database {
    protected $db_server;
    protected $db_user;
    protected $db_pass;
    protected $dbname;

    protected $conn;
    protected $stmt;
    protected $status;

    protected $query_string;

    public function __construct() {
        try {
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../../.env');
            $dotenv->load();
        } catch (\Throwable $th) {

        }
        $this->db_server = getenv('DB_SERVER');
        $this->db_user = getenv('DB_USER');
        $this->db_pass = getenv('DB_PASS');
        $this->dbname = getenv('DB_NAME');
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

    public function printStatus() {
        if ($this->status == true) {
            echo json_encode([
                'status' => 'success'
            ]);
        }
        else {
            echo json_encode([
                'status' => 'failed'
            ]);
        }
    }
}

class Selection extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function selectAdmin($login) {
        $this->query_string = 'SELECT ad_id, ad_name, ad_username, ad_password, ad_email, ad_created_at, ad_modified_at FROM Admins WHERE ad_username=? AND ad_password=?';
        $this->query();
        $this->stmt->bind_param('ss', $login->getUsername(), sha1($login->getPassword()));
        $this->stmt->execute();
        $this->stmt->bind_result($id, $name, $username, $password, $email, $created_at, $modified_at);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Admin($id, $name, $username, $password, $email, $created_at, $modified_at);
        }
        return null;
    }

    public function selectEmployee($login) {
        $this->query_string = 'SELECT ee_id, ee_username, ee_password, ee_email, ee_phone_number, ee_created_at, ee_modified_at FROM Employees WHERE ee_username=? AND ee_password=?';
        $this->query();
        $this->stmt->bind_param('ss', $login->getUsername(), sha1($login->getPassword()));
        $this->stmt->execute();
        $this->stmt->bind_result($id, $username, $password, $phone_number, $email, $created_at, $modified_at);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Employee($id, $username, $password, $phone_number, $email, $created_at, $modified_at);
        }
        return null;
    }

    public function selectEmployer($login) {
        $this->query_string = 'SELECT er_id, er_username, er_password, er_email, er_created_at, er_modified_at, com_id FROM Employers WHERE er_username=? AND er_password=?';
        $this->query();
        $this->stmt->bind_param('ss', $login->getUsername(), sha1($login->getPassword()));
        $this->stmt->execute();
        $this->stmt->bind_result($id, $username, $password, $email, $created_at, $modified_at, $com_id);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Employer($id, $username, $password, $email, $created_at, $modified_at, $com_id);
        }
        return null;
    }
}

class Insertion extends Database {
    private $insert_id;
    public function __construct() {
        parent::__construct();
        $this->insert_id = 0;
    }

    public function getInsertId() {
        return $this->insert_id;
    }

    public function execute() {
        $this->stmt->execute();
        if ($this->stmt->affected_rows == 1) {
            $this->insert_id = $this->conn->insert_id;
            $this->closeConnection();
            $this->status = true;
        }
        else {
            $this->status = false;
        }
    }

    public function insertEmployee($username, $password, $email, $phone_number) {
        $this->query_string = 'INSERT INTO Employees (ee_id, ee_username, ee_password, ee_email, ee_phone_number, ee_created_at, ee_modified_at) VALUES (NULL, ?, SHA1(?), ?, ?, CURRENT_DATE(), NULL)';
        $this->query();
        $this->stmt->bind_param('ssss', $username, $password, $email, $phone_number);
        $this->execute();
    }

    public function insertNameToFiles($id, $name) {
        $this->query_string = 'INSERT INTO Files (ee_birth_date, ee_address, ee_gender, ee_academic_level, ee_name, ee_id) VALUES (NULL, NULL, NULL, NULL, ?, ?)';
        $this->query();
        $this->stmt->bind_param('si', $name, $id);
        $this->execute();
    }

    public function insertCompany($name, $address, $contact_name, $contact_phone, $email, $scale) {
        $this->query_string = 'INSERT INTO Companies (com_id, com_name, com_address, com_contact_name, com_contact_phone, com_email, com_scale) VALUES (NULL, ?, ?, ?, ?, ?, ?)';
        $this->query();
        $this->stmt->bind_param('ssssss', $name, $address, $contact_name, $contact_phone, $email, $scale);
        $this->execute();
    }

    public function insertEmployer($username, $password, $email, $com_id) {
        $this->query_string = 'INSERT INTO Employers (er_id, er_username, er_password, er_email, er_created_at, er_modified_at, com_id) VALUES (NULL, ?, SHA1(?), ?, CURRENT_DATE(), NULL, ?)';
        $this->query();
        $this->stmt->bind_param('sssi', $username, $password, $email, $com_id);
        $this->execute();
    }

    public function insertCategory($name)
    {
        $this->query_string = 'INSERT INTO Categories (cat_name) VALUES (?)';
        $this->query();
        $this->stmt->bind_param('s', $name);
        $this->execute();
    }

    public function insertJob($title, $salary, $description, $requirement, $expiry_at, $location, $people_num, $type, $com_id) {
        $this->query_string = 'INSERT INTO Jobs (job_id, job_title, job_salary, job_description, job_requirement, job_created_at, job_expiry_at, job_location, job_people_num, job_type, com_id) VALUES (NULL, ?, ?, ?, ?, CURRENT_DATE(), ?, ?, ?, ?, ?)';
        $this->query();
        $this->stmt->bind_param('sssssssii', $title, $salary, $description, $requirement, $expiry_at, $location, $people_num, $type, $com_id);
        $this->execute();
    }

    public function insertJobCategories($job_id, $cat_name) {
        $this->query_string = 'INSERT INTO JobCategories (job_id, cat_name) VALUES (?, ?)';
        $this->query();
        $this->stmt->bind_param('is', $job_id, $cat_name);
        $this->execute();
    }

    public function insertApplicant($ee_id, $job_id) {
        $this->query_string = 'INSERT INTO Applicants (a_id, ee_id, job_id) VALUES (NULL,?,?)';
        $this->query();
        $this->stmt->bind_param('ii', $ee_id, $job_id);
        $this->execute();
    }

    public function insertResponse($message, $a_id) {
        $this->query_string = 'INSERT INTO Responses (res_id, res_message, res_time, a_id) VALUES (NULL, ?, CURRENT_DATE(), ?)';
        $this->query();
        $this->stmt->bind_param('si', $message, $a_id);
        $this->execute();
    }
}

?>
