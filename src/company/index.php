<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/components/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/components/db.php';

$auth = new Auth();
$auth->getTokenFromClient();

// if (!$auth->isLoggedIn()) {
//   echo 'Bạn chưa đăng nhập';
//   die();
// }

$role = $auth->getUserRole();

$com_id = $_GET['com_id'];
$selection = new Selection();
$company = $selection->getSpecificCompany($com_id);
$jobs = $selection->getJobsOfEmployer($com_id);

?>

<?php include_once '../include/header.html'; ?>

<body>
  <?php 
    include_once '../include/navbar.php';
    include_once '../include/modals.html';
  ?>

  <div class="container-fluid mt85">
    <div class="row">
      <div class="col-lg-8 pb-5">
        <div class="row list-job">
          <?php
          foreach ($jobs as $key => $value) {
            echo '
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="logo-box">
                  <img src="https://salt.topdev.vn/JlorGxjbwWuLgupzcV2BewxBjpQlYLnCYf9my4-qpv4/fit/120/0/ce/1/aHR0cHM6Ly9hc3NldHMudG9wZGV2LnZuL2ZpbGVzL2xvZ29zL2I4ZGIzYTBhMjE4NzdhOGQ4Y2ZhODEwM2EyNmFhM2FlLmpwZw/b8db3a0a21877a8d8cfa8103a26aa3ae.jpg">
                </div>
                <div class="job-content">
                  <a target="_blank" href="/job/?job_id='.$value->id.'">
                    <strong><h4>'.$value->title.'</h4></strong>
                  </a>
                  <a href="?com_id='.$com_id.'"><em>'.$value->com_name.'</em></a>
                </div>
              </div>
            </div>
          </div>
            ';
          }
          ?>
        </div>
      </div>
      <div class="col-lg-4 pb-5">
        <div class="card" style="padding:26px;">
            <h3><p><b id="com_name"><?php echo $company->name; ?></b></p></h3>
            <hr>
            <p><b>Địa chỉ</b></p>
            <p id="com_address"><?php echo $company->address; ?></p>
            <p><b>Điện thoại</b></p>
            <p id="com_contact_phone"><?php echo $company->contact_phone; ?></p>
            <p><b>Email</b></p>
            <p id="com_contact_email"><?php echo $company->email; ?></p>
            <p><b>Quy mô</b></p>
            <p id="com_scale"><?php echo $company->scale; ?></p>
					</div>	
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal_response">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <h3>Phản hồi</h3>
          <h2 id="modal_response_body"><?php echo $response; ?></h2>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal_view_applicants">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <h3>Danh sách ứng tuyển</h3>
          
        </div>
      </div>
    </div>
  </div>
  
  <?php include_once '../include/footer.html' ?>

  <link rel="stylesheet" href="style_job.css">
  <script src="../assets/mdb/js/jquery.min.js"></script>
  <script src="job.js"></script>
  <script src="../assets/js/index.js"></script>
  <script src="../assets/mdb/js/bootstrap.min.js"></script>
</body>
</html>
