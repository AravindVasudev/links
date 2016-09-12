$(function() {
  new Clipboard('.copy');
  $("#submit-code").one("click", function() {
      var pin = $(".url-box").val();  
      var url = "shorten.php?url=" + encodeURIComponent(pin);
    
      if($(".key-box").eq(0).val() !== "") {
        url += "&key=" + $(".key-box").eq(0).val();
      }
    $.get(url, function(data){
      var returned = JSON.parse(data);
      $(".advanced").empty();
      $("#advanced").empty();
      if(returned.report == 1) {
          $(".cbox > input").val("http://links.gq/" + returned.shortened);
          $(".cbox > button").addClass("copy").html("COPY").attr("data-clipboard-text","http://links.gq/" + returned.shortened);
          
        }
        else {
          $(".cbox > input").val("Error:" + returned.report);
        }
    });
    
  });
});