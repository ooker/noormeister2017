
function initMediaQueryChanges(){
  var mql = window.matchMedia("(min-width: 992px)");
  mql.addListener(handleMediaChange);
  handleMediaChange(mql);
}

function handleMediaChange(mediaQueryList) {
  if (mediaQueryList.matches) {
    if( $(".nm-headerTop__nav").hasClass("nm-headerTop__nav--active") ){
      $(".nm-headerTop__nav").removeClass("nm-headerTop__nav--active");
    }
  }
}

function initModals(){
  $(".nm-modal-opener").on("click", function(e){
    e.preventDefault();
    $('#myModal').modal('toggle');
    var type = $(this).data("modal-type");
    var id = $(this).data("id");
    getModalContent(type, id);
  });

  $('#myModal').on('hidden.bs.modal', function (e) {
    // $(this).find(".modal-body").html("See on sisu");
    $( '.modal-title' ).html( "<i>Üks moment</i>" );
    $( '.modal-body' ).html( "<i>laen inffi...</i>" );
  });
}

function initResponsiveNav(){
  var burger = $(".nm-navSwapper");
  var menu = $(".nm-headerTop__nav");
  burger.on("click", function (e) {
    e.preventDefault();
    menu.toggleClass("nm-headerTop__nav--active");
  });
}

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

$(document).ready(function() {

  initMediaQueryChanges();
  initModals();
  initResponsiveNav();
  animateBackground();

});





/* Animating SVG backgrounds */
function animateBackground() {
  var smwBgPaths = [];
  var smwAnimatedPaths = document.querySelectorAll(".nm-svgBg");
  Array.prototype.forEach.call(smwAnimatedPaths, function (el, i) {
    smwBgPaths.push(new Object());
    smwBgPaths[i].el = el;
    smwBgPaths[i].frame = 0;
    smwBgPaths[i].startP = parseInt(el.getAttribute("nmdata:startpos"));
    smwBgPaths[i].endP1 = parseInt(el.getAttribute("nmdata:p1end"));
    smwBgPaths[i].endP2 = parseInt(el.getAttribute("nmdata:p2end"));
    smwBgPaths[i].duration = parseInt(el.getAttribute("nmdata:duration"));
    smwBgPaths[i].axis = el.getAttribute("nmdata:axis");

    setTimeout(function(){
      if(smwBgPaths[i].axis == "y"){
        smwBgAnimY(smwBgPaths[i]);
      } else {
        smwBgAnimX(smwBgPaths[i]);
      }
    }, 400);
  });
}

function smwBgAnimY(obj, axis) {
  var t = obj.frame / obj.duration;
  t = easeOutQuad(t);
  var valRight = obj.startP + t * (obj.endP2 - obj.startP);
  var valLeft = obj.startP + t * (obj.endP1 - obj.startP);
  obj.frame++;

  obj.el.setAttribute("d", "M0,100 H100 V" + valRight + " L0," + valLeft + "");

  if (Math.abs(valRight) == obj.endP2) {
    cancelAnimationFrame(function () {
      smwBgAnimY(obj);
    });
  } else {
    requestAnimationFrame(function () {
      smwBgAnimY(obj);
    });
  }
}

function smwBgAnimX(obj) {
  var t = obj.frame / obj.duration;
  t = easeOutQuad(t);
  var valRight = obj.startP + t * (obj.endP2 - obj.startP);
  var valLeft = obj.startP + t * (obj.endP1 - obj.startP);
  obj.frame++;

  obj.el.setAttribute("d", "M100,100 V0 L" + valRight + ",0 L" + valLeft + ",100");

  if (Math.abs(valRight) == obj.endP2) {
    cancelAnimationFrame(function () {
      smwBgAnimX(obj);
    });
  } else {
    requestAnimationFrame(function () {
      smwBgAnimX(obj);
    });
  }
}

/*
 easings - thanks to Josh Marinacci & Robert Penner
 http://www.joshondesign.com/2013/03/01/improvedEasingEquations
*/
function easeInCubic(t) {
  return Math.pow(t, 3);
}
function easeOutCubic(t) {
  return 1 - easeInCubic(1 - t);
}
function easeInQuad(t) {
  return t * t;
}
function easeOutQuad(t) {
  return 1 - easeInQuad(1 - t);
}
