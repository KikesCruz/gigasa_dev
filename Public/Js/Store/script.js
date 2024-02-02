const marcas = $(".marcas");
const slideProducts = $(".slider-products");
const slide_mega_banner = $(".box__carousel");
const carouse_category = $(".carousel-category");

marcas.owlCarousel({
  loop: true,
  margin: 5,
  smartSpeed: 500,
  autoplay: 5000,
  nav: false,
  dots:false,
  responsive: {
    0: {
      items: 2,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 5,
    },
  },
});


slideProducts.owlCarousel({
  loop: true,
  margin: 10,
  smartSpeed: 500,
  autoplay: 5000,
  nav: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 5,
    },
  },
});

slide_mega_banner.owlCarousel({
  loop:true,
  slideSpeed : 300,
  paginationSpeed : 400,
  singleItem:true,
  autoplay: 5000,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

carouse_category.owlCarousel({
  loop:false,
  slideSpeed : 300,
  paginationSpeed : 400,
  autoplay: 5000,
  responsive: {
    0: {
      items: 3,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 8,
    },
  },
});



$(document).ready(function () {
  $("#mobile_menu").click(function () {
    $("#mobile_menu_options").slideToggle(500);
  });

  if (screen.width > 768) {
    $("#mobile_menu_options").hide();
  }
});

/** Function hidden forms in account */
$(document).on("click", "#btn_new-account", function () {
  $("#form_new-account").removeClass("hidden_form-logout");

  $("#box_btn-new-account").addClass("hidden_form-logout");

  if (screen.width < 768) {
    $("#form_login").addClass("hidden_form-logout");
  }
});

/**  */
$(document).ready(function () {
  $(".small-image img").click(function () {
    $(this).addClass("image-active").siblings().removeClass("image-active");
    let image = $(this).attr("src");
    $(".big-image img").attr("src", image);
  });
});


$(document).ready(function () {
 let categories = '';
  
  setTimeout(
    $.ajax({
      type: "GET",
      url: "/categories",
      dataType: "json",
      success: function (response) {
  
        for (const category of response) {
  
          categories += `
          <div class="item__category">
              <a href="search/<?= base64_encode($categories['id_category'])?>">
                <img src="${category['img_path']}" alt="">
                <h6>${category['name_category']}</h6>
              </a>
            </div>
          
          `;
  
          
          console.log(category['name_category']);
        }
  
        $("#categories-icons").html(categories);
      }
    }),500)





});