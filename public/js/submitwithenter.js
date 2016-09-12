$(function() {
  $(".enter-trig").keypress(function(event) {
    if(event.which == 13) {
      $(".trigg").trigger("click");
    }
  });
});