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
    
    $(".job-items").append(
  `<li>
    <span class="job-title">
      <a target="_blank" href="https://web.archive.org/web/20200331033319/https://topdev.vn/detail-jobs/business-analyst-3-5-year-experiece-as-white-vietnam-14586" title="Business Analyst (3-5 year experiece)">
        <strong>`+title+`</strong>
      </a>
      <a href="#"><em>`+com_name+`</em></a>
    </span>
  </li>`);
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
    $("#signup_success").modal('toggle');
    setTimeout(() => {
      $("#signup_success").modal('toggle');
    }, 5000);
  } else {
    console.log("Employee registration failed");
    $("#signup_failed").modal('toggle');
    setTimeout(() => {
      $("#signup_failed").modal('toggle');
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
    $("#signup_success").modal('toggle');
    setTimeout(() => {
      $("#signup_success").modal('toggle');
    }, 5000);
  } else {
    console.log("Employer registration failed");
    $("#signup_failed").modal('toggle');
    setTimeout(() => {
      $("#signup_failed").modal('toggle');
    }, 5000);
  }
}

$(document).ready(function(){
  getNewJobs();
});
