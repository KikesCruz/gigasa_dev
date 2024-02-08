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

let messages = {
  empty: {
    type: "warning",
    text: "Campos Vacíos",
    title: "Advertencia",
  },
  duplicate: {
    type: "warning",
    text: "Ya se encuentra registrado",
    title: "Información",
  },
  success: {
    type: "success",
    text: "Se guardó correctamente",
    title: "Realizado",
    reload: true,
  },
  error: {
    type: "error",
    text: "Ocurrió un error",
    title: "Error",
  },
};

function get_table(btn) {
  return $(btn).closest("#tr_subcategories");
}

function request_data(
  method,
  url,
  data,
  callbackResponse,
  isMultiData = false
) {
  let ajaxOptions = {
    type: method,
    url: url,
    data: data,
    dataType: "json",
    success: function (response) {
      callbackResponse(response);
    },
  };

  if (isMultiData) {
    ajaxOptions.contentType = false;
    ajaxOptions.processData = false;
  }

  return $.ajax(ajaxOptions);
}

/** function new sub category */

$(document).on("click", "#btn_add_subcategory", function () {
  let form = $("#form_sub_category").serialize();

  request_data("POST", "sub-categorias/add", form, function (response) {
    let message = messages[response];
    if (message) {
      toastr[message.type](message.text, message.title);

      if (message.reload) {
        setTimeout(function () {
          location.reload();
        }, 500);
      }
    }
  });
});

/** function change status */

$(document).on("click", "#btn_status, #conf_change_status", function () {
  if ($(this).is("#btn_status")) {
    let table = get_table(this);
    let id_subcategory = table.find("td:eq(0)").text().trim();
    let name_subcategory = table.find("td:eq(1)").text().trim();
    let status = $(this).attr("data-status");
    let title =
      status == "activado"
        ? "¿Desactivar esta sub categoría?"
        : "¿Activar esta sub categoría?";
    let status_subcategory = status == "activado" ? "desactivado" : "activado";
    let content_modal = `
  
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">${title}</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="body">
  <form id="form_status">
      <div class="row p-3">
          <div class="col-4">
              <input name="id_subcategory" class="form-control shadow-none" type="text" value="${id_subcategory}" readonly>
          </div>
          <div class="col-8">
              <input class="form-control shadow-none" type="text" value="${name_subcategory}" readonly>
          </div>
          <input name="status_subcategory" class="form-control shadow-none" type="text" value="${status_subcategory}" style="display:none;">
      </div>
      <div class="row p-3">
          <div class="col-12 d-flex flex-row-reverse">
              <button id="conf_change_status" type="button" class="btn-theme-one">Si</button>
              <button type="button" class="btn-theme-two" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </form>
</div>`;

    $("#content-status").html(content_modal);
  } else if ($(this).is("#conf_change_status")) {
    let form_data = $("#form_status").serialize();

    request_data(
      "POST",
      "sub-categorias/status",
      form_data,
      function (response) {
        let message = messages[response];
        if (message) {
          toastr[message.type](message.text, message.title);

          if (message.reload) {
            setTimeout(function () {
              location.reload();
            }, 500);
          }
        }
      }
    );
  }

});

/** function edit sub category */
$(document).on("click", "#btn_edit, #btn_update_conf", function () {
  if ($(this).is("#btn_edit")) {
    let table = get_table(this);
    let id_subcategory = table.find("td:eq(0)").text().trim();
    let name_subcategory = table.find("td:eq(1)").text().trim();
    let categories = $("#categories").html();


    request_data('GET','sub-categorias/edit',{"id_subcategory":id_subcategory},function(response){

      let body_modal = `
      <form id="form_edit">
              <div class="row p-3">
                  <div class="col-4">
                  <input 
                  name="id_subcategory" 
                  class="form-control shadow-none" 
                  type="text" value="${id_subcategory}" readonly>
                  </div>
                  <div class="col-8">
                  <input 
                  name="name_subcategory" 
                  class="form-control shadow-none" 
                  type="text" 
                  value="${name_subcategory}">
                  </div>
              </div>
              <div class="row p-3">
                  <div class="col-8">
                  <option value="${response['id_category']}" selected disable>${response['name_category']}</option>
                  ${categories}
                  </div>
          
              </div>
              <hr>
              <div class="row p-3">
                  <div class="col-12 d-flex flex-row-reverse">
                      <button 
                      id="btn_update_conf" 
                      type="button" 
                      class="btn-theme-one ml-1">
                      Editar</button>
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
    });



    

    
  } else if ($(this).is("#btn_update_conf")) {
    let form_data = $("#form_edit").serialize();

    request_data("POST", "sub-categorias/edit", form_data, function (response) {
      let message = messages[response];
      if (message) {
        toastr[message.type](message.text, message.title);

        if (message.reload) {
          setTimeout(function () {
            location.reload();
          }, 500);
        }
      }
    });
  }
});

$(document).ready(function () {
  $("#table_categories").DataTable({
    processing: true,
  });
});
