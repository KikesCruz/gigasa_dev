$(".clients-carousel").owlCarousel({
  loop: true,
  margin: 10,
  smartSpeed:500,
  autoplay:5000,
  nav:false,
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


let btn_burge = document.querySelector(".burger__menu").addEventListener('click', function(){
   let menu_mobile = document.getElementById("menu-mobile");
 
    if (menu(menu_mobile) == 'none') {
     menu_mobile.style.display = 'block';
    }

});


let btn_closeMenu = document.querySelector("#close-menu-mobile").addEventListener("click", function () {
    let menu_mobile = document.getElementById("menu-mobile");

    if (menu(menu_mobile) == "block") {
      menu_mobile.style.display = "none";
    }
  });

function menu(elementoID){
  let stile = window.getComputedStyle(elementoID);
  let display = stile.getPropertyValue('display') 
  return display
}


