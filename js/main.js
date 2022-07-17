const boxes = document.querySelectorAll(".caja1 ");
const leftBoxes = document.querySelectorAll(".caja ");

window.addEventListener("scroll", checkBoxes);

checkBoxes();

function checkBoxes() {
  const triggerBottom = (window.innerHeight / 5) * 4;

  boxes.forEach((caja1) => {
    const boxTop = caja1.getBoundingClientRect().top;

    if (boxTop < triggerBottom) {
      caja1.classList.add("show");
    } else {
      caja1.classList.remove("show");
    }
  });

  leftBoxes.forEach((caja) => {
    const boxTop = caja.getBoundingClientRect().top;
    if (boxTop < triggerBottom) {
      caja.classList.add("show1");
    } else {
      caja.classList.remove("show1");
    }
  });
}

$('.click').on('click', function(e) {
  e.preventDefault();
  $('.logout').toggleClass('logout-block');
});



$(document).ready(function(){
  $('#Oku_menu').click(function(){
      $('#Oku').animatescroll()
  });

  $('#Funciones_menu').click(function(){
      $('#Funciones').animatescroll()
  });

  $('#Ventajas_menu').click(function(){
      $('#Ventajas').animatescroll()
  });
});    

