$(document).ready(function() {

    /*$('.menu-btn').each(function(){
        $(this).click(function () {
            var elem = $(this);
            if (elem.hasClass('active')) {
                $('.menu-btn.active').removeClass('active');
                $('#menu-header-menu').slideUp(300).fadeOut(1);
            } else {
                elem.addClass('active');
                $('#menu-header-menu').slideDown(300);
            }
        });
    });*/

    $(".nm-modal-opener").on("click", function(e){
      e.preventDefault();
      $('#myModal').modal('toggle');
      var type = $(this).data("modal-type");
      var id = $(this).data("id");
      getModalContent(type, id);
    });

    /*$('#myModal').on('show.bs.modal', function (e) {

      // $(this).find(".modal-body").html("See on sisu");
      getModalContent();

    });*/

    $('#myModal').on('hidden.bs.modal', function (e) {

      // $(this).find(".modal-body").html("See on sisu");
      $( '.modal-title' ).html( "<i>Üks moment</i>" );
      $( '.modal-body' ).html( "<i>laen inffi...</i>" );


    });


});

function getModalContent(type, id) {
  var postUrl = "/wp-json/wp/v2/"+type+"/"+id;
  $.ajax( {
    url: postUrl,
      success: function ( data ) {
        // var post = data.shift();
        // $( '#quote-title' ).text( post.title );
        $( '.modal-body' ).html( data.content.rendered );
        $( '.modal-title' ).html( data.title.rendered );
        console.log(data.title.rendered);
      },
      cache: false
    } );




}
