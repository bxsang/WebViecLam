<?php

if (isset($_REQUEST['role'])) {
    $role = $_REQUEST['role'];
    header("Content-Type: application/json; charset=utf-8");
}

if (isset($_REQUEST['role']) && ($_REQUEST['role'] == 'employee' || $_REQUEST['role'] == 'employer')) {
    $table = $role;
    require_once 'add.php';
}
else {
    echo json_encode([
        'status' => 'failed'
    ]);
}

?>