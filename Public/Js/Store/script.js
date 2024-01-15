const marcas = $(".marcas");
const slideProducts = $(".slider-products");
const slide_mega_banner = $(".slide_mega_banner");

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
  loop: true,
  margin: 0,
  smartSpeed: 500,
  autoplay: 5000,
  nav: false,
  dots: false,
  autoWidth: true,
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
