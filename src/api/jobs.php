<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/components/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/components/db.php';

header("Content-Type: application/json; charset=utf-8");

function checkAuth() {
    $auth = new Auth();
    $auth->getTokenFromClient();
    $id = $auth->getUserId();
    
    try {
        $role = $auth->decodeToken()->role;
    } catch (\Throwable $th) {
        echo json_encode([
            'status' => 'failed',
            'message' => 'Bạn chưa đăng nhập hoặc lỗi hệ thống'
        ]);
        die();
    }
    
    if (!($role == 'admin' || $role == 'employer' || $role == 'employee')) {
        http_response_code(403);
        echo json_encode([
            'status' => 'failed',
            'message' => 'Bạn không có quyền thực hiện hành động này'
        ]);
        die();
    }
}

$auth = new Auth();
$auth->getTokenFromClient();

switch ($_REQUEST['field']) {
    case 'new':
        $selection = new Selection();
        echo json_encode($selection->getNewJob());
        break;
    
    case 'all':
        $selection = new Selection();
        echo json_encode($selection->getAllJobs());
        break;

    case 'specific':
        $id = $_GET['id'];
        $selection = new Selection();
        echo json_encode($selection->getSpecificJob($id));
        break;

    case 'applied':
        $selection = new Selection();
        $id = $auth->getUserId();
        echo json_encode($selection->getAppliedJobs($id));
        break;

    case 'jobs_of_employer':
        $id = $_GET['com_id'];
        $selection = new Selection();
        echo json_encode($selection->getJobsOfEmployer($id));
        break;

    case 'add':
        $db = new Insertion();

        $title = $_POST['title'];
        $category = $_POST['category'];
        $salary = $_POST['salary'];
        $description = $_POST['description'];
        $requirement = $_POST['requirement'];
        $expiry_at = $_POST['expiry_at'];
        $location = $_POST['location'];
        $people_num = $_POST['people_num'];
        $type = $_POST['type'];
        $com_id = $auth->decodeToken()->com_id;

        $db->insertJob($title, $salary, $description, $requirement, $expiry_at, $location, $people_num, $type, $com_id);
        $db->insertJobCategories($db->getInsertId(), $category);

        $db->printStatus();

        break;

    case 'apply':
        $db = new Insertion();
        $ee_id = $_POST['ee_id'];
        $job_id = $_POST['job_id'];

        $db->insertApplicant($ee_id, $job_id);

        $db->printStatus();
        break;

    case 'get_applicant':
        $user_id = $auth->getUserId();
        $job_id = $_GET['job_id'];
        $selection = new Selection();
        echo json_encode($selection->getSpecificApplicant($user_id, $job_id));
        break;

    case 'get_response':
        $applicant_id = $_GET['applicant_id'];
        $selection = new Selection();
        echo json_encode($selection->getResponse($applicant_id));
        break;

    case 'insert_response':
        $message = $_POST['message'];
        $a_id = $_POST['a_id'];

        $db = new Insertion();
        $db->insertResponse($message, $a_id);
        $db->printStatus();

        break;

    case 'applied_employees':
        $job_id = $_GET['job_id'];
        $selection = new Selection();
        echo json_encode($selection->getAppliedEmployees($job_id));
        break;
    
    default:
        http_response_code(403);
        echo json_encode([
            'status' => 'failed',
            'message' => 'Sai trường field'
        ]);
        break;
}

?>
