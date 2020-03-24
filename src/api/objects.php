<?
class Admin {
    private $id;
    private $name;
    private $username;
    private $password;
    private $email;
    private $created_at;
    private $modified_at;

    public function __construct($id, $name, $username, $password, $email, $created_at, $modified_at) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->created_at = $created_at;
        $this->modified_at = $modified_at;
    }

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}

class Employee {
    private $id;
    private $name;
    private $username;
    private $password;
    private $email;
    private $gender;
    private $address;
    private $current_occupation;
    private $phone_number;
    private $avatar_path;
    private $experience;
    private $cv_path;

    public function __construct($id, $name, $username, $password, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->gender = $gender;
        $this->address = $address;
        $this->current_occupation = $current_occupation;
        $this->phone_number = $phone_number;
        $this->avatar_path = $avatar_path;
        $this->experience = $experience;
        $this->cv_path = $cv_path;
    }

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}

class Employer {
    private $id;
    private $name;
    private $username;
    private $password;
    private $email;
    private $gender;
    private $address;
    private $phone_number;
    private $avatar_path;
    private $com_id;

    public function __construct($id, $name, $username, $password, $email, $gender, $address, $phone_number, $avatar_path, $com_id) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->gender = $gender;
        $this->address = $address;
        $this->phone_number = $phone_number;
        $this->avatar_path = $avatar_path;
        $this->com_id = $com_id;
    }

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}

class Company {
    private $id;
    private $name;
    private $address;
    private $phone_number;
    private $founding_date;

    public function __construct($id, $name, $address, $phone_number, $founding_date) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone_number = $phone_number;
        $this->founding_date = $founding_date;
    }
}

class Category {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
}

class Job {
    private $id;
    private $title;
    private $type;
    private $salary;
    private $description;
    private $created_date;
    private $expiry_date;
    private $requirement;
    private $cat_id;
    private $com_id;

    public function __construct($id, $title, $type, $salary, $description, $expiry_date, $requirement, $cat_id, $com_id) {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->salary = $salary;
        $this->description = $description;
        $this->expiry_date = $expiry_date;
        $this->requirement = $requirement;
        $this->cat_id = $cat_id;
        $this->com_id = $com_id;
    }
}

class Applicant {
    private $id;
    private $ee_id;
    private $job_id;
    private $er_id;

    public function __construct($id, $ee_id, $job_id, $er_id) {
        $this->id = $id;
        $this->ee_id = $ee_id;
        $this->job_id = $job_id;
        $this->er_id = $er_id;
    }
}

class Response {
    private $id;
    private $message;
    private $a_id;

    public function __construct($id, $message, $a_id) {
        $this->id = $id;
        $this->message = $message;
        $this->a_id = $a_id;
    }
}

?>