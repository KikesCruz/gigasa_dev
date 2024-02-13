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
  return $(btn).closest("#tr_type_product");
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

$(document).on("change", "#categories", () => {
  $("#categories option:selected").each(function () {
    let id_category = $(this).val();
    let options_subcategories = "<option>Sub Categorías</option>";
    let sub_category = $("#sub_categories");

    request_data(
      "GET",
      `tipo-articulos/categories/search/${id_category}`,
      null,
      function (response) {
        for (const sub_category of response) {
          options_subcategories += `<option value="${sub_category["id_sub_category"]}">${sub_category["name_sub_category"]} </option>`;
        }

        sub_category.html(options_subcategories);
      }
    );
  });
});

/** new created type product */
$(document).on("click", "#btn_new_type", () => {
  let form_data = $("#form_type_product").serialize();

  request_data("POST", "tipo-articulos/add", form_data, function (response) {
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

/** change status */
$(document).on("click", "#btn_status, #conf_change_status", function (){

  if($(this).is("#btn_status")){

    let table = get_table(this);
    let id_type = table.find("td:eq(0)").text().trim();
    let name_subcategory = table.find("td:eq(1)").text().trim();
    let status = $(this).attr("data-status");

    let title =
    status == "activado"
      ? "¿Desactivar este tipo de articulo?"
      : "¿Activar este tipo de articulo?";
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
                <input name="id_type_product" class="form-control shadow-none" type="text" value="${id_type}" readonly>
            </div>
            <div class="col-8">
                <input class="form-control shadow-none" type="text" value="${name_subcategory}" readonly>
            </div>
            <input name="status_type_product" class="form-control shadow-none" type="text" value="${status_subcategory}" style="display:none;">
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
   

  }else if($(this).is("#conf_change_status")){

    let form_data = $("#form_status").serialize();

    request_data(
      "POST",
      "tipo-articulos/status",
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
