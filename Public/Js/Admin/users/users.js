$(document).on("click", "#add_user", function(event){
    event.preventDefault();

    let formData = $("#form_user").serialize();

    $.ajax({
        type: "POST",
        url: "users/add",
        data: formData,
        dataType: "json",
        success: function (response) {
            
        }
    });
});