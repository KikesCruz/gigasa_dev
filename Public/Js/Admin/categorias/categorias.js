/** Function add new category */
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

$(document).on("click", "#btn_add_new", function () {
  let formData = $("#form_new_category").serialize();

  $.ajax({
    type: "POST",
    url: "categorias/add",
    data: formData,
    dataType: "json",
    success: function (response) {
      switch (response) {
        case "empty":
          toastr["warning"]("Campo categoría vacío", "Advertencia");
          break;
        case "error":
          toastr["warning"]("No selecciono un departamento", "Advertencia");
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

/** Function disable category */
$(document).on("click", "#btnDisableCat", function () {
  let table = $(this).closest("#tb_categories");

  let body_modal = `
    <form id="form_disable_category">
        <div class="row p-3">
            <div class="col-4">
                <input name="id_cat" class="form-control shadow-none" type="text" value="${table
                  .find("td:eq(2)")
                  .text()}" readonly>
            </div>
            <div class="col-8">
                <input name="cat" class="form-control shadow-none" type="text" value="${table
                  .find("td:eq(3)")
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

$(document).on("click", "#btn_disable_conf", function () {
  let formData = $("#form_disable_category").serialize();

  $.ajax({
    type: "POST",
    url: "categorias/disable",
    data: formData,
    dataType: "json",
    success: function (response) {
      if (response == "success") {
        toastr["success"]("Se guardo correctamente", "Realizado");
        setTimeout(function () {
          location.reload();
        }, 500);
      }
    },
  });
});

/** function enable category */

$(document).on("click", "#btnEnableCat", function () {
  let table = $(this).closest("#tb_categories");

  let body_modal = `
    <form id="form_enable_category">
        <div class="row p-3">
            <div class="col-4">
                <input name="id_cat" class="form-control shadow-none" type="text" value="${table
                  .find("td:eq(2)")
                  .text()}" readonly>
            </div>
            <div class="col-8">
                <input name="cat" class="form-control shadow-none" type="text" value="${table
                  .find("td:eq(3)")
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

$(document).on("click", "#btn_enable_conf", function () {
  let formData = $("#form_enable_category").serialize();

  $.ajax({
    type: "POST",
    url: "categorias/enable",
    data: formData,
    dataType: "json",
    success: function (response) {
      if (response == "success") {
        toastr["success"]("Se guardo correctamente", "Realizado");
        setTimeout(function () {
          location.reload();
        }, 500);
      }
    },
  });
});

/** function update category */
$(document).on("click", "#btnUpdateCat", function () {
  let table = $(this).closest("#tb_categories");
  let deptos = "";

  $.ajax({
    type: "GET",
    url: "categorias/update",
    dataType: "json",
    success: function (response) {
      for (const depto of response) {
        deptos += `<option value="${depto["id_depto"]}">${depto["depto_name"]}</option>`;
      }

      let body_modal = `
    <form id="form_update_category">
            <div class="row p-3">
                <div class="col-4">
                <input 
                name="id_cat" 
                class="form-control shadow-none" 
                type="text" value="${table.find("td:eq(2)").text()}" readonly>
                </div>
                <div class="col-8">
                <input 
                name="cat" 
                class="form-control shadow-none" 
                type="text" 
                value="${table.find("td:eq(3)").text()}">
                </div>
            </div>
            <div class="row p-3">
                <div class="col-8">
                <label for="">Asociar al departamento de:</label>
                <select
                name="depto"
                id="depto_list"
                class="form-control"
                aria-label="Default select example">
                <option value="0" selected disable>Departamentos</option>
                ${deptos}
                </select>
                </div>
        
            </div>
            <hr>
            <div class="row p-3">
                <div class="col-12 d-flex flex-row-reverse">
                    <button 
                    id="btn_update_conf" 
                    type="button" 
                    class="btn-theme-one ml-1">
                    Activar</button>
                    <button 
                    type="button" 
                    class="btn-theme-two" 
                    data-dismiss="modal">Cerrar
                    </button>
                </div>
            </div>
    </form>
    `;

      $("#body_modal_update").html(body_modal);
    },
  });
});

$(document).on("click", "#btn_update_conf", function () {
  let formData = $("#form_update_category").serialize();
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "categorias/update",
    data: formData,
    dataType: "json",
    success: function (response) {
      if (response == "success") {
        toastr["success"]("Se guardo correctamente", "Realizado");
        setTimeout(function () {
          location.reload();
        }, 500);
      }
    },
  });
});
