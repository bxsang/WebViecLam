<?php include_once 'include/header.html'; ?>

<body>
  <? include_once 'include/navbar.html'; ?>

  <div id="abc">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1>Chào mừng đến với ViecLam</h1>
        <h3>Tìm kiếm những công việc tuyệt vời</h3>
        <form class="form-inline d-lg-flex justify-content-lg-center" action="" id="search_form">
          <input name="q" type="search" placeholder="Tìm kiếm công việc, vị trí, công ty,..." aria-describedby="button-addon1" class="form-control form-control-lg border-0 bg-light mr-sm-2 mb-2 col-sm-7" autofocus>
          <select name="dia_diem" class="custom-select2 form-control-lg border-0 bg-light mr-sm-2 mb-2 col-sm-3">
            <option selected>Địa điểm</option>
            <option value="hn">Hà Nội</option>
            <option value="dn">Đà Nẵng</option>
            <option value="hcm">Tp. HCM</option>
          </select>
          <div class="form-group col-sm-1 mb-2 text-center no-padding">
            <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <? include_once 'include/footer.html' ?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
