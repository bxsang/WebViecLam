<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TopViec</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarResponsive"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="nav navbar-nav mr-auto">
        <li class="nav-item" role="presentation"><a class="nav-link" href="#">Trang chủ</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" href="#">Dịch vụ</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" href="#">About</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" href="#">Liên hệ</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          require_once $_SERVER['DOCUMENT_ROOT'].'/components/auth.php';

          $auth = new Auth();
          if ($auth->isLoggedIn()) {
            echo '        <li>
            <a class="navbar-brand" href="#">
              <img src="https://www.w3schools.com/bootstrap4/bird.jpg" id="img" class="rounded-circle" alt="Logo" style="width:31px; height:31px">
            </a>
          </li>';
          } else {
            echo '        <li>
            <div class="dropdown">
              <a id="btn_reg" class="btn btn-primary action-button" role="button" data-toggle="dropdown">Đăng ký</a>
              <div class="dropdown-menu">
                <a class="dropdown-item btn btn_auth btn_ntd uppercase mb10" href="#" data-toggle="modal" data-target="#signup_ntd">Nhà tuyển dụng</a>
                <a class="dropdown-item btn btn_auth btn_ntv uppercase" href="#" data-toggle="modal" data-target="#signup_ntv">Người tìm việc</a>
              </div>
            </div>
          </li>
          <li>
            <div class="dropdown">
              <a id="btn_login" class="btn btn-light action-button" role="button" data-toggle="modal" data-target="#signin">Đăng nhập</a>
            </div>
          </li>';
          }
        ?>
      </ul>
    </div>
  </div>
</nav>
