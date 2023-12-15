$(document).on("click", "#btn_login", function(){
   let formData = $("#form_login").serialize();
   
   $.ajax({
    type: "POST",
    url: "admin/auth",
    data: formData,
    dataType: "json",
    success: function (response) {
        switch (response) {
          case "empty_search":
            $("#alert").css("display", "block");
            setTimeout(function () {
              $("#alert").css("display", "none");
            }, 800);
            break;
          case "Logged_Successfully":
            window.location.href = "admin/home";
            break;
        }
    }
   });

});