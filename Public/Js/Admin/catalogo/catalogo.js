$(document).ready(function () {
  $("#tb_catalogo thead tr")
    .clone(true)
    .addClass("filters")
    .appendTo("#tb_catalogo thead");

  var table = $("#tb_catalogo").DataTable({
    orderCellsTop: true,
    fixedHeader: true,
    initComplete: function () {
      var api = this.api();

      // For each column
      api
        .columns([0, 1, 2, 3, 4])
        .eq(0)
        .each(function (colIdx) {
          var cell = $(".filters th").eq(
            $(api.column(colIdx).header()).index()
          );
          var title = $(cell).text();
          $(cell).html('<input type="text" placeholder="' + title + '" />');

          $(
            "input",
            $(".filters th").eq($(api.column(colIdx).header()).index())
          )
            .off("keyup change")
            .on("change", function (e) {
              // Get the search value
              $(this).attr("title", $(this).val());
              var regexr = "({search})";
              var cursorPosition = this.selectionStart;
              // Search the column for that value
              api
                .column(colIdx)
                .search(
                  this.value != ""
                    ? regexr.replace("{search}", "(((" + this.value + ")))")
                    : "",
                  this.value != "",
                  this.value == ""
                )
                .draw();
            })
            .on("keyup", function (e) {
              e.stopPropagation();

              $(this).trigger("change");
              $(this)
                .focus()[0]
                .setSelectionRange(cursorPosition, cursorPosition);
            });
        });
    },
  });
});

/** tabla de inactivos */
$(document).on("click", "#btn_list_inactivos", function () {
  let data = "";

  $.ajax({
    type: "GET",
    url: "catalogo",
    data: { list: "all" },
    dataType: "json",
    success: function (response) {

      for(const product of response){
        data += `
        
        <tr>
        <td>${product['id_catalog']}</td>
        <td>${product['name_product']}</td>
        <td>${product['status']}</td>
        <td></td>
        </tr>
        `;
      }

      $("#box_inactivos").html(data);
    },
  });
});

$(document).ready(function () {
  $("#departments").on("change", function () {
    let item = $("#departments option:selected").val();
    let categories = "";

    $.ajax({
      type: "GET",
      url: "catalogo",
      data: { id_depto: item },
      dataType: "json",
      success: function (response) {
   
        for (const category of response) {
          categories += `<option value="${category["id_category"]}">${category["category_name"]}</option>`;
        }

        $("#options_categories").append(categories);
      },
    });
  });
});

$(document).ready(function () {
  $("#options_categories").on("change", function () {
    let item = $("#options_categories option:selected").val();
    let sub_categories = "";

    $.ajax({
      type: "GET",
      url: "catalogo",
      data: { id_category: item },
      dataType: "json",
      success: function (response) {
        console.log(response);
        for (const sub_category of response) {
          sub_categories += `<option value="${sub_category["id_subcategory"]}">${sub_category["subcategory_name"]}</option>`;
        }

        $("#options_sub_categories").append(sub_categories);
      },
    });
  });
});

/** function valid sku */
$(document).ready(function () {
  $("#input_sku").on("blur", function () {
    let sku = $("#input_sku").val();

    $.ajax({
      type: "GET",
      url: "catalogo",
      data: { sku: sku },
      dataType: "json",
      success: function (response) {
        console.log(response);
        if (sku == response["sku"]) {
          $("#input_sku").addClass("is-invalid");
        }
      },
    });
    $("#input_sku").removeClass("is-invalid");
  });
});
