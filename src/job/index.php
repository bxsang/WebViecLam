<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/components/auth.php';

$auth = new Auth();
$auth->getTokenFromClient();

if (!$auth->isLoggedIn()) {
  echo 'Bạn chưa đăng nhập';
  die();
}

$role = $auth->getUserRole();
$id = $auth->getUserId();

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
							<!-- tab trái ở trong tab trái -->
							<div div class="job">
                <h3><p><b id="job_title">Tiêu đề công việc</b></p></h3>
                <hr>
                <p><b>Mô tả</b></p>
                <p id="job_description">blabla</p>
                <p><b>Yêu cầu</b></p>
                <p id="job_requirement">blabla</p>
								<hr>	
							</div>
							
							<!-- end tab trái ở trong tab trái -->
							<!-- tab phải ở trong tab trái -->
							<div class="detail_job" >
								<button type="button" class="btn btn-outline-secondary" id="button">Apply Now!</button>
                <p><b>Ngày đăng</b></p>
                <p id="job_created_at">blabla</p>
                <p><b>Ngày hết hạn</b></p>
                <p id="job_expiry_at">blabla</p>
                <p><b>Hình thức</b></p>
                <p id="job_type">blabla</p>
                <p><b>Mức lương</b></p>
                <p id="job_salary">blabla</p>
                <p><b>Địa điểm làm việc</b></p>
                <p id="job_location">blabla</p>
                <p><b>Số lượng cần tuyển</b></p>
                <p id="job_people_num">blabla</p>
							</div>
							<!-- end tab phải ở trong tab trái -->
							 <!-- clear both -->
						</div>
        </div>
      </div>
      <div class="col-lg-4 pb-5">
        <div class="card" style="padding:26px;">
            <h3><p><b id="com_name">Tên công ty</b></p></h3>
            <hr>
            <p><b>Địa chỉ</b></p>
            <p id="com_address">blabla</p>
            <p><b>Điện thoại</b></p>
            <p id="com_contact_phone">blabla</p>
            <p><b>Email</b></p>
            <p id="com_contact_email">blabla</p>
            <p><b>Quy mô</b></p>
            <p id="com_scale">blabla</p>
					</div>	
      </div>
    </div>
  </div>
  
  <?php include_once '../include/footer.html' ?>

  <link rel="stylesheet" href="style_job.css">
  <script src="../assets/mdb/js/jquery.min.js"></script>
  <script src="../assets/js/index.js"></script>
  <script src="../assets/mdb/js/bootstrap.min.js"></script>
</body>
</html>
