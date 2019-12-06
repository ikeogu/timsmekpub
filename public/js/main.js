
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

let harmbugger = document.querySelector('.toggle');
let navLinks = document.querySelector('.small-side');
let navList = document.querySelector('.navbar-default li');

harmbugger.addEventListener('click', function(){
    navLinks.classList.toggle('open');
});