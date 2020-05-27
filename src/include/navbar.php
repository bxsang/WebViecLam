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
          $auth->getTokenFromClient();
          if ($auth->isLoggedIn()) {
            echo '
          <li>
            <div class="dropdown dropleft" id="dropdown_user">
              <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="50" height="50" class="rounded-circle" data-toggle="dropdown">
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/user/">Tài khoản</a>';
            if ($auth->getUserRole() == 'employee') {
              echo '
                <a class="dropdown-item" href="#">Việc đã ứng tuyển</a>';
            }
            elseif ($auth->getUserRole() == 'employer') {
              echo '
                <a class="dropdown-item" href="#">Quản lý công việc</a>';
            }
            echo '
                <a class="dropdown-item" href="/logout.php">Đăng xuất</a>
              </div>
            </div>
          </li>';
          } else {
            echo '        <li>
            <div class="dropdown" id="dropdown_reg">
              <a id="btn_reg" class="btn btn-primary btn-rounded" role="button" data-toggle="dropdown">Đăng ký</a>
              <div class="dropdown-menu">
                <a class="dropdown-item btn btn-success" href="#" data-toggle="modal" data-target="#signup_ntd">Nhà tuyển dụng</a>
                <a class="dropdown-item btn btn-danger" href="#" data-toggle="modal" data-target="#signup_ntv">Người tìm việc</a>
              </div>
            </div>
          </li>
          <li>
              <a id="btn_login" class="btn btn-secondary btn-rounded" role="button" data-toggle="modal" data-target="#signin">Đăng nhập</a>
          </li>';
          }
        ?>
      </ul>
    </div>
  </div>
</nav>
