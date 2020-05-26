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

  <div class="container mt85">
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-4 pb-5">
          <div class="card testimonial-card card-user">
            <div class="card-up purple-gradient color-block"></div>
            <div class="avatar mx-auto white">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle"
                alt="avatar">
            </div>
            <div class="card-body">
              <h4 class="card-title">Anna Doe</h4>
            </div>

            <div class="list-group menu-employee" role="tablist">
            <?php
            if ($role == 'employee') {
              echo '
              <a class="list-group-item list-group-item-action active" id="list-employee-profile-list" data-toggle="list" href="#list-employee-profile"
                role="tab" aria-controls="home">Thông tin cá nhân</a>';
            } elseif ($role == 'employer') {
              echo '
              <a class="list-group-item list-group-item-action active" id="list-employer-profile-list" data-toggle="list" href="#list-employer-profile"
                role="tab" aria-controls="home">Thông tin nhà tuyển dụng</a>';
            }
            
            if ($role == 'employee') {
              echo '
              <a class="list-group-item list-group-item-action" id="list-applied-jobs-list" data-toggle="list" href="#list-applied-jobs"
                role="tab" aria-controls="profile">Việc làm đã ứng tuyển</a>
              <a class="list-group-item list-group-item-action" id="list-saved-jobs-list" data-toggle="list" href="#list-saved-jobs"
                role="tab" aria-controls="settings">Việc làm đã lưu</a>';
            }
            ?>
              <a class="list-group-item list-group-item-action" id="list-search-jobs-list" data-toggle="list" href="#list-search-jobs"
                role="tab" aria-controls="messages">Tìm kiếm việc làm</a>

            <?php
              if ($role == 'employer') {
                echo '<a class="list-group-item list-group-item-action" id="list-manage-jobs-list" data-toggle="list" href="#list-manage-jobs"
                role="tab" aria-controls="settings">Quản lý công việc</a>';
              }
            ?>

            </div>
          </div>
        </div>

        <div class="col-lg-8 pb-5">
          <div class="tab-content" id="nav-tabContent">
            <?php
            if ($role == 'employee') {
              echo '
            <div class="tab-pane fade show active" id="list-employee-profile" role="tabpanel" aria-labelledby="list-employee-profile-list">
              <h1>Chỉnh sửa thông tin cá nhân</h1>
              <form class="row form-update-employee">
              <input type="hidden" name="field" value="employee"> 
              <input type="hidden" name="id" value="'.$id.'"> 
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Họ và tên</label>
                    <input id="form_employee_name" class="form-control" type="text" name="name" placeholder="Họ và tên" required=""></input>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Số điện thoại</label>
                    <input id="form_employee_phone" type="text" name="phone_number" class="form-control" placeholder="Số điện thoại" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Email</label>
                    <input id="form_employee_email" type="email" name="email" class="form-control" placeholder="Email" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Ngày sinh</label>
                    <input id="form_employee_birth_date" type="text" name="birth_date" class="form-control" placeholder="Ngày sinh">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Địa chỉ</label>
                    <input id="form_employee_address" type="text" name="address" class="form-control" placeholder="Địa chỉ">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Giới tính</label>
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" id="form_employee_gender_male" name="gender_male">
                      <label class="form-check-label" for="gender_male">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" id="form_employee_gender_female" name="gender_female">
                      <label class="form-check-label" for="gender_female">Nữ</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Trình độ học vấn</label>
                    <input id="form_employee_academic" type="text" name="academic_level" class="form-control" placeholder="Trình độ học vấn">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Mật khẩu</label>
                    <input id="form_employee_password" type="password" name="password" class="form-control" placeholder="Mật khẩu" required="">
                  </div>
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                  <button class="btn btn-rounded btn-lg blue-gradient text-uppercase" type="submit">Cập nhật</button>
                </div>
              </form>
            </div>';
            } elseif ($role == 'employer') {
              echo '
            <div class="tab-pane fade show active" id="list-employer-profile" role="tabpanel" aria-labelledby="list-employer-profile-list">
              <h1>Chỉnh sửa thông tin nhà tuyển dụng</h1>
              <form class="row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Email tài khoản</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Tên công ty</label>
                    <input type="text" name="company_name" class="form-control" placeholder="Tên công ty" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Tỉnh/thành hoạt động</label>
                  <select id="inputCompanyProvice" name="address" class="custom-select mb-3">
                    <option value="hn">Hà Nội</option>
                    <option value="dn">Đà Nẵng</option>
                    <option value="hcm">Hồ Chí Minh</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label>Quy mô nhân sự</label>
                  <select id="inputCompanyScale" name="scale" class="custom-select mb-3">
                    <option value="1">Dưới 20 người</option>
                    <option value="2">20-150 người</option>
                    <option value="3">150-300 người</option>
                    <option value="4">Trên 300 người</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Tên người liên hệ</label>
                    <input type="text" id="inputCompanyRepresentative" name="contact_name" class="form-control" placeholder="Tên người liên hệ" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>SĐT liên hệ</label>
                    <input type="text" id="inputCompanyPhone" name="contact_phone" class="form-control" placeholder="SĐT liên hệ" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Email liên hệ</label>
                    <input type="email" id="inputCompanyEmail" name="contact_email" class="form-control" placeholder="Email liên hệ" required="">
                  </div>
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                  <button class="btn btn-rounded btn-lg blue-gradient text-uppercase" type="submit">Cập nhật</button>
                </div>
              </form>
            </div>';
            }

            if ($role == 'employee') {
              echo '
            <div class="tab-pane fade" id="list-applied-jobs" role="tabpanel" aria-labelledby="list-applied-jobs-list">
              <h1>Việc làm đã ứng tuyển</h1>
              <div class="row list-job">
                
              </div>
            </div>
            <div class="tab-pane fade" id="list-saved-jobs" role="tabpanel" aria-labelledby="list-saved-jobs-list">
              <h1>Việc làm đã lưu</h1>
              <div class="row list-job">
                <div class="card">
                  <div class="card-body">
                    <div class="logo-box">
                      <img src="https://salt.topdev.vn/JlorGxjbwWuLgupzcV2BewxBjpQlYLnCYf9my4-qpv4/fit/120/0/ce/1/aHR0cHM6Ly9hc3NldHMudG9wZGV2LnZuL2ZpbGVzL2xvZ29zL2I4ZGIzYTBhMjE4NzdhOGQ4Y2ZhODEwM2EyNmFhM2FlLmpwZw/b8db3a0a21877a8d8cfa8103a26aa3ae.jpg">
                    </div>
                    <div class="job-content">
                      <a target="_blank" href="#">
                        <strong><h4>Tuyển lập trình viên PHP</h4></strong>
                      </a>
                      <a href="#"><em>Công ty A</em></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
            }
            ?>

            <div class="tab-pane fade" id="list-search-jobs" role="tabpanel" aria-labelledby="list-search-jobs-list">
              <h1>Tìm kiếm việc làm</h1>
                <form class="form-inline" action="search/" id="search_form">
                  <input name="q" type="search" placeholder="Tìm kiếm công việc, vị trí, công ty,..." class="form-control form-control-lg bg-light mb-2 mr-sm-2 col-sm-7" autofocus>
                  <select name="city" class="browser-default custom-select2 form-control-lg bg-light mb-2 mr-sm-2 col-sm-3">
                    <option selected>Địa điểm</option>
                    <option value="hn">Hà Nội</option>
                    <option value="dn">Đà Nẵng</option>
                    <option value="hcm">Tp. HCM</option>
                  </select>
                  <button id="search_submit" type="submit">
                    <a class="btn-floating btn-sm btn-secondary"><i class="fas fa-search"></i></a>
                  </button>
                </form>
            </div>

            <?php
            if ($role == 'employer') {
              echo '
            <div class="tab-pane fade" id="list-manage-jobs" role="tabpanel" aria-labelledby="list-manage-jobs-list">
              <div id="manage_job_title">
                <h1>Quản lý công việc</h1>
                <button class="btn btn-success btn-rounded"><i class="fas fa-plus mr-1"></i> Tạo mới</button>
              </div>
              <div class="row list-job">
                <div class="card">
                  <div class="card-body">
                    <div class="logo-box">
                      <img src="https://salt.topdev.vn/JlorGxjbwWuLgupzcV2BewxBjpQlYLnCYf9my4-qpv4/fit/120/0/ce/1/aHR0cHM6Ly9hc3NldHMudG9wZGV2LnZuL2ZpbGVzL2xvZ29zL2I4ZGIzYTBhMjE4NzdhOGQ4Y2ZhODEwM2EyNmFhM2FlLmpwZw/b8db3a0a21877a8d8cfa8103a26aa3ae.jpg">
                    </div>
                    <div class="job-content">
                      <a target="_blank" href="#">
                        <strong><h4>Tuyển lập trình viên PHP</h4></strong>
                      </a>
                      <a href="#"><em>Công ty A</em></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once '../include/footer.html' ?>

  <script src="../assets/mdb/js/jquery.min.js"></script>
  <script src="../assets/js/index.js"></script>
  <script src="user.js"></script>
  <script src="../assets/mdb/js/bootstrap.min.js"></script>
</body>
</html>
