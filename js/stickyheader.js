
var width = $(window).width(); //I'm assuming you mean height, you can try .width() if you need it

if (width > 950) {
  $(window).scroll(function() {
if ($(this).scrollTop() > 1){  
    $('header').addClass("sticky");
  }
  else{
    $('header').removeClass("sticky");
  }
});
}