$(document).ready(function() {
    getEmployeeInfo();
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
  