<?php
require "../../vendor/autoload.php";
require_once 'db.php';

if (isset($_REQUEST['q']) || isset($_REQUEST['city'])) {
    $q = $_REQUEST['q'];
    $city = $_REQUEST['city'];
    $search = new Search($q, $city);
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($search->performSearch());
}

?>
