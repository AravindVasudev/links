$(function() {

  var url = 'http://unsplash.com/rss';

  $.ajax({
    url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&callback=?&q=' + encodeURIComponent(url),
    async: false,
    jsonpCallback: 'jsonCallback',
    contentType: "application/json",
    dataType: 'jsonp',
    success: function(json) {

      var min = 0;
      var max = json.responseData.feed.entries.length;
      // and the formula is:
      var random = Math.floor(Math.random() * (max - min + 1)) + min;

      var str = json.responseData.feed.entries[random].content;

      var regex = /<img.*?src="(.*?)"/;
      var src = regex.exec(str)[1];

      $('body').css('background-image','url('+src+')');

    }
  })

  $(".enter-trig").focus();

  $(".advanced").one("click", function() {
    $(this).empty();
    $("#advanced").fadeIn();
  });

  //ajaxURL.js
  new Clipboard('.copy');

  $("#submit-code").one("click", function() {
    $("#submit-code").css('backgroundColor', '#E0E0E0');
    $.ajax({
      method: 'POST',
      url: '/add',
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      data: {id: $(".key-box").eq(0).val(), url: $(".url-box").val()},
      dataType: 'json',
      beforeSend: function() {
        $(".advanced").empty();
        $("#advanced").empty();
      },
      success: function(data) {
        console.log(data);
        if(data.id) {
          $(".cbox > input").val("http://links.gq/" + data.id);
          $(".cbox > button").addClass("copy").html("COPY").attr("data-clipboard-text","http://links.gq/" + data.id);
        }
        else {
        $(".cbox > input").val("Error:" + data.error);
        }
      },
      error: function(xhr,status,error) {
        $(".cbox > input").val("Oops! Check your inputs, captain");
      }
    });
  });

  //submitWithEnter.js
  $(".enter-trig").keypress(function(event) {

    if(event.which == 13)
      $(".trigg").trigger("click");
  });

});
