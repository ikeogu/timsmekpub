
$().ready(function () {
  $('[rel="tooltip"]').tooltip();

  $('a.scroll-down').click(function (e) {
    e.preventDefault();
    scroll_target = $(this).data('href');
    $('html, body').animate({
      scrollTop: $(scroll_target).offset().top - 60
    }, 1000);
  });
  

});

function rotateCard(btn) {
  var $card = $(btn).closest('.card-container');
  console.log($card);
  if ($card.hasClass('hover')) {
    $card.removeClass('hover');
  } else {
    $card.addClass('hover');
  }
}

let toggle = document.querySelector('#toggler');
let showTranslate = document.querySelector('.showTranslate');
let sideNav = document.querySelector('.small-side');
let closeMenu = document.querySelector('.closeMenu');

toggle.addEventListener('click', onClick);

showTranslate = false;

function onClick(e){
 if(!showTranslate){
    sideNav.classList.add('closeMenu');
    showTranslate = true;
 } else {
  sideNav.classList.remove('closeMenu');
  showTranslate = false;
 }
}