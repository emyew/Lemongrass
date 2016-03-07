//scroll top top functionality

$(document).ready(function() {
  var offset = 250;
  var duration = 300;
  $(window).scroll(function() {
    if ($(this).scrollTop() > offset) {
      $('.scrolltotop').fadeIn(duration);
    } else {
      $('.scrolltotop').fadeOut(duration);
    }
  });
  $('.scrolltotop').click(function(event) {
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, duration);
    return false;
  })
});
