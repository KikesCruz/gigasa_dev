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



/** function add new brand */
$(document).on("click", "#add_brand", () => {

  const form = document.querySelector("#form_brand");

  let form_data = new FormData(form);

  request_data('POST','brands/add',form_data,function(response){

    let message = messages[response];
    if (message) {
      toastr[message.type](message.text, message.title);

      if (message.reload) {
        setTimeout(function () {
          location.reload();
        }, 500);
      }
    }

  },true);
  
 
});


/** function active Brand */
$(document).on("click","#btn_status", () =>{

  if($(this).is("#btn_status")){

    

  }

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
  


  $(document).ready(function () {
    $("#tble_marcas").DataTable({
  
      "processing": true,
      
  
    });
  }); 
  