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
  
  /**   ADD NEW  ***/
  $(document).on("click", "#btn_add_new", function () {
    let formData = $("#form_new_subcategory").serialize();

    $.ajax({
      type: "POST",
      url: "subcategorias/add",
      data: formData,
      dataType: "json",
      success: function (response) {
        console.log(response)
        switch (response) {
          case "empty":
            toastr["warning"]("Campo vacío", "Advertencia");
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
  