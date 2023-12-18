$(document).on("click", "#img-up", function () {
  let formData = new FormData();
  let img = $("#customFile")[0].files[0];

  formData.append('img-file',img);

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