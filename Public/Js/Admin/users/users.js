// agrega un nuevo usuario

$(document).on("click", "#add_user", function (event) {
  event.preventDefault();

  let formData = $("#form_user").serialize();

  $.ajax({
    type: "POST",
    url: "users/add",
    data: formData,
    dataType: "json",
    success: function (response) {},
  });
});

$(document).on("click", "#btn-updateUsr", function () {
  let fila = $(this).closest("#tb_usr");

  let info_usr = `
         <div class="row">
                   <div class="co-12">
                      <form id="form_user_update">
                        <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">ID Usario:</label>
                               <input name="usr_id" type="text" class="form-control shadow-none border-0" value="${fila
                                 .find("td:eq(0)")
                                 .text()}" readonly>
                           </div>   
                      <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Usario:</label>
                               <input name="usr_name" type="text" class="form-control shadow-none border-0" value="${fila
                                 .find("td:eq(1)")
                                 .text()}" readonly>
                           </div>
                            <div class="mb-3">
                               <label for="exampleFormControlTextarea1" class="form-label">Cambiar Contraseña:</label>
                              <input id="input_pass" name="usr_pass" type="password" class="form-control shadow-none" placeholder="Nueva contraseña">
                               <input class="form-check-input shadow-none" type="checkbox" id="view_password">
                               <label class="form-check-label shadow-none" for="flexCheckIndeterminate">
                                   Ver contraseña
                               </label>
                            </div>
                           <div class="mb-3">
                                <button id="send_update_usr" type="button" class="btn btn-confirm"> <i class="fa-solid fa-arrows-rotate"></i> Actualizar</button>
                          </div>
                      </form>
               </div>
         </div>
    `;
    $("#modal_info_usr").html(info_usr);
});


///view password
$(document).on("click", "#view_password", function (){
    if($("#view_password").is(':checked')){
        $('#input_pass').attr('type','text');
    }else{
 $("#input_pass").attr("type", "password");
    }
});

$(document).on("click","#send_update_usr", function(event){
  event.preventDefault();
  let formData_update = $("#form_user_update").serialize(); 
  
  $.ajax({
    type: "POST",
    url: "users/update",
    data: formData_update,
    dataType: "json",
    success: function (response) {
      
    }
  });
});
 // down user
$(document).on("click", "#btn-downUsr", function () {
  let fila = $(this).closest("#tb_usr");

  let info_usr = `
         <div class="row">
                   <div class="co-12">
                      <form id="form_user_down">
                        <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">ID Usario:</label>
                               <input name="usr_id" type="text" class="form-control shadow-none border-0" value="${fila
                                 .find("td:eq(0)")
                                 .text()}" readonly>
                           </div>   
                      <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Usario:</label>
                               <input name="usr_name" type="text" class="form-control shadow-none border-0" value="${fila
                                 .find("td:eq(1)")
                                 .text()}" readonly>
                           </div>
                           <div class="mb-3">
                                <button id="send_down_usr" type="button" class="btn btn-confirm"> <i class="fa-solid fa-arrows-rotate"></i> Actualizar</button>
                          </div>
                      </form>
               </div>
         </div>
    `;
  $("#inf_usr_down").html(info_usr);
});

$(document).on("click", "#send_down_usr", function (event) {
  event.preventDefault();
  let formData_update = $("#form_user_down").serialize();

  $.ajax({
    type: "POST",
    url: "users/down",
    data: formData_update,
    dataType: "json",
    success: function (response) {},
  });
});

$(document).on("click","#btn-activeUsr", function(){
  let fila = $(this).closest("#tb_usr");

  $("#btn_conf_active").on("click", function () {
    $.ajax({
      type: "POST",
      url: "users/active",
      data: { id_usr: fila.find("td:eq(0)").text() },
      dataType: "json",
      success: function (response) {},
    });
  });



});