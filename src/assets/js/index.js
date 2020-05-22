$(".form-sigin").submit(function (event) {
  event.preventDefault();

  let form = $(this);
  let url = 'http://127.0.0.1/api/';

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
  let url = 'http://127.0.0.1/api/';

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
  } else {
    console.log("Employee registration failed");
  }
}
