function appendCompanies() {
  for (let i = 0; i < 12; i++) {
    $(".companies .row").append(`
  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 p5 mb10 view overlay zoom">
    <a class="company" href="#">
      <p class="text-center"><img class="salesLogoImage" src="https://web.archive.org/web/20191015051445/https://network.topdev.vn/uploads/sgf-png-20191009165746.PNG" width="88" height="43" alt=""></p>
      <p class="text-center"><span class="network-slogan">Base Enterprise</span></p>
    </a>
  </div>`);
  }
}

function getNewJobs() {
  $.ajax({
    type: "GET",
    url: window.location.protocol+'//'+window.location.hostname+'/api/jobs.php?field=new',
    success: function (response) {
      appendNewJobs(response);
    }
  });
}

function appendNewJobs(jobs) {
  jobs.forEach((item, index) => {
    let title = item.title;
    let com_name = item.com_name;

    $(".newjob-container .list-job").append(`
    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <div class="logo-box">
            <img src="https://salt.topdev.vn/JlorGxjbwWuLgupzcV2BewxBjpQlYLnCYf9my4-qpv4/fit/120/0/ce/1/aHR0cHM6Ly9hc3NldHMudG9wZGV2LnZuL2ZpbGVzL2xvZ29zL2I4ZGIzYTBhMjE4NzdhOGQ4Y2ZhODEwM2EyNmFhM2FlLmpwZw/b8db3a0a21877a8d8cfa8103a26aa3ae.jpg">
          </div>
          <div class="job-content">
            <a target="_blank" href="#">
              <strong><h4>`+title+`</h4></strong>
            </a>
            <a href="#"><em>`+com_name+`</em></a>
          </div>
        </div>
      </div>
    </div>`
    );
  });
}

$(".form-sigin").submit(function (event) {
  event.preventDefault();

  let form = $(this);
  let url = window.location.protocol+'//'+window.location.hostname+'/api/';

  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function (response) {
      handleLogin(response);
    }
  });
});

function handleLogin(response) {
  if (response.status === 'success') {
    console.log("Login success!!!");
    location.reload();
  } else {
    console.log("Login failed");
    $("#wrong_credentials").css('display', 'block');
  }
}

$(".form-signup_ntv").submit(function (event) {
  event.preventDefault();

  let form = $(this);
  let url = window.location.protocol+'//'+window.location.hostname+'/api/';

  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function (response) {
      handleRegister(response);
    }
  });
});

function handleRegister(response) {
  if (response.status === 'success') {
    console.log("Employee registration success!!!");
    $("#signup_ntv").modal('toggle');
    $("#modal_success").modal('toggle');
    setTimeout(() => {
      $("#modal_success").modal('toggle');
    }, 5000);
  } else {
    console.log("Employee registration failed");
    $("#modal_failed").modal('toggle');
    setTimeout(() => {
      $("#modal_failed").modal('toggle');
    }, 5000);
  }
}

$(".form-signup_ntd").submit(function (event) {
  event.preventDefault();

  let form = $(this);
  let url = window.location.protocol+'//'+window.location.hostname+'/api/';

  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function (response) {
      handleRegister(response);
    }
  });
});

function handleRegister(response) {
  if (response.status === 'success') {
    console.log("Employer registration success!!!");
    $("#signup_ntd").modal('toggle');
    $("#modal_success").modal('toggle');
    setTimeout(() => {
      $("#modal_success").modal('toggle');
    }, 5000);
  } else {
    console.log("Employer registration failed");
    $("#modal_failed").modal('toggle');
    setTimeout(() => {
      $("#modal_failed").modal('toggle');
    }, 5000);
  }
}

$(".form-update-employee").submit(function (event) {
  event.preventDefault();

  let form = $(this);
  let url = window.location.protocol+'//'+window.location.hostname+'/api/update.php';

  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function (response) {
      handleEmployeeChange(response);
    }
  });
});

function handleEmployeeChange(response) {
  if (response.status === 'success') {
    console.log("Update employee success!!!");
    $("#modal_success").modal('toggle');
    setTimeout(() => {
      $("#modal_success").modal('toggle');
    }, 5000);
  } else {
    console.log("Update employee failed");
    $("#modal_failed").modal('toggle');
    setTimeout(() => {
      $("#modal_failed").modal('toggle');
    }, 5000);
  }
}

$(".form-update-employer").submit(function (event) {
  event.preventDefault();

  let form = $(this);
  let url = window.location.protocol+'//'+window.location.hostname+'/api/update.php';

  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function (response) {
      handleEmployerChange(response);
    }
  });
});

function handleEmployerChange(response) {
  if (response.status === 'success') {
    console.log("Update employee success!!!");
    $("#modal_success").modal('toggle');
    setTimeout(() => {
      $("#modal_success").modal('toggle');
    }, 5000);
  } else {
    console.log("Update employee failed");
    $("#modal_failed").modal('toggle');
    setTimeout(() => {
      $("#modal_failed").modal('toggle');
    }, 5000);
  }
}

$(".form-add-job").submit(function (event) {
  event.preventDefault();

  let form = $(this);
  let url = window.location.protocol+'//'+window.location.hostname+'/api/add.php';

  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function (response) {
      handleAddJob(response);
    }
  });
});

function handleAddJob(response) {
  if (response.status === 'success') {
    console.log("Add job success!!!");
    $("#modal_success").modal('toggle');
    setTimeout(() => {
      $("#modal_success").modal('toggle');
    }, 5000);
  } else {
    console.log("Add job failed");
    $("#modal_failed").modal('toggle');
    setTimeout(() => {
      $("#modal_failed").modal('toggle');
    }, 5000);
  }
}

$(document).ready(function() {
  appendCompanies();
  getNewJobs();
});
