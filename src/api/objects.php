<?
class Admin {
    public $id;
    public $name;
    public $username;
    public $password;
    public $email;
    public $created_at;
    public $modified_at;

    public function __construct($id, $name, $username, $password, $email, $created_at, $modified_at) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->created_at = $created_at;
        $this->modified_at = $modified_at;
    }
}

class Employee {
    public $id;
    public $name;
    public $username;
    public $password;
    public $email;
    public $gender;
    public $address;
    public $current_occupation;
    public $phone_number;
    public $avatar_path;
    public $experience;
    public $cv_path;

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
}

class Employer {
    public $id;
    public $name;
    public $username;
    public $password;
    public $email;
    public $gender;
    public $address;
    public $phone_number;
    public $avatar_path;
    public $com_id;

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
}

class Company {
    public $id;
    public $name;
    public $address;
    public $phone_number;
    public $founding_date;

    public function __construct($id, $name, $address, $phone_number, $founding_date) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone_number = $phone_number;
        $this->founding_date = $founding_date;
    }
}

class Category {
    public $id;
    public $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
}

class Job {
    public $id;
    public $title;
    public $type;
    public $salary;
    public $description;
    public $created_at;
    public $expiry_at;
    public $requirement;
    public $job_work_address;
    public $com_id;

    public function __construct($id, $title, $type, $salary, $description, $created_at, $expiry_at, $requirement, $job_work_address, $com_id) {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->salary = $salary;
        $this->description = $description;
        $this->created_at = $created_at;
        $this->expiry_at = $expiry_date;
        $this->requirement = $requirement;
        $this->com_id = $com_id;
    }
}

class JobsWithCategories {
    public $id;
    public $job_id;
    public $cat_id;

    public function __construct($id, $job_id, $cat_id) {
        $this->id = $id;
        $this->job_id = $job_id;
        $this->cat_id = $cat_id;
    }
}

class Applicant {
    public $id;
    public $ee_id;
    public $job_id;
    public $er_id;

    public function __construct($id, $ee_id, $job_id, $er_id) {
        $this->id = $id;
        $this->ee_id = $ee_id;
        $this->job_id = $job_id;
        $this->er_id = $er_id;
    }
}

class Response {
    public $id;
    public $message;
    public $a_id;

    public function __construct($id, $message, $a_id) {
        $this->id = $id;
        $this->message = $message;
        $this->a_id = $a_id;
    }
}

class SearchResult {
    public $job_title;
    public $job_description;
    public $job_work_address;
    public $cat_name;

    public function __construct($job_title, $job_description, $job_work_address, $cat_name) {
        $this->job_title = $job_title;
        $this->job_description = $job_description;
        $this->job_work_address = $job_work_address;
        $this->cat_name = $cat_name;
    }
}

?>