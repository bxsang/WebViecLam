<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/components/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/components/db.php';

$auth = new Auth();
$auth->getTokenFromClient();

if (!$auth->isLoggedIn()) {
  echo 'Bạn chưa đăng nhập';
  die();
}

// $role = $auth->getUserRole();
// $id = $auth->getUserId();

$job_id = $_GET['job_id'];
$selection = new Selection();
$job = $selection->getSpecificJob($job_id);
$company = $selection->getSpecificCompany($job->com_id);

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
        <div class="card">
        <div class="row1">
							<div div class="job">
                <h3><p><b id="job_title"><?php echo $job->title; ?></b></p></h3>
                <hr>
                <p><b>Mô tả</b></p>
                <p id="job_description"><?php echo $job->description; ?></p>
                <p><b>Yêu cầu</b></p>
                <p id="job_requirement"><?php echo $job->requirement; ?></p>
								<hr>	
							</div>
							
							<div class="detail_job" >
								<button type="button" class="btn btn-outline-secondary" id="button">Apply Now!</button>
                <p><b>Ngày đăng</b></p>
                <p id="job_created_at"><?php echo $job->created_at; ?></p>
                <p><b>Ngày hết hạn</b></p>
                <p id="job_expiry_at"><?php echo $job->expiry_at; ?></p>
                <p><b>Hình thức</b></p>
                <p id="job_type"><?php echo $job->type; ?></p>
                <p><b>Mức lương</b></p>
                <p id="job_salary"><?php echo $job->salary; ?></p>
                <p><b>Địa điểm làm việc</b></p>
                <p id="job_location"><?php echo $job->location; ?></p>
                <p><b>Số lượng cần tuyển</b></p>
                <p id="job_people_num"><?php echo $job->people_num; ?></p>
							</div>
						</div>
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
  
  <?php include_once '../include/footer.html' ?>

  <link rel="stylesheet" href="style_job.css">
  <script src="user.js"></script>
  <script src="../assets/mdb/js/jquery.min.js"></script>
  <script src="../assets/js/index.js"></script>
  <script src="../assets/mdb/js/bootstrap.min.js"></script>
</body>
</html>
