<?
class Admin {
    private $id;
    private $name;
    private $email;

    public function __construct($id, $name, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
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
    private $email;
    private $gender;
    private $address;
    private $current_occupation;
    private $phone_number;
    private $avatar_path;
    private $experience;
    private $cv_path;

    public function __construct($id, $name, $email, $gender, $address, $current_occupation, $phone_number, $avatar_path, $experience, $cv_path) {
        $this->id = $id;
        $this->name = $name;
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
    private $email;
    private $gender;
    private $address;
    private $phone_number;
    private $avatar_path;
    private $com_id;

    public function __construct($id, $name, $email, $gender, $address, $phone_number, $avatar_path, $com_id) {
        $this->id = $id;
        $this->name = $name;
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

?>