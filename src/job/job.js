$(document).ready(function() {
  getAppliedEmployees();
});

$("#btn_apply").on("click", function () {
  apply();
});

$("#btn_view_response").on("click", function () {
  $("#modal_response").modal('toggle');
});

$("#btn_applicant_list").on("click", function () {
  $("#modal_view_applicants").modal('toggle');
});

function apply() {
  let url = window.location.protocol+'//'+window.location.hostname+'/api/jobs.php';
  let ee_id = $("#ee_id").text();
  let job_id = $("#job_id").text();

  $.ajax({
    type: "POST",
    url: url,
    data: "field=apply&ee_id="+ee_id+"&job_id="+job_id,
    success: function (response) {
      handleApply(response);
    }
  });
}

function handleApply(response) {
  if (response.status === 'success') {
    console.log("Apply success!!!");
    $("#modal_success").modal('toggle');
    setTimeout(() => {
      $("#modal_success").modal('toggle');
    }, 5000);
    location.reload(); 
  } else {
    console.log("Apply failed");
    $("#modal_failed").modal('toggle');
    setTimeout(() => {
      $("#modal_failed").modal('toggle');
    }, 5000);
  }
}

$(".form-add-response").submit(function (event) {
  event.preventDefault();
  let form = $(this);
  let url =  window.location.protocol+'//'+window.location.hostname+'/api/jobs.php';

  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function (response) {
      console.log(response);
    }
  });
});

function getAppliedEmployees() {
  let job_id = $("#job_id").text();
  $.ajax({
    type: "GET",
    url: window.location.protocol+'//'+window.location.hostname+'/api/jobs.php?field=applied_employees&job_id='+job_id,
    success: function (response) {
      handleAppliedEmployees(response);
    }
  });
}

function handleAppliedEmployees(response) {
  let job_id = $("#job_id").text();

  response.forEach((item, index) => {
    let ee_id = item.id;
    let name = item.name;

    $("#modal_view_applicants .modal-body").append(`<a href="applied.php?ee_id=`+ee_id+`&job_id=`+job_id+`">`+name+`</a>`);
  });
}
