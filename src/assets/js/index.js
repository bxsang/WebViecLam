$(".form-sigin").submit(function (event) {
  event.preventDefault();

  let form = $(this);
  let url = 'http://127.0.0.1/api/';

  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function (response) {
      console.log(response);
    }
  });
});
