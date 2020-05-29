$("#btn_apply").on("click", function () {
  apply();
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
