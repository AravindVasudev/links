$(function() {
    //load.js
//  $("body").css("background", '#F9F9F9 url("https://unsplash.it/' + window.innerWidth + '/' + window.innerHeight + '/?random") no-repeat');
  $(".box").fadeIn(1000);
  $(".enter-trig").focus();
  
  
  //advanced.js
  $(".advanced").one("click", function() {
    $(this).empty();
    $("#advanced").fadeIn();
  });
  
  //ajaxURL.js
  new Clipboard('.copy');
  
  $("#submit-code").one("click", function() {
    
//    var url = $(".url-box").val();
//    var key = $(".key-box").eq(0).val();
    
//    $.get(url, function(data){
      
//      var returned = JSON.parse(data);
//      $(".advanced").empty();
//      $("#advanced").empty();
//      
//      if(returned.report == 1) {
//        $(".cbox > input").val("http://links.gq/" + returned.shortened);
//        $(".cbox > button").addClass("copy").html("COPY").attr("data-clipboard-text","http://links.gq/" + returned.shortened);
//      }
//      else {
//      $(".cbox > input").val("Error:" + returned.report);
//      }
//    });
//  });
  
    $.ajax({
      method: 'POST',
      url: '/add',
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      data: {key: $(".key-box").eq(0).val(), url: $(".url-box").val()},
      dataType: 'json',
      success: function(returned) {
        console.log(returned);
        
        $(".advanced").empty();
        $("#advanced").empty();

        if(returned.report == 1) {
          $(".cbox > input").val("http://links.gq/" + returned.shortened);
          $(".cbox > button").addClass("copy").html("COPY").attr("data-clipboard-text","http://links.gq/" + returned.shortened);
        }
        else {
        $(".cbox > input").val("Error:" + returned.report);
        }
      }
    });
  });
  
  //submitWithEnter.js
  $(".enter-trig").keypress(function(event) {
    
    if(event.which == 13)
      $(".trigg").trigger("click");
  });
   
});