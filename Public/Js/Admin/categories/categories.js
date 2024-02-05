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
  return $(btn).closest("#tr_category");
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

/** Function update status categories */
$(document).on("click", "#btn_update_status, #btn_conf_status", function () {
  if ($(this).is("#btn_update_status")) {
    let table = get_table(this);
    let id_category = table.find("td:eq(0)").text();
    let name_category = table.find("td:eq(1)").text();
    let status = $(this).attr("data-status");
    let title =
      status == "activado"
        ? "¿Desactivar esta categoría?"
        : "¿Activar esta categoría?";
    let status_category = status == "activado" ? "desactivado" : "activado";

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
                    <input name="id_category" class="form-control shadow-none" type="text" value="${id_category}" readonly>
                </div>
                <div class="col-8">
                    <input class="form-control shadow-none" type="text" value="${name_category}" readonly>
                </div>
                <input name="status_category" class="form-control shadow-none" type="text" value="${status_category}" style="display:none;">
            </div>
            <div class="row p-3">
                <div class="col-12 d-flex flex-row-reverse">
                    <button id="btn_conf_status" type="button" class="btn-theme-one ml-1">Si</button>
                    <button type="button" class="btn-theme-two" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>`;

    $("#modal-content-status").html(content_modal);
  } else if ($(this).is("#btn_conf_status")) {
    let form_data = $("#form_status").serialize();

    request_data("POST", "categories/status", form_data, function (response) {
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

/** Function new category */

$(document).on("click", "#new_category", function () {
  const form = document.querySelector("#form_category");
  let form_data = new FormData(form);

  request_data(
    "POST",
    "categories/add",
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
    },
    true
  );
});

/** function update depto */
$(document).on("click", "#btnUpdateDepto", function (e) {
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

$(document).on("click", "#btn_update_conf", function (e) {
  e.preventDefault();

  $.ajax({
    type: "POST",
    url: "departamentos/update",
    data: $("#update_depto").serialize(),
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

/** update status view in web function */
$(document).on("click", "#btn_update_web", function () {
  let data = $(this).attr("data-web");

  let title = "";

  if (data == "on") {
    title = "¿Ocultar imagen en la web?";
  } else {
    title = "¿Hacer visible imagen en la web?";
  }

  let content_modal = `
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">${title}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="body">
        <form id="form_status_web">
        <div class="row p-3" style="display:none;">
        <div class="col-4">
          <input name="category_id" type="text" value="${table
            .find("td:eq(0)")
            .text()}">
            <input name="category_web_status" type="text" value="${data}">
        </div>
        </div>
        <div class="row p-3">
          <div class="col-12 d-flex flex-row-reverse">
          <button id="btn_conf_web" type="button" class="btn-theme-one ml-1">Si</button>
          <button type="button" class="btn-theme-two" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
        </form>
      </div>`;

  $("#modal-content-web").html(content_modal);
});

$(document).on("click", "#btn_conf_web", function () {
  let form_data = $("#form_status_web").serialize();

  $.ajax({
    type: "POST",
    url: "categories/web_update_status",
    data: form_data,
    dataType: "json",
    success: function (response) {
      toastr[messages.type](messages.text, messages.title);

      if (messages.reload) {
        setTimeout(function () {
          location.reload();
        }, 500);
      }
    },
  });
});

$(document).ready(function () {
  $("#tb_categories").DataTable({
    processing: true,
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json",
    },
    columnDefs: [
      {
        targets: [2, 3, 4],
        className: "dt-body-center",
      },
      {
        targets: [1, 2, 3, 4, 5],
        className: "dt-head-center",
      },
    ],
  });
});
