$(document).ready(function(){
    var $scrollbar      = $("#scrollbar1"),
        $shopcart       = $(".list-cart"),
        $btnAdd         = $("#btnAddcart"),
        $bgCart         = $('#bg-cart'),
        $closeAll       = $('#btnClose-cart'),
        active          = "active",
        wWidth          = $(window).width(),
        wHeight         = $(window).height();
        window.timer    = "";

    // Set background width and height
    $bgCart.css({
        width   : wWidth,
        height  : wHeight
    });

    // Show shopcart when mouse over the shopcart menu
    // active  autoHide after mouse leaving
    $(".img-cart, .checkcart, .bnt-see-cart").on("click", function(){
        $bgCart.fadeIn('fast');
        $shopcart.stop(true,true).fadeIn('fast').addClass(active);
        $scrollbar.tinyscrollbar({sizethumb: 33});

    });

    $(".cart_content").hover(
        function(){
            //clear timeout
            clearTimeout(window.timer);
        },
        function(e){
            autoHide( e );
        }
    );

    // Close shopcart and hide background clicking on background
    $bgCart.on("click", function(e){
        $shopcart.slideUp('fast').removeClass( active );
        $(this).fadeOut('fast');
        clearTimeout(window.timer);
    });

    // Close shopcart and hide background clicking on close All
    $closeAll.on("click", function(e){
        $shopcart.slideUp('fast').removeClass( active );
        $bgCart.fadeOut('fast');
        clearTimeout(window.timer);
    });

    // Show shopcart and background
    $btnAdd.on("click", function( e ){
        $bgCart.show('fast');
        $shopcart.stop(true,true).fadeIn('fast').addClass(active);
        $scrollbar.tinyscrollbar();
        autoHide( e );
    });
    
});

function autoHide(e){
    var $this           = $('.list-cart'),
        $bgCart         = $('#bg-cart'),
        $thisCor        = $this.offset(),
        XX              = $thisCor.left + $this.width(),
        YY              = $thisCor.top + $this.height(),
        active          = "active";
        window.mouseX   = e.pageX;
        window.mouseY   = e.pageY;

    if( !((window.mouseX > $thisCor.left && window.mouseX < XX) &&
        (window.mouseY > $thisCor.top && window.mouseY < YY) ) ){
        if($this.hasClass( active )){
            //console.log('start time out');
            window.timer = setTimeout(function(){
                $this.slideUp('fast',function(){
                    $this.removeClass( active );
                    $bgCart.fadeOut('fast');
                });
            },2500);
        }
    }

}

$(document).ready(function() {
    $(".fancybox").fancybox({
          openEffect  : 'none',
          closeEffect : 'none'
      });

    /*********** BANNER *********/
    $("#foo1").carouFredSel({
      circular: true,
      infinite: true,
      //responsive: true,
      auto    : true, /*{
              pauseOnHover: "resume"
          },*/
      //pagination  : "#block1_pag",
      scroll      :
          {
              duration    :1200,
              fx          : "crossfade"
          },
      items       :
          {
              visible     : 1,
              width       : 715,
              height      : 334
          }
    });

    /*$('.products ul li').each(function() {
      animationHover(this, 'zoomIn');
    });*/

  
    $('#scrollbar1, #scrollbar2').tinyscrollbar({sizethumb: 33});

    $(".btnCookie").click(function(event) {
      event.preventDefault();
      $(".CookieInfo").hide('slow/400/fast', function() {});
    });

    //check out

    $(".w_Address").hide();
    $(".btnLevering").show();
    
    $('.btnLevering').click(function(event){
       event.preventDefault();
      $(".w_Address").slideToggle();
    });

    $("#w_privat").show;
    $("#w_erhverv").hide();
    $("#w_offentlig").hide();

    // How it all works
    $("#choicemaker").change(function () {
      $value = $("#choicemaker")[0].selectedIndex;
      // You can also use $("#ChoiceMaker").val(); and change the case 0,1,2: to the values of the html select options elements
      switch ($value)
      {
        case 0:
            $("#w_privat").show();
            $("#w_erhverv").hide();
            $("#w_offentlig").hide();
        break;
        case 1:
            $("#w_erhverv").show();
            $("#w_privat").hide();
            $("#w_offentlig").hide();
        break;
        case 2:
            $("#w_offentlig").show();
            $("#w_privat").hide();
            $("#w_erhverv").hide();
        break;
      }
    });

    //Product detail zoom
    $('.imgZoom').prettyPhoto({
        social_tools:'',
        show_title: true,

    });

    //Product change thumnail
    changeThumnail();
  });

   function changeThumnail(){
    var $imgLarge = $('#btnLargeImage'),
        $imgLarge_icon = $('#btnZoomIcon');
    $('#thumblist img').each( function(){
        var $this = $(this),
            imgLink = $this.attr('src');
        $this.click(function(e){
            e.preventDefault();
            $imgLarge.attr('href',imgLink);
            $imgLarge.find('img').attr('src',imgLink);
            $imgLarge_icon.attr('href',imgLink);
        });
    });
  };

  function animationHover(element, animation){
      element = $(element);
      element.hover(
          function() {
              element.addClass('animated ' + animation);        
          },
          function(){
              //wait for animation to finish before removing classes
              window.setTimeout( function(){
                  element.removeClass('animated ' + animation);
              }, 2000);         
          });
  };
