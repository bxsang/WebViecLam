<?php
require $_SERVER['PWD']."/vendor/autoload.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/components/db.php';

if (isset($_REQUEST['q']) || isset($_REQUEST['city'])) {
  $q = $_REQUEST['q'];
  $city = $_REQUEST['city'];
  $search = new Search($q, $city);
  $jobs = $search->performSearch();
} else {
  echo 'Bạn chưa tìm gì cả';
  die();
}

?>

<?php include_once '../include/header.html'; ?>

<body>
  <?php include_once '../include/navbar.php';
    include_once '../include/modals.html';
  ?>

  <div class="container mt85">
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

    <div class="container search-container">
      <h3 class="text-center">Kết quả tìm kiếm</h3>
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
              <a target="_blank" href="#">
                <strong><h4>'.$value->job_title.'</h4></strong>
              </a>
              <a href="#"><em>'.$value->com_name.'</em></a>
            </div>
          </div>
        </div>
      </div>';
        }
      ?>

    </div>
  </div>

  <?php include_once '../include/footer.html' ?>

  <script src="../assets/mdb/js/jquery.min.js"></script>
  <script src="../assets/js/index.js"></script>
  <script src="../assets/mdb/js/bootstrap.min.js"></script>
</body>
</html>
