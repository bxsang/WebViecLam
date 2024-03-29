$(document).ready(function() {
    getEmployeeInfo();
    getEmployeeAppliedJobs();
    getEmployerInfo();
    getJobsOfEmployer();
});

function getEmployeeInfo() {
  $.ajax({
    type: "GET",
    url: window.location.protocol+'//'+window.location.hostname+'/api/user.php?field=get-info',
    success: function (response) {
      handleEmployeeInfo(response);
    }
  });
}

function handleEmployeeInfo(employee) {
  $("#form_employee_name").val(employee.name);
  $("#form_employee_phone").val(employee.phone_number);
  $("#form_employee_email").val(employee.email);
  $("#form_employee_birth_date").val(employee.birth_date);
  $("#form_employee_address").val(employee.address);
  $("#form_employee_academic").val(employee.academic_level);
}

function getEmployeeAppliedJobs() {
  $.ajax({
    type: "GET",
    url: window.location.protocol+'//'+window.location.hostname+'/api/jobs.php?field=applied',
    success: function (response) {
      appendAppliedJobs(response);
    }
  });
}

function appendAppliedJobs(jobs) {
  jobs.forEach((item, index) => {
    let id = item.id;
    let title = item.title;
    let com_name = item.com_name;
    let com_id = item.com_id;

    $("#list-applied-jobs .list-job").append(`
  <div class="card">
    <div class="card-body">
      <div class="logo-box">
        <img src="https://salt.topdev.vn/JlorGxjbwWuLgupzcV2BewxBjpQlYLnCYf9my4-qpv4/fit/120/0/ce/1/aHR0cHM6Ly9hc3NldHMudG9wZGV2LnZuL2ZpbGVzL2xvZ29zL2I4ZGIzYTBhMjE4NzdhOGQ4Y2ZhODEwM2EyNmFhM2FlLmpwZw/b8db3a0a21877a8d8cfa8103a26aa3ae.jpg">
      </div>
      <div class="job-content">
        <a target="_blank" href="/job/?job_id=`+id+`">
          <strong><h4>`+title+`</h4></strong>
        </a>
        <a href="/company/?com_id=`+com_id+`"><em>`+com_name+`</em></a>
      </div>
    </div>
  </div>`);
  });
}

function getEmployerInfo() {
  $.ajax({
    type: "GET",
    url: window.location.protocol+'//'+window.location.hostname+'/api/user.php?field=get-info',
    success: function (response) {
      handleEmployerInfo(response);
    }
  });
}

function handleEmployerInfo(employer) {
  $("#form-employer-acc_email").val(employer.acc_email);
  $("#form-employer-name").val(employer.name);
  $("#form-employer-address").val(employer.address);
  $("#form-employer-com_email").val(employer.com_email);
  $("#form-employer-scale").val(employer.scale);
  $("#form-employer-contact_name").val(employer.contact_name);
  $("#form-employer-contact_phone").val(employer.contact_phone);
}

$("#btn_add_job").on('click', function () {
  $("#add_job").modal("toggle");
});

function getJobsOfEmployer() {
  $.ajax({
    type: "GET",
    url: window.location.protocol+'//'+window.location.hostname+'/api/jobs.php?field=jobs_of_employer&com_id=1',
    success: function (response) {
      appendJobsOfEmployer(response);
    }
  });
}

function appendJobsOfEmployer(jobs) {
  jobs.forEach((item, index) => {
    let id = item.id;
    let title = item.title;
    let com_name = item.com_name;
    let com_id = item.com_id;

    $("#list-jobs-of-employer").append(`
    <div class="row list-job">
      <div class="card">
        <div class="card-body">
          <div class="logo-box">
            <img src="https://salt.topdev.vn/JlorGxjbwWuLgupzcV2BewxBjpQlYLnCYf9my4-qpv4/fit/120/0/ce/1/aHR0cHM6Ly9hc3NldHMudG9wZGV2LnZuL2ZpbGVzL2xvZ29zL2I4ZGIzYTBhMjE4NzdhOGQ4Y2ZhODEwM2EyNmFhM2FlLmpwZw/b8db3a0a21877a8d8cfa8103a26aa3ae.jpg">
          </div>
          <div class="job-content">
             <a target="_blank" href="/job/?job_id=`+id+`">
                <strong><h4>`+title+`</h4></strong>
              </a>
              <a href="/company/?com_id=`+com_id+`"><em>`+com_name+`</em></a>
            </div>
          </div>
        </div>
      </div>`
    );
  });
}
