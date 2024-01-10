toastr.options = {
  closeButton: false,
  debug: false,
  newestOnTop: false,
  progressBar: false,
  positionClass: "toast-top-center",
  preventDuplicates: false,
  onclick: null,
  showDuration: "300",
  hideDuration: "1000",
  timeOut: "2000",
  extendedTimeOut: "1000",
  showEasing: "swing",
  hideEasing: "linear",
  showMethod: "fadeIn",
  hideMethod: "fadeOut",
};

/** function add new depto */
$(document).on("click", "#add_depto", function (e) {
  e.preventDefault();

  let formData = $("#form_depto").serialize();

  $.ajax({
    type: "POST",
    url: "departamentos/add",
    data: formData,
    dataType: "json",
    success: function (response) {
      console.log(response);
      switch (response) {
        case "empty":
          toastr["warning"]("Campos Vacíos", "Error");
          break;
        case "duplicate":
          toastr["info"]("Ya se encuentra registrado", "Información");
          break;
        case "success":
          toastr["success"]("Se guardo correctamente", "Realizado");
          setTimeout(function () {
            location.reload();
          }, 500);

          break;
      }
    },
  });
});

/** function active depto */
$(document).on("click", "#btnEnableDepto", function () {
  let table = $(this).closest("#tableDeptos");

  let body_modal = `
    <form id="enable_depto">
        <div class="row p-3">
            <div class="col-4">
                <input name="id_depto" class="form-control shadow-none" type="text" value="${table
                  .find("td:eq(0)")
                  .text()}" readonly>
            </div>
            <div class="col-8">
                <input name="depto" class="form-control shadow-none" type="text" value="${table
                  .find("td:eq(1)")
                  .text()}" readonly>
            </div>
        </div>
            <hr>
        <div class="row p-3">
        <div class="col-12 d-flex flex-row-reverse">
        <button type="submit" class="btn-theme-one ml-1">Activar</button>
        <button type="button" class="btn-theme-two" data-dismiss="modal">Cerrar</button>
    </div>
        </div>
    </form>
    `;
  $("#body_modal_enable").html(body_modal);
});

$(document).on("click", "#enable_depto", function (e) {
  e.preventDefault();
  
  $.ajax({
    type: "POST",
    url: "departamentos/enable",
    data: $("#enable_depto").serialize(),
    dataType: "json",
    success: function (response) {},
  });

});

/** function disable depto */
$(document).on("click", "#btnDisableDepto", function () {
  let table = $(this).closest("#tableDeptos");

  let body_modal = `
    <form id="disable_depto">
        <div class="row p-3">
            <div class="col-4">
                <input name="id_depto" class="form-control shadow-none" type="text" value="${table
                  .find("td:eq(0)")
                  .text()}" readonly>
            </div>
            <div class="col-8">
                <input name="depto" class="form-control shadow-none" type="text" value="${table
                  .find("td:eq(1)")
                  .text()}" readonly>
            </div>
        </div>
            <hr>
        <div class="row p-3">
            <div class="col-12 d-flex flex-row-reverse">
                <button id="btn_disable_conf" type="button" class="btn-theme-one ml-1">Desactivar</button>
                <button type="button" class="btn-theme-two" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </form>
    `;
  $("#body_modal_disable").html(body_modal);
});

$(document).on("click", "#btn_disable_conf",function (e) {
  e.preventDefault();

  $.ajax({
    type: "POST",
    url: "departamentos/disable",
    data: $("#disable_depto").serialize(),
    dataType: "json",
    success: function (response) {},
  });
});


/** function update depto */
$(document).on("click", "#btnUpdateDepto", function(e){
   
    let table = $(this).closest("#tableDeptos");

    let body_modal = `
      <form id="update_depto">
          <div class="row p-3">
              <div class="col-4">
                  <input name="id_depto" class="form-control shadow-none" type="text" value="${table
                    .find("td:eq(0)")
                    .text()}" readonly>
              </div>
              <div class="col-8">
                  <input name="depto" class="form-control shadow-none" type="text" value="${table
                    .find("td:eq(1)")
                    .text()}">
              </div>
          </div>
              <hr>
          <div class="row p-3">
              <div class="col-12 d-flex flex-row-reverse">
                  <button id="btn_update_conf" type="button" class="btn-theme-one ml-1">Actualizar</button>
                  <button type="button" class="btn-theme-two" data-dismiss="modal">Cerrar</button>
              </div>
          </div>
      </form>
      `;
    
    $("#body_modal_update").html(body_modal);

});

$(document).on("click", "#btn_update_conf", function (e){
  e.preventDefault();

  $.ajax({
    type: "POST",
    url: "departamentos/update",
    data: $("#update_depto").serialize(),
    dataType: "json",
    success: function (response) {}
  });
});