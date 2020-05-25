<?php include_once 'include/header.html'; ?>

<body>
  <?php include_once 'include/navbar.php';
        include_once 'include/modals.html';
  ?>

  <div id="abc">
    <div class="jumbotron">
      <div class="container">
        <h1>Chào mừng đến với TopViec</h1>
        <h4>Tìm kiếm những công việc tuyệt vời</h4>
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
    </div>
  </div>
  
  <div class="content">
    <div class="container companies">
      <h3 class="text-center">Nhà tuyển dụng hàng đầu</h3>
      <div class="row">
        
      </div>
    </div>
    <div class="container newjob-container">
      <h3 class="text-center">Công việc mới đăng</h3>
      <div class="row list-job">
        
      </div>
    </div>
  </div>

  <?php include_once 'include/footer.html' ?>

  <script src="assets/mdb/js/jquery.min.js"></script>
  <script src="assets/js/index.js"></script>
  <script src="assets/mdb/js/bootstrap.min.js"></script>
</body>
</html>
