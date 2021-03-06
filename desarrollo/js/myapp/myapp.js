//___________________________________ [ Preload ] ___________________________________//
//-----------------------------------------------------------------------------------------//
jQuery(window).load(function() {
jQuery("#status").fadeOut();
jQuery("#preloader").delay(1000).fadeOut("slow");
})
//-------------------------------------------------------------------------------------------//

//________________________________________________________________________________________________//
//------------------------------------ [ irviN App ] -------------------------------------//

$(document).on('ready',function() {

    //-------------- [Scroll] --------------//
    var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome/') > -1;
    var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox/') > -1;
    var is_safari = navigator.userAgent.toLowerCase().indexOf('safari/') > -1;
    var is_opera = navigator.userAgent.toLowerCase().indexOf('opera/') > -1;
    var is_ie = navigator.userAgent.toLowerCase().indexOf('msie') > -1;
    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
    if (isMobile.any()) {
    } else {
        /* NiceScroll proys */
        $("html").niceScroll({
            touchbehavior:false,
            cursorcolor:"#bababa",
            cursoropacitymax:1,
            cursorborder:"0px solid #000000",
            cursorwidth:13,
            background:'#ffffff',
            cursorborderradius:"3px",
            zindex:9999
        });
        switch (true) {
            case (is_chrome):
                break;
            case (is_firefox):
                break;
            case (is_safari):
                break;
            case (is_opera):
                break;
            default:
                $('body').addClass('iexplorer');
                break;
        }
    };
    //-------------- [Fin Scroll] --------------//

    //-------------- [ Wow ] --------------//
    var wow = new WOW(
      {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       0,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true,       // act on asynchronously loaded content (default is true)
        callback:     function(box) {
          // the callback is fired every time an animation is started
          // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null // optional scroll container selector, otherwise use window
      }
    );
    wow.init();
    //-------------- [ Fin - Wow ] --------------//


    //-------------- [ Carusel con animacion ] --------------//
    var owl = $('.owlColumnista');
    owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        autoplay: true,
        lazyLoad: true,
        autoplayTimeout: 3500,
        autoplayHoverPause: false,
        smartSpeed:450,
        responsive: {
            0: {
                items: 1,
                dots: false,
                nav:true
            },
            600: {
                items: 1,
                dots: false,
                nav:true
            },
            900: {
                items: 2,
                dots: false,
                nav:true
            },
            992: {
                items: 3,
                dots: false,
                nav:true
            }
        }
    });

    var owl = $('.owlBlogueros');
    owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        autoplay: true,
        lazyLoad: true,
        autoplayTimeout: 3500,
        autoplayHoverPause: false,
        smartSpeed:450,
        responsive: {
            0: {
                items: 1,
                dots: false,
                nav:true
            },
            450: {
                items: 1,
                dots: false,
                nav:true
            },
            992: {
                items: 1,
                dots: false,
                nav:true
            }
        }
    });


    var owl = $('.owlYt');
    owl.owlCarousel({
        items:3,
        loop: true,
        margin: 0,
        autoplay: true,
        lazyLoad: true,
        autoplayTimeout: 3500,
        autoplayHoverPause: false,
        smartSpeed:450,
        responsive: {
            0: {
                items: 3,
                dots: true,
                nav:true
            }
        }
    });

    var owl = $('.owlOneItem');
    owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        autoplay: true,
        lazyLoad: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: false,
        smartSpeed:450,
        responsive: {
            0: {
                items: 1,
                dots: false,
                nav:true
            }
        }
    });
    //-------------- [ Carusel con animacion ] --------------//

    $('.owlOneItem').find('.owl-controls').addClass('arroOWL');
    $('.owlBlogueros').find('.owl-controls').addClass('arroOWL');

    //-------------- [ Eliminando saltos de line ] --------------//
    $('.formBox').find('br').remove();
    //-------------- [ Fin - Eliminando saltos de line ] --------------//

    //-------------- [ Validator ] --------------//
    $("#ok").hide();

    function smallmove(){
      var $small = $('.input--kohana').find('small');
      for (var a=0; a < $small.length; a++){
         $small.eq(a).closest('.col').append($small.eq(a));
      }
    }
    /* Formularios */
    $('.formBox').find('form').addClass('formGeneral');
    $('.formGeneral').validate({
        rules: {
          pnombre: { required: true, minlength: 2},
          pcorreo: { required: true, email: true},
          pempresa: { required: true, minlength: 2},
          ptelefono: { required: true,minlength: 6,number:true},
          psmg: { required:true}
        },
        messages: {
          pnombre: "Campo invalido",
          pcorreo: "Campo invalido",
          pempresa: "Campo invalido",
          ptelefono: "Campo invalido",
          psmg: "Campo invalido"
           
        },
        invalidHandler: function(event){
          setTimeout(function(){
              smallmove();
          },10);
        }
    });
    //-------------- [ FIN Validator ] --------------//

    //-------------- [ Plugin de height ] --------------//
    equalheight = function(container){

    var currentTallest = 0,
         currentRowStart = 0,
         rowDivs = new Array(),
         $el,
         topPosition = 0;
     $(container).each(function() {

       $el = $(this);
       $($el).height('auto')
       topPostion = $el.position().top;

       if (currentRowStart != topPostion) {
         for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
           rowDivs[currentDiv].height(currentTallest);
         }
         rowDivs.length = 0; // empty the array
         currentRowStart = topPostion;
         currentTallest = $el.height();
         rowDivs.push($el);
       } else {
         rowDivs.push($el);
         currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
      }
       for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
         rowDivs[currentDiv].height(currentTallest);
       }
     });
    }

    $(window).load(function() {
        if ($(window).width() >= 600) {
          equalheight('.teamItem');
          equalheight('.itemModNot');
          equalheight('.notItemHome');
          equalheight('.blogerItem');
          // equalheight('.notItemHome img');
        }
    });

    $(window).resize(function(){
        if ($(window).width() >= 600) {
          equalheight('.teamItem');
          equalheight('.itemModNot');
          equalheight('.notItemHome');
          equalheight('.blogerItem');
          // equalheight('.notItemHome img');
        }
    });
    //-------------- [ FIN - Plugin de height ] --------------//

    //------------------- [ Agregar Link ] --------------------//
    $('.linkTxtJs').find('a').addClass('linkTxt');
    //------------------- [ Fin - Agregar Link ] --------------------//

    //------------------- [ Menu Principal ] --------------------//
    $('#hamBurger').on('click',function(){
        $('#mainMenu').toggleClass('mainMenuAct');
        $('.searchFixed').removeClass('searchFixedAct');
    });
    $('#menu-menu-principal a').on('click',function(){
       $('#mainMenu').removeClass('mainMenuAct');
    });
    $('#searchBox').on('click',function(){
       $('.searchFixed').toggleClass('searchFixedAct');
       $('#mainMenu').removeClass('mainMenuAct');
       $('#hsearch').focus();
       $('.menu-icon').removeClass('isOpen');
    });
    $('.menu-icon').click(function(e){
        e.preventDefault();
        $(this).toggleClass('isOpen');
    });
    //------------------- [ Fin - Menu Principal ] --------------------//

    //------------------- [ Slider ] --------------------//
    function sliderFeat(nameCont){
      $(nameCont).addClass('sliderFeatHide');
      $(nameCont).eq(0).addClass('sliderFeatAct');
    }
    sliderFeat('#sliderFeat li');
    
    // Tabulador <--------------------------//
    $('#sliderList li').on('click',function(){
      var $li = $(this);
      var itemLi = $li.index();
      $('#sliderList li').removeClass('sliderListAct');
      $li.addClass('sliderListAct');
      $('#sliderFeat').find('li').addClass('sliderFeatHide').removeClass('sliderFeatAct');
      $('#sliderFeat').find('li').eq(itemLi).addClass('sliderFeatAct').removeClass('sliderFeatHide');
    });
    $('#sliderList li').eq(0).click();

    //------------------- [ Slider Hover ] --------------------//
    $('.sliderList li').mouseenter(function(){
      var $li = $(this);
      var itemLi = $li.index();
      $('#sliderList li').removeClass('sliderListAct');
      $li.addClass('sliderListAct');
      $('#sliderFeat').find('li').addClass('sliderFeatHide').removeClass('sliderFeatAct');
      $('#sliderFeat').find('li').eq(itemLi).addClass('sliderFeatAct').removeClass('sliderFeatHide');
    });
    //------------------- [ Fin - Slider Hover ] --------------------//

    // Datepicker
    // $('.datepicker').pickadate({
    //     selectMonths: true, // Creates a dropdown to control month
    //     selectYears: 15 // Creates a dropdown of 15 years to control year
    // });

    var from_$input = $('.datepicker').pickadate({
      selectMonths: true,
      selectYears: true,
      labelMonthNext: 'Próximo mes',
      labelMonthPrev: 'Mes anterior',
      labelMonthSelect: 'Seleccione un mes',
      labelYearSelect: 'Selecione un año',
      monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
      monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Ago', 'Nov', 'Dis' ],
      weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado' ],
      weekdaysShort: [ 'Dom', 'Lu', 'Mar', 'Mie', 'Ju', 'Vi', 'Sab' ],
      weekdaysLetter: [ 'D', 'L', 'M', 'M', 'J', 'V', 'S' ],
      today: 'Hoy',
      format: 'dd/mm/yyyy',
      // format: 'yyyy/mm/dd',
      clear: 'Limpiar',
      close: 'Cerrar',
      max: -1,
      min: false,
      onSet: function( arg ){
        if ( 'select' in arg ){ //prevent closing on selecting month/year
          this.close();
        }
      }
    });


    // Collapse
    $('.collapsible').collapsible({});

    // BackToTop
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
      //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
      offset_opacity = 1200,
      //duration of the top scrolling animation (in ms)
      scroll_top_duration = 700,
      //grab the "back to top" link
      $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function(){
      ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
      if( $(this).scrollTop() > offset_opacity ) { 
        $back_to_top.addClass('cd-fade-out');
      }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event){
      event.preventDefault();
      $('body,html').animate({
        scrollTop: 0 ,
        }, scroll_top_duration
      );
    });

    // Mover la publicidad al medio del  Single(Default)
    var $long = $('.campTxtPub p');
    var lengt = $long.length;
    var numEst;
    if ((lengt % 2) == 0){
      numEst = lengt/2  
    }
    else {
      numEst = parseInt(lengt/2) + 1;
    }
    $long.eq(numEst).append($('.pubSingle .publong'));

    // Eliminando flecha de destacados
    if($(window).width() < 600) {
       $('.rowResp').eq(0).find('.icoResp').remove();
    }


});
    
    //------------------- [ Clasie ] --------------------//
    (function() {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
            (function() {
                // Make sure we trim BOM and NBSP
                var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function() {
                    return this.replace(rtrim, '');
                };
            })();
        }

        [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
            // in case the input is already filled..
            if( inputEl.value.trim() !== '' ) {
                classie.add( inputEl.closest('.input--kohana'), 'input--filled' );
            }

            // events:
            inputEl.addEventListener( 'focus', onInputFocus );
            inputEl.addEventListener( 'blur', onInputBlur );
        } );
        [].slice.call( document.querySelectorAll( 'textarea.input__field' ) ).forEach( function( inputEl ) {
            // in case the input is already filled..
            if( inputEl.value.trim() !== '' ) {
                classie.add( inputEl.closest('.input--kohana'), 'input--filled' );
            }

            // events:
            inputEl.addEventListener( 'focus', onInputFocus );
            inputEl.addEventListener( 'blur', onInputBlur );
        } );

        function onInputFocus( ev ) {
            classie.add( ev.target.closest('.input--kohana'), 'input--filled' );
        }

        function onInputBlur( ev ) {
            if( ev.target.value.trim() === '' ) {
                classie.remove( ev.target.closest('.input--kohana'), 'input--filled' );
            }
        }
    })();


    //------------------- [ Fin - Clasie ] --------------------//


//--------------------------------- [ irviNApp - FIN ] ---------------------------------//
//______________________________________________________________________________________//
