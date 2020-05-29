<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/components/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/components/db.php';

$auth = new Auth();
$auth->getTokenFromClient();

$selection = new Selection();

$ee_id = $_GET['ee_id'];
$job_id = $_GET['job_id'];
$applicant = $selection->getSpecificApplicant($ee_id, $job_id);
$applicant_id = $applicant->id;
$user_info = $selection->getBasicEmployeeInfo($applicant->employee_id);

?>

<?php include_once '../include/header.html'; ?>

<body>
  <?php 
    include_once '../include/navbar.php';
    include_once '../include/modals.html';
  ?>

  <div class="container mt85">
    <div class="row">
      <div class="col-lg-8 pb-5">
        <div class="card">
          <h3><p><b id="job_title"><?php echo $user_info->name;; ?></b></p></h3>
          <hr>
          <p><b>Số điện thoại</b></p>
          <p><?php echo $user_info->phone_number; ?></p>
          <p><b>Email</b></p>
          <p><?php echo $user_info->email; ?></p>
          <p><b>Địa chỉ</b></p>
          <p><?php echo $user_info->address; ?></p>
          <p><b>Giới tính</b></p>
          <p><?php echo $user_info->gender; ?></p>
          <p><b>Trình độ học vấn</b></p>
          <p><?php echo $user_info->academic_level; ?></p>
        </div>
      </div>
      <div class="col-lg-4 pb-5">
        <div class="card">
          <h3>Thêm phản hồi</h3>
          <form class="form-add-response" id="form_add_response">
            <input type="hidden" name="field" value="insert_response">
            <input type="hidden" name="a_id" value="<?php echo $applicant_id; ?>">
            <div class="form-group">
              <label for="add_response_message">Nội dung</label>
              <textarea name="message" id="add_response_message" form="form_add_response" class="form-control rounded-0" rows="3"></textarea>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-rounded btn-lg blue-gradient text-uppercase" type="submit">Thêm</button>
            </div>
          </form>
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
