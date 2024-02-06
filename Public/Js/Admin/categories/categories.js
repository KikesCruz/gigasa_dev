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

/** function new category */

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

/** function update category */
$(document).on("click", "#btn_edit_category, #btn_update_conf", function (e) {

  if($(this).is("#btn_edit_category")){

    let table = get_table(this);
    let id_category = table.find("td:eq(0)").text().trim();
    let name_category = table.find("td:eq(1)").text().trim();

    let body_modal = `
      <form id="form_update_category">
          <div class="row p-3">
              <div class="col-2">
                  <input name="id_category" class="form-control shadow-none" type="text" value="${id_category}" readonly>
              </div>
              <div class="col-8">
                  <input name="category_name" class="form-control shadow-none" type="text" value="${name_category}">
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

  }else if($(this).is("#btn_update_conf")){

    let data = $("#form_update_category").serialize();
    
    request_data('POST','categories/update',data,function(response){

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

/** function update status view in web function */
$(document).on("click", "#btn_update_web, #btn_conf_web", function () {
  if ($(this).is("#btn_update_web")) {
    let table = get_table(this);
    let data = $(this).attr("data-web");
    let id_category = table.find("td:eq(0)").text();
    let title =
      data == "on"
        ? "¿Ocultar imagen en la web?"
        : "¿Hacer visible imagen en la web?";

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
            <input name="category_id" type="text" value="${id_category}">
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
  } else if ($(this).is("#btn_conf_web")) {
    let form_data = $("#form_status_web").serialize();

    request_data(
      "POST",
      "categories/web_update_status",
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

/** function update img */
$(document).on(
  "click",
  "#btn_img_category, .files, #btn_update_img  ",
  function () {
    if ($(this).is("#btn_img_category")) {
      let table = get_table(this);
      let id_category = table.find("td:eq(0)").text();
      let modal_content = "";

      request_data(
        "GET",
        "categories/update_img",
        { id_category: id_category },
        function (response) {
          modal_content = `
      
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Modificar imagen de dermocosmeticos</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div id="body_modal_update" class="modal-body">

      <form id="form_update_img">
        <div class="row">
          <div class="col-md-12 d-flex justify-content-center">
            <div class="card" style="width: 15rem;">
              <img id="img_category" src="${response}" alt="">
              <div class="card-body">
                <div class="form-group input-file">
                  <input id="input_img"  name="img_category_new" type="file" class="form-control-file files">
                </div>
                <div class="form-group" style="display:none">
                  <input name="id_category" type="text" class="form-control files" readonly  value="${id_category}">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <button type="button" class="btn-theme-two" data-dismiss="modal">Cerrar</button>
            <button id="btn_update_img" type="button" class="btn-theme-one" ><i class="fa-solid fa-arrows-rotate"></i> Actualizar</button>
          </div>
        </div>
      </form>
    </div> 
      `;

          $("#modal-content-img").html(modal_content);
        }
      );
    } else if ($(this).is(".files")) {
      $("#input_img").change(function (e) {
        e.preventDefault();

        let file = $("#input_img")[0].files[0];
        let url = URL.createObjectURL(file);
        $("#img_category").attr("src", url);
        console.log(url);
      });
    } else if ($(this).is("#btn_update_img")) {
      const form_data = document.querySelector("#form_update_img");
      const data = new FormData(form_data);

      request_data(
        "POST",
        "categories/update_img",
        data,
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
    }
  }
);

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
