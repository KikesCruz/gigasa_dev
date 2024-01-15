toastr.options = {
  closeButton: false,
  debug: false,
  newestOnTop: false,
  progressBar: false,
  positionClass: "toast-bottom-right",
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

/** function add new brand */
$(document).on("click", "#add_brand", function (e) {
  e.preventDefault();

  let formData = $("#form_brand").serialize();

  $.ajax({
    type: "POST",
    url: "brands/add",
    data: formData,
    dataType: "json",
    success: function (response) {
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


/** function active Brand */
$(document).on("click", "#btnEnableBrand", function () {
    let table = $(this).closest("#tb_marcas");
  
    let body_modal = `
      <form id="enable_brand">
          <div class="row p-3">
              <div class="col-4">
                  <input name="id_brand" class="form-control shadow-none" type="text" value="${table
                    .find("td:eq(0)")
                    .text()}" readonly>
              </div>
              <div class="col-8">
                  <input name="brand" class="form-control shadow-none" type="text" value="${table
                    .find("td:eq(1)")
                    .text()}" readonly>
              </div>
          </div>
              <hr>
          <div class="row p-3">
          <div class="col-12 d-flex flex-row-reverse">
          <button id="btn_enable_conf" type="button" class="btn-theme-one ml-1">Activar</button>
          <button type="button" class="btn-theme-two" data-dismiss="modal">Cerrar</button>
      </div>
          </div>
      </form>
      `;
    $("#body_modal_enable").html(body_modal);
  });
  
  $(document).on("click", "#btn_enable_conf", function (e) {
    e.preventDefault();
  
    $.ajax({
      type: "POST",
      url: "brands/enable",
      data: $("#enable_brand").serialize(),
      dataType: "json",
      success: function (response) {
        switch (response) {
          case "update":
              toastr["success"]("Se actualizo correctamente", "Realizado");
              setTimeout(function () {
              location.reload();
              }, 500);
          break;
  
          case "error":
              toastr["error"]("Sucedió un error al actualizar", "Error");
          break;
        }
      },
    });
  });

  /** function disable Brand */
$(document).on("click", "#btnDisableBrand", function () {
    let table = $(this).closest("#tb_marcas");
  
    let body_modal = `
      <form id="disable_brand">
          <div class="row p-3">
              <div class="col-4">
                  <input name="id_brand" class="form-control shadow-none" type="text" value="${table
                    .find("td:eq(0)")
                    .text()}" readonly>
              </div>
              <div class="col-8">
                  <input name="brand" class="form-control shadow-none" type="text" value="${table
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
  
  $(document).on("click", "#btn_disable_conf", function (e) {
    e.preventDefault();
  
    $.ajax({
      type: "POST",
      url: "brands/disable",
      data: $("#disable_brand").serialize(),
      dataType: "json",
      success: function (response) {
        switch (response) {
          case "update":
              toastr["success"]("Se actualizo correctamente", "Realizado");
              setTimeout(function () {
              location.reload();
              }, 500);
          break;
  
          case "error":
              toastr["error"]("Sucedió un error al actualizar", "Error");
          break;
        }
      },
    });
  });

  /** function update Brand */
$(document).on("click", "#btnUpdateBrand", function (e) {
    let table = $(this).closest("#tb_marcas");
  
    let body_modal = `
        <form id="update_brand">
            <div class="row p-3">
                <div class="col-4">
                    <input name="id_brand" class="form-control shadow-none" type="text" value="${table
                      .find("td:eq(0)")
                      .text()}" readonly>
                </div>
                <div class="col-8">
                    <input name="brand" class="form-control shadow-none" type="text" value="${table
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

  $(document).on("click", "#btn_update_conf", function (e) {
    e.preventDefault();
  
    $.ajax({
      type: "POST",
      url: "brands/update",
      data: $("#update_brand").serialize(),
      dataType: "json",
      success: function (response) {
        switch (response) {
          case "update":
              toastr["success"]("Se actualizo correctamente", "Realizado");
              setTimeout(function () {
              location.reload();
              }, 500);
          break;
  
          case "empty":
              toastr["warning"]("Campos Vacíos", "Advertencia");
          break;
  
          case "error":
              toastr["error"]("Sucedió un error al actualizar", "Error");
          break;
        }
  
      },
    });
  });
  