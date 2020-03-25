<?php

class Database {
    protected $db_server;
    protected $db_user;
    protected $db_pass;
    protected $dbname;

    protected $conn;
    protected $stmt;
    protected $status;
    
    public function __construct() {
        try {
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
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
        $this->query($this->query_string);
        $this->stmt->bind_param('ss', $login->getUser(), sha1($login->getPass()));
        $this->stmt->execute();
        $this->stmt->bind_result($id, $name, $username, $password, $email, $created_at, $modified_at);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Admin($id, $name, $username, $password, $email, $created_at, $modified_at);
        }
        return null;
    }

    public function selectEmployee($login) {
        $this->query_string = 'SELECT ee_id, ee_name, ee_username, ee_password, ee_email, ee_gender, ee_address, ee_current_occupation, ee_phone_number, ee_avatar_path, ee_experience, ee_cv_path FROM Employees WHERE ee_username=? AND ee_password=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('ss', $login->getUser(), sha1($login->getPass()));
        $this->stmt->execute();
        $this->stmt->bind_result($id, $name, $username, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Employee($id, $name, $username, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path);
        }
        return null;
    }

    public function selectEmployer($login) {
        $this->query_string = 'SELECT er_id, er_name, er_username, er_password, er_email, er_gender, er_address, er_phone_number, er_avatar_path, com_id FROM Employers WHERE er_username=? AND er_password=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('ss', $login->getUser(), sha1($login->getPass()));
        $this->stmt->execute();
        $this->stmt->bind_result($id, $name, $username, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Employer($id, $name, $username, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id);
        }
        return null;
    }

    public function selectCompany($id) {
        $this->query_string = 'SELECT com_id, com_name, com_address, com_phone_number, com_founding_date FROM Companies WHERE com_id=?';
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
        $this->query_string = 'SELECT cat_id, cat_name FROM Categories WHERE cat_id=?';
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
        $this->query_string = 'SELECT job_id, job_title, job_type, job_salary, job_description, job_created_at, job_expiry_at, job_requirement, com_id FROM Jobs WHERE job_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->stmt->execute();
        $this->stmt->bind_result($id, $title, $type, $salary, $description, $created_at, $expiry_at, $requirement, $com_id);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new Job($id, $title, $type, $salary, $description, $created_at, $expiry_at, $requirement, $com_id);
        }
        return null;
    }

    public function selectJobsWithCategories($id) {
        $this->query_string = 'SELECT jc_id, job_id, cat_id FROM JobsWithCategories WHERE jc_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->stmt->execute();
        $this->stmt->bind_result($id, $job_id, $cat_id);
        if ($this->stmt->fetch()) {
            $this->closeConnection();
            return new JobsWithCategories($id, $job_id, $cat_id);
        }
        return null;
    }

    public function selectApplicant($id) {
        $this->query_string = 'SELECT a_id, ee_id, job_id, er_id FROM Companies WHERE a_id=?';
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
        $this->query_string = 'SELECT res_id, res_message, a_id FROM Companies WHERE res_id=?';
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
}

class Insertion extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function execute() {
        $this->stmt->execute();
        if ($this->stmt->affected_rows == 1) {
            $this->closeConnection();
            $this->status = true;
        }
        else {
            $this->status = false;
        }
    }

    public function insertEmployee($name, $username, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path) {
        $this->query_string = 'INSERT INTO Employees (ee_id, ee_name, ee_username, SHA1(ee_password), ee_email, ee_gender, ee_address, ee_current_occupation, ee_phone_number, ee_avatar_path, ee_experience, ee_cv_path, ee_created_at, ee_modified_at) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,CURRENT_DATE(),NULL)';
        $this->query($this->query_string);
        $this->stmt->bind_param('sssssssssss', $name, $username, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path);
        $this->execute();
    }

    public function insertEmployer($name, $username, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id) {
        $this->query_string = 'INSERT INTO Employers (er_id, er_name, er_username, SHA1(er_password), er_email, er_gender, er_address, er_phone_number, er_avatar_path, er_created_at, er_modified_at, com_id) VALUES (NULL,?,?,?,?,?,?,?,?,CURRENT_DATE(),NULL,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('ssssssssi', $name, $username, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id);
        $this->execute();
    }

    public function insertCompany($name, $address, $phone_number, $founding_date) {
        $this->query_string = 'INSERT INTO Companies (com_id, com_name, com_address, com_phone_number, com_founding_date) VALUES (NULL,?,?,?,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('ssss', $name, $address, $phone_number, $founding_date);
        $this->execute();
    }

    public function insertCategory($name)
    {
        $this->query_string = 'INSERT INTO Categories (cat_id, cat_name) VALUES (NULL,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('s', $name);
        $this->execute();
    }

    public function insertJob($title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id) {
        $this->query_string = 'INSERT INTO Jobs (job_id, job_title, job_type, job_salary, job_description, job_created_date, job_expiry_date, job_requirement, cat_id, com_id) VALUES (NULL,?,?,?,?,CURRENT_DATE(),?,?,?,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('ssssssii', $title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id);
        $this->execute();
    }

    public function insertApplicant($ee_id, $job_id, $er_id) {
        $this->query_string = 'INSERT INTO Applicants (a_id, ee_id, job_id, er_id) VALUES (NULL,?,?,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('iii', $ee_id, $job_id, $er_id);
        $this->execute();
    }

    public function insertResponse($message, $a_id) {
        $this->query_string = 'INSERT INTO Responses (res_id, res_message, a_id) VALUES (NULL,?,?)';
        $this->query($this->query_string);
        $this->stmt->bind_param('si', $message, $a_id);
        $this->execute();
    }
}

