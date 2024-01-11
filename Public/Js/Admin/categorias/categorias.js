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



$(document).on("click", "#btn_add_new", function(){

    let formData = $("#form_new_category").serialize();

   $.ajax({
    type: "POST",
    url: "categorias/add",
    data: formData,
    dataType: "json",
    success: function (response) {
        switch(response){
            case 'empty':
               toastr["warning"]("Campo categoría vacío", "Advertencia"); 
            break;
            case 'error':
                toastr["warning"]("No selecciono un departamento", "Advertencia"); 
            break;
            case 'duplicate':
                toastr["info"]("Ya se encuentra registrado", "Información");
            break;
            case 'success':
            toastr["success"]("Se guardo correctamente", "Realizado");
            setTimeout(function () {
              location.reload();
            }, 500);
            break;
        }
    }
   });


});

$(document).on("click","#btnDisableCat", function(){

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
        <button id="btn_disable_conf" type="button" class="btn-theme-one ml-1">Activar</button>
        <button type="button" class="btn-theme-two" data-dismiss="modal">Cerrar</button>
    </div>
        </div>
    </form>
    `;

    $("#body_modal_disable").html(body_modal);


});


$(document).on("click", "#btn_disable_conf", function(){
    let formData = $("#form_disable_category").serialize();

    console.log(formData);


});