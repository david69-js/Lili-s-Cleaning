// Menu
function cleaning_specialist_openNav() {
  jQuery(".sidenav").addClass('show');
}
function cleaning_specialist_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function cleaning_specialist_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const cleaning_specialist_nav = document.querySelector( '.sidenav' );

      if ( ! cleaning_specialist_nav || ! cleaning_specialist_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...cleaning_specialist_nav.querySelectorAll( 'input, a, button' )],
        cleaning_specialist_lastEl = elements[ elements.length - 1 ],
        cleaning_specialist_firstEl = elements[0],
        cleaning_specialist_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && cleaning_specialist_lastEl === cleaning_specialist_activeEl ) {
        e.preventDefault();
        cleaning_specialist_firstEl.focus();
      }

      if ( shiftKey && tabKey && cleaning_specialist_firstEl === cleaning_specialist_activeEl ) {
        e.preventDefault();
        cleaning_specialist_lastEl.focus();
      }
    } );
  }
  cleaning_specialist_keepFocusInMenu();
} )( window, document );

(function ($) {

    $(window).load(function () {
        $("#pre-loader").delay(500).fadeOut();
        $(".loader-wrapper").delay(1000).fadeOut("slow");

    });

    $(document).ready(function () {

       // $(".toggle-button").click(function () {
       //      $(this).parent().toggleClass("menu-collapsed");
       //  });

        /*--- adding dropdown class to menu -----*/
        $("ul.sub-menu,ul.children").parent().addClass("dropdown");
        $("ul.sub-menu,ul.children").addClass("dropdown-menu");
        $("ul#menuid li.dropdown a,ul.children li.dropdown a").addClass("dropdown-toggle");
        $("ul.sub-menu li a,ul.children li a").removeClass("dropdown-toggle");
        $('nav li.dropdown > a, .page_item_has_children a').append('<span class="caret"></span>');
        $('a.dropdown-toggle').attr('data-toggle', 'dropdown');

        /*-- Mobile menu --*/
        if ($('#site-navigation').length) {
            $('#site-navigation .menu li.dropdown,li.page_item_has_children').append(function () {
                return '<i class="bi bi-caret-down-fill" aria-hd="true"></i>';
            });
            $('#site-navigation .menu li.dropdown .bi,li.page_item_has_children .bi').on('click', function () {
                $(this).parent('li').children('ul').slideToggle();
            });
        }

        /*-- tooltip --*/
        $('[data-toggle="tooltip"]').tooltip();

        /*-- scroll Up --*/
        jQuery(document).ready(function ($) {
            $(document).on('click', '.btntoTop', function (e) {
                e.preventDefault();
                $('html, body').stop().animate({ scrollTop: 0 }, 700);
            });

            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 200) {
                    $('.btntoTop').addClass('active');
                } else {
                    $('.btntoTop').removeClass('active');
                }
            });
        });


        /*-- Reload page when width is between 320 and 768px and only from desktop */
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;
        $(window).on('resize', function () {
            var win = $(this); //this = window
            if (win.width() > 320 && win.width() < 991 && isMobile == false && !$("body").hasClass("elementor-editor-active")) {
                location.reload();
            }
        });
    });

})(this.jQuery);

// search form

    document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.getElementById("search-icon");
    const searchForm = document.getElementById("search-form");

    if (searchIcon && searchForm) {
        searchIcon.addEventListener("click", function () {
            searchForm.style.display = searchForm.style.display === "block" ? "none" : "block";
        });
    }
    });

// slider section

jQuery('document').ready(function(){
    var owl = jQuery('#main-banner-wrap .owl-carousel');
        owl.owlCarousel({
        autoplay :false,
        lazyLoad: true,
        autoplayTimeout: 9000,
        loop: false,
        dots:true,
        navText : ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],
        nav:false,
        items:1,       
        responsive:{
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      },
    }
    });
});

// custom-header-text
(function( $ ) {
    // Update site title and description color in real-time
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( newval ) {
            if ( 'blank' === newval ) {
                $( '.site-title a, .site-description' ).css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $( '.site-title a, .site-description' ).css({
                    'clip': 'auto',
                    'position': 'relative',
                    'color': newval
                });
            }
        });
    });
})( jQuery );

// timer
document.addEventListener("DOMContentLoaded", function () {
    let countdownElement = document.getElementById("countdown-timer");

    if (countdownElement) {
        let targetTimestamp = countdownElement.getAttribute("data-target");

        if (!targetTimestamp || targetTimestamp === "0") {
            countdownElement.innerHTML = "<span>00 : 00 : 00 : 00</span>";
            return;
        }

        function cleaning_specialist_updateCountdown() {
            let targetTime = new Date(parseInt(targetTimestamp) * 1000);
            let now = new Date().getTime();
            let difference = targetTime - now;

            if (difference > 0) {
                let days = Math.floor(difference / (1000 * 60 * 60 * 24));
                let hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((difference % (1000 * 60)) / 1000);

                countdownElement.innerHTML = `<span>${pad(days)}d : ${pad(hours)}h : ${pad(minutes)}m : ${pad(seconds)}s</span>`;
            } else {
                countdownElement.innerHTML = "<span>Expired</span>";
            }
        }

        function pad(num) {
            return String(num).padStart(2, '0');
        }

        cleaning_specialist_updateCountdown();
        setInterval(cleaning_specialist_updateCountdown, 1000);
    }
});

// custom-logo
( function( $ ) {
    wp.customize( 'cleaning_specialist_logo_width', function( value ) {
        value.bind( function( newVal ) {
            $( '.logo .custom-logo' ).css( 'max-width', newVal + 'px' );
        } );
    } );
} )( jQuery );