class Update extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function execute() {
        $this->stmt->execute();
        if ($this->stmt->affected_rows == 1) {
            $this->closeConnection();
            $this->status = true;
        }
        else {
            $this->status = false;
        }
    }

    public function updateAdmin($id, $name, $password, $email) {
        $this->query_string = 'UPDATE Admins SET ad_name=?, ad_password=SHA1(?), ad_email=?, ad_modified_at=CURRENT_DATE() WHERE ad_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('sssi', $name, $password, $email, $id);
        $this->execute();
    }

    public function updateEmployee($id, $name, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path) {
        $this->query_string = 'UPDATE Employees SET ee_name=?, ee_password=SHA1(?), ee_email=?, ee_gender=?, ee_address=?, ee_current_occupation=?, ee_phone_number=?, ee_avatar_path=?, ee_experience=?, ee_cv_path=?, ee_modified_at=CURRENT_DATE() WHERE ee_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('ssssssssssi', $name, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path, $id);
        $this->execute();
    }

    public function updateEmployer($id, $name, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id) {
        $this->query_string = 'UPDATE Employers SET er_name=?, er_password=SHA1(?), er_email=?, er_gender=?, er_address=?, er_phone_number=?, er_avatar_path=?, com_id=?, er_modified_at=CURRENT_DATE() WHERE er_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('ssssssssi', $name, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id, $id);
        $this->execute();
    }

    public function updateCompany($id, $name, $address, $phone_number, $founding_date) {
        $this->query_string = 'UPDATE Companies SET com_name=?, com_address=?, com_phone_number=?, com_founding_date=? WHERE com_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('ssssi', $name, $address, $phone_number, $founding_date, $id);
        $this->execute();
    }

    public function updateCategory($id, $name) {
        $this->query_string = 'UPDATE Categories SET cat_name=? WHERE cat_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('si', $name, $id);
        $this->execute();
    }

    public function updateJob($id, $title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id) {
        $this->query_string = 'UPDATE Jobs SET job_title=?, job_type=?, job_salary=?, job_description=?, job_expiry_date=?, job_requirement=?, cat_id=?, com_id=? WHERE job_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('ssssssssi', $title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id, $id);
        $this->execute();
    }

    public function updateApplicant($id, $ee_id, $job_id, $er_id) {
        $this->query_string = 'UPDATE Applicants SET ee_id=?, job_id=?, er_id=? WHERE a_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('si', $ee_id, $job_id, $er_id, $id);
        $this->execute();
    }

    public function updateResponse($id, $message, $a_id) {
        $this->query_string = 'UPDATE Responses SET res_message=?, a_id=? WHERE res_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('si', $message, $a_id, $id);
        $this->execute();
    }
}

class Delete extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function execute() {
        $this->stmt->execute();
        if ($this->stmt->affected_rows == 1) {
            $this->closeConnection();
            $this->status = true;
        }
        else {
            $this->status = false;
        }
    }

    public function deleteEmployee($id) {
        $this->query_string = 'DELETE FROM Employees WHERE ee_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->execute();
    }

    public function deleteEmployer($id) {
        $this->query_string = 'DELETE FROM Employers WHERE er_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->execute();
    }

    public function deleteCompany($id) {
        $this->query_string = 'DELETE FROM Companies WHERE com_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->execute();
    }

    public function deleteCategory($id) {
        $this->query_string = 'DELETE FROM Categories WHERE cat_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->execute();
    }

    public function deleteJob($id) {
        $this->query_string = 'DELETE FROM Employees WHERE job_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->execute();
    }

    public function deleteApplicant($id) {
        $this->query_string = 'DELETE FROM Applicants WHERE a_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->execute();
    }

    public function deleteResponse($id) {
        $this->query_string = 'DELETE FROM Responses WHERE res_id=?';
        $this->query($this->query_string);
        $this->stmt->bind_param('i', $id);
        $this->execute();
    }
}

class Search extends Database {

}

// admin: admin:admin123
// employee1: nva:abcd1234
// employer1: ntb:abcd1234
?>