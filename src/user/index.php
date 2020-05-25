<?php

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
              <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile"
                role="tab" aria-controls="home">Thông tin cá nhân</a>
              <a class="list-group-item list-group-item-action" id="list-applied-jobs-list" data-toggle="list" href="#list-applied-jobs"
                role="tab" aria-controls="profile">Việc làm đã ứng tuyển</a>
              <a class="list-group-item list-group-item-action" id="list-search-jobs-list" data-toggle="list" href="#list-search-jobs"
                role="tab" aria-controls="messages">Tìm kiếm việc làm</a>
              <a class="list-group-item list-group-item-action" id="list-saved-jobs-list" data-toggle="list" href="#list-saved-jobs"
                role="tab" aria-controls="settings">Việc làm đã lưu</a>
            </div>
          </div>
        </div>

        <div class="col-lg-8 pb-5">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
              <h1>Chỉnh sửa thông tin cá nhân</h1>
              <form class="row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Họ và tên</label>
                    <input class="form-control" type="text" name="name" placeholder="Họ và tên" required=""></input>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone_number" class="form-control" placeholder="Số điện thoại" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required="">
                  </div>
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                  <button class="btn btn-rounded btn-lg blue-gradient text-uppercase" type="submit">Cập nhật</button>
                </div>
              </form>
            </div>

            <div class="tab-pane fade" id="list-applied-jobs" role="tabpanel" aria-labelledby="list-applied-jobs-list">
              <h1>Việc làm đã ứng tuyển</h1>
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
            </div>

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
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once '../include/footer.html' ?>

  <script src="../assets/mdb/js/jquery.min.js"></script>
  <script src="../assets/js/index.js"></script>
  <script src="../assets/mdb/js/bootstrap.min.js"></script>
</body>
</html>
