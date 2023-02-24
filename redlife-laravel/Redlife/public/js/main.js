$(document).ready(function(){
  /*
  //Example
  $("#hola").click(function(){
    $("#hola").hide();
    alert("hello")
  });
  */
  var url = "http://redlife.test";

  // Enter hand
  $('.btn-like').css('cursor', 'pointer');
  $('.btn-dislike').css('cursor', 'pointer');

  // Button like
  function like(){
    $('.btn-like').unbind('click').click(function(){
      console.log('dislike')
      $(this).addClass('btn-dislike').removeClass('btn-like');
      $(this).attr('id', 'star-2')

      // request for ajax
      $.ajax({
        url: url + '/dislike/' + $(this).data('id'),
        type: 'GET',
        success: function(response){
          if(response.like){
            console.log("Has dado dislike a la publicacion")
          }else{
            console.log("Error al dar dislike")
          }
        }
      });

      dislike();
    });
  }
  like();

  // Button dislike
  function dislike(){
    $('.btn-dislike').unbind('click').click(function(){
      console.log('like')
      $(this).addClass('btn-like').removeClass('btn-dislike');
      $(this).attr('id', 'star')

      // recuest for ajax
      $.ajax({
        url: url + '/like/' + $(this).data('id'),
        type: 'GET',
        success: function(response){
          if(response.like){
            console.log("Has dado like a la publicacion")
          }else{
            console.log("Error al dar like")
          }
        }
      });

      like();
    });
  }
  dislike();

});
 /* $(".btn-dislike").click(function(){
    $(this).css("color","yellow");
  });*/

/*  
  function dislike(){
      $(".btn-dislike").unbind('click').click(function(){
         console.log('dislike');
        $(this).addClass('btn-like').removeClass('btn-dislike');
        //$(this).css("color","yellow");
        like();
  });
  }
  dislike();

  function like(){
    $(".btn-like").unbind('click').click(function(){
      console.log('like');
      $(this).addClass('btn-dislike').removeClass('btn-like');
      $(this).css("color","gray");
      dislike();
  });
  }
  like();
   


/*window.addEventListener("load",function(){
    $('.btn-like').css('cursor','pointer');
    $('.btn-dislike').css('cursor','pointer');

});*/