;(function($){

  var btnMenu = $('#btn-menu'),
      menu = $('.header__menu');
     
    new WOW().init();
      
       btnMenu.on('click', function(){
            menu.toggle();
           
        });
      
      $(".date").flatpickr({
      minDate: "today",
      onChange: function(selectedDates, dateStr, instance) {
           //$('.filters').find('form').submit();
        },
    });
       $('select').select2();


     menu.find(".menu-item-has-children").hoverIntent({
          over: function() {

                $(this).find(">.sub-menu").slideDown(200 );
              },
          out:  function() {
                
                $(this).find(">.sub-menu").slideUp(200);
              },
          timeout: 200

           });

    // SMOOTH ANCHOR SCROLLING
    var $root = $('html, body');
    $('a.anchor').click(function(e) {
        var href = $.attr(this, 'href');
        if (typeof($(href)) != 'undefined' && $(href).length > 0) {
            var anchor = '';

            if (href.indexOf("#") != -1) {
                anchor = href.substring(href.lastIndexOf("#"));
            }

            if (anchor.length > 0) {
                console.log($(anchor).offset().top);
                console.log(anchor);
                $root.animate({
                    scrollTop: $(anchor).offset().top
                }, 500, function() {
                    window.location.hash = anchor;
                });
                e.preventDefault();
            }
        }
    });

    // mini-contact form
  /*$('.mini-contact__btn').on('click', function (e) {
      
      $(this).toggleClass('open');
      $('.mini-contact').toggleClass('open');;    
  });
  
  $('.mini-contact__close').on('click', function (e) {
      
      $('.mini-contact__btn').removeClass('open');
      $('.mini-contact').removeClass('open');    
  });*/

   // Forms with ajax process
    $('form[data-remote]').on('submit', function(e){
        var form =$(this);
        var method = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        form.find('.loader').show();
        $.ajax({
            type: method,
            url: url,
            data: form.serialize(),
            success: function(){
                var message = form.data('remote-success-message');
                form.find('.loader').hide();
                if(message)
                {

                    $('.response').removeClass('message-error').addClass('message-success').html(message).fadeIn(300).delay(4500).fadeOut(300);
                }
            },
            error:function(){
                form.find('.loader').hide();
                $('.response').removeClass('message-success').addClass('message-error').html('Whoops, looks like something went wrong.').fadeIn(300).delay(4500).fadeOut(300);

            }
        });

        limpiaForm(form);

        e.preventDefault();
    });

    $('input[data-confirm], button[data-confirm]').on('click', function(e){
       var input = $(this);

        input.prop('disabled','disabled');

        if(! confirm(input.data('confirm'))){
            e.preventDefault();
        }
    });

    function limpiaForm(miForm) {

        // recorremos todos los campos que tiene el formulario
        $(":input", miForm).each(function() {
            var type = this.type;
            var tag = this.tagName.toLowerCase();
            //limpiamos los valores de los campos…
            if (type == 'text' || type == 'password'  || type == 'email' || tag == 'textarea')
                this.value = "";
            // excepto de los checkboxes y radios, le quitamos el checked
            // pero su valor no debe ser cambiado
            else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
            // los selects le ponesmos el indice a -
            else if (tag == 'select')
                this.selectedIndex = -1;
        });
    }
      
      
      

    //$(".chosen-select").chosen();
    
    //SCROLL WINDOW FUNCTIONALITY

    /*$(window).scroll(function () {
          if ($(this).scrollTop() > 50) {
              $('.header').addClass("header--fixed");
          } else {
              $('.header').removeClass("header--fixed");
          }
      });*/

    
    $('.intro__video').css('opacity', '0');
    $(window).load(function() {
     
      
      // $('.preloader').addClass('animated fadeOut').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      //   $('.preloader').hide();
      //   $('.intro__video').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      //     //$('.intro__video').css('opacity', '1');
      //     //$('.intro-tables').addClass('animated fadeInUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
      //   });
      // });
       $('.intro__video').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
         
        });
      resizes();

    });

    $(window).resize(resizes);

    function resizes()
     {
      
      
        if(getWindowWidth() > 1350){
            $('.intro__video video').height('auto').width($("body").width() + 90);
            $('.intro__video iframe').height('100%').width($("body").width() + 90);
        }
          else{
            $('.intro__video video').height($("body").height() + 90).width('auto');
            $('.intro__video iframe').height($("body").height() + 90).width('100%');
          }
        
          
      

     }

