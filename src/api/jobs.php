<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/components/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/components/db.php';

header("Content-Type: application/json; charset=utf-8");

$auth = new Auth();
$auth->getTokenFromClient();

function checkAuth() {
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

switch ($_GET['field']) {
    case 'new':
        $selection = new Selection();
        echo json_encode($selection->getNewJob());
        break;
    
    case 'all':
        $selection = new Selection();
        echo json_encode($selection->getAllJobs());
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
