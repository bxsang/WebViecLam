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