// FUNCTION FOR More info

    var btnIncludes = $('.product-description-accordion-button');
    var IncludesContent = $('.product-description-accordion-content');
    
    IncludesContent.addClass('hidden');

    btnIncludes.on('click', function (e) {
        $(this)
            .next()
            .slideToggle(200);
            /*.siblings('.product-description-accordion-content')
            .slideUp(200);*/

    });

    $(".owl-carousel").owlCarousel({
      animateOut: 'fadeOut',
      items : 1,
      autoplay : true,
      autoplayTimeout: 4000,
      loop : true,
      nav : true,
      navText : ['','']
      /*onChange : function (e) {
        console.log(e.target);
        $('.owl-item.active span').addClass('animated');
        $('.owl-item.active h1').addClass('animated');
      }*/
      /*slideSpeed : 300,
      paginationSpeed : 400,*/
      /*singleItem:true*/
  });

     $('.tour-popup-link').magnificPopup({
        type: 'inline',
        midClick: true,
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {

                this.st.mainClass = 'mfp-zoom-out';
                $('body').addClass('mfp-open');
            },
            beforeClose: function() {

               
                $('body').removeClass('mfp-open');
            }

        }

       
    });

     fillSelectTour();
    fillSelectTourContact();
    function fillSelectTourContact() {


        $.ajax({
            type: 'GET',
            url: '/api/get_posts/?post_type=product&count=-1',//'/api/get_post/?id='+ post_id +'&post_type=tour',

            success: function (data) {
                console.log(data)

                var items = [];

                var select = $('select[name="subject[]"]').empty();
                $.each(data.posts, function (i, item) {
                    select.append('<option value="'
                        + $.trim(item.title) + '">'
                        + item.title
                        + '</option>');



                });


                select.prepend('<option value="General Information"><span style="color:red;">General Information</span></option>');

            },
            error: function () {
                console.log('error cargando los tours')
            }
        });

    }
  function fillSelectTour(){
         
        
          $.ajax({
                type: 'GET',
                url: '/api/get_posts/?post_type=product&count=-1',//'/api/get_post/?id='+ post_id +'&post_type=tour',
                
                success: function(data){
                    console.log(data)

                    var items = [];

                var select = $('select[name="tours[]"]').empty();
                $.each(data.posts, function(i,item) {
                  select.append( '<option value="'
                                       + $.trim(item.slug) + '">'
                                       + item.title
                                       + '</option>' ); 


           
                });
          

                //select.prepend('<option value="" selected><span style="color:red;">--</span></option>');
                    
                },
                error:function(){
                    console.log('error cargando los tours')
                }
            });
          
    }

    $('.tour-popup-link').on('click',function (e) {
      
    
      //console.log($(this).data('activitie'))
      //$('#tour-popup').find('select[name="tour[]"] option[value="'+ $(this).attr('data-title') +'"]').attr("selected",true).change();
      $('#tour-popup').find('select[name="tours[]"] option[value="'+ $(this).attr('data-title') +'"]').attr("selected",true).change();
      
      console.log($('#tour-popup').find('select[name="tours[]"] option[value="'+ $(this).attr('data-title') +'"]'))
      

      });





})(jQuery);


function getScrollerWidth() {
  var scr = null;
  var inn = null;
  var wNoScroll = 0;
  var wScroll = 0;

  // Outer scrolling div
  scr = document.createElement('div');
  scr.style.position = 'absolute';
  scr.style.top = '-1000px';
  scr.style.left = '-1000px';
  scr.style.width = '100px';
  scr.style.height = '50px';
  // Start with no scrollbar
  scr.style.overflow = 'hidden';

  // Inner content div
  inn = document.createElement('div');
  inn.style.width = '100%';
  inn.style.height = '200px';

  // Put the inner div in the scrolling div
  scr.appendChild(inn);
  // Append the scrolling div to the doc
  document.body.appendChild(scr);

  // Width of the inner div sans scrollbar
  wNoScroll = inn.offsetWidth;
  // Add the scrollbar
  scr.style.overflow = 'auto';
  // Width of the inner div width scrollbar
  wScroll = inn.offsetWidth;

  // Remove the scrolling div from the doc
  document.body.removeChild(
    document.body.lastChild);

  // Pixel width of the scroller
  return (wNoScroll - wScroll);
}

function getWindowHeight() {
  var windowHeight=0;
  if (typeof(window.innerHeight)=='number') {
    windowHeight=window.innerHeight;
  } else {
    if (document.documentElement && document.documentElement.clientHeight) {
      windowHeight = document.documentElement.clientHeight;
    } else {
      if (document.body && document.body.clientHeight) {
        windowHeight=document.body.clientHeight;
      }
    }
  }
  return windowHeight;
}

function getWindowWidth() {
  var windowWidth=0;
  if (typeof(window.innerWidth)=='number') {
    windowWidth=window.innerWidth;
  } else {
    if (document.documentElement && document.documentElement.clientWidth) {
      windowWidth = document.documentElement.clientWidth;
    } else {
      if (document.body && document.body.clientWidth) {
        windowWidth=document.body.clientWidth;
      }
    }
  }
  return windowWidth;
}

