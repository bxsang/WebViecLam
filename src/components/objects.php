<?php
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
    public $username;
    public $password;
    public $phone_number;
    public $email;
    public $created_at;
    public $modified_at;

    public function __construct($id, $username, $password, $email, $phone_number, $created_at, $modified_at) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->created_at = $created_at;
        $this->modified_at = $modified_at;
    }
}

class File {
    public $employee_id;
    public $name;
    public $birth_date;
    public $address;
    public $gender;
    public $academic_level;

    public function __construct($employee_id, $name, $birth_date, $address, $gender, $academic_level) {
        $this->employee_id = $employee_id;
        $this->name = $name;
        $this->birth_date = $birth_date;
        $this->address = $address;
        $this->gender = $gender;
        $this->academic_level = $academic_level;
    }
}

class Employer {
    public $id;
    public $username;
    public $password;
    public $email;
    public $created_at;
    public $modified_at;
    public $com_id;

    public function __construct($id, $username, $password, $email, $created_at, $modified_at, $com_id) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->created_at = $created_at;
        $this->modified_at = $modified_at;
        $this->com_id = $com_id;
    }
}

class Company {
    public $id;
    public $name;
    public $address;
    public $email;
    public $scale;
    public $contact_name;
    public $contact_phone;

    public function __construct($id, $name, $address, $email, $scale, $contact_name, $contact_phone) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
        $this->scale = $scale;
        $this->contact_name = $contact_name;
        $this->contact_phone = $contact_phone;
    }
}

class Category {
    public $category_name;

    public function __construct($category_name) {
        $this->category_name = $category_name;
    }
}

class Job {
    public $id;
    public $title;
    public $salary;
    public $people_num;
    public $type;
    public $description;
    public $requirement;
    public $location;
    public $created_at;
    public $expiry_at;
    public $com_id;

    public function __construct($id, $title, $salary, $people_num, $type, $description, $requirement, $location, $created_at, $expiry_at, $com_id) {
        $this->id = $id;
        $this->title = $title;
        $this->salary = $salary;
        $this->people_num = $people_num;
        $this->type = $type;
        $this->description = $description;
        $this->requirement = $requirement;
        $this->location = $location;
        $this->created_at = $created_at;
        $this->expiry_at = $expiry_at;
        $this->com_id = $com_id;
    }
}

class JobCategory {
    public $job_id;
    public $category_name;
    
    public function __construct($job_id, $category_name) {
        $this->job_id = $job_id;
        $this->category_name = $category_name;
    }
}

class Applicant {
    public $id;
    public $job_id;
    public $employee_id;

    public function __construct($id, $job_id, $employee_id, $employer_id) {
        $this->id = $id;
        $this->job_id = $job_id;
        $this->employee_id = $this->employee_id;
    }
}

class Response {
    public $id;
    public $message;
    public $response_time;
    public $applicant_id;

    public function __construct($id, $message, $response_time, $applicant_id) {
        $this->id = $id;
        $this->message = $message;
        $this->response_time = $response_time;
        $this->applicant_id = $applicant_id;
    }
}

class NewJob {
    public $id;
    public $title;
    public $com_name;

    public function __construct($id, $title, $com_name) {
        $this->id = $id;
        $this->title = $title;
        $this->com_name = $com_name;
    }
}

class SearchResult {
    public $job_title;
    public $job_description;
    public $job_location;
    public $cat_name;
    public $com_name;

    public function __construct($job_title, $job_description, $job_location, $cat_name, $com_name) {
        $this->job_title = $job_title;
        $this->job_description = $job_description;
        $this->job_location = $job_location;
        $this->cat_name = $cat_name;
        $this->com_name = $com_name;
    }
}

?>
