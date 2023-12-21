$(document).on("click", "#img-up", function (event) {
  event.preventDefault();
  let formData = new FormData($('#form_banner_one')[0]);
  

  $.ajax({
    type: "POST",
    url: "banners/upload",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      console.log(response);
    },
  });


  console.log(img);
});