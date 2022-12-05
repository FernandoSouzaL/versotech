import { CountUp } from './countUp.min.js';

jQuery(document).ready(function ($) {

  // Slides
  var swiper = new Swiper('.js-slider-has-erp', {
    slidesPerView: 4,
    spaceBetween: 99,
    watchOverflow: true,
    pagination: {
      el: '.js-slider-has-erp .swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
    breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 40
        },
        600: {
          slidesPerView: 2,
          spaceBetween: 20
        },
    }
  });

  var swiper = new Swiper('.js-slider-not-erp', {
    slidesPerView: 4,
    spaceBetween: 99,
    watchOverflow: true,
    pagination: {
      el: '.js-slider-not-erp .swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 40
      },
      600: {
        slidesPerView: 2,
        spaceBetween: 20
      },
    }
  });

  var swiper = new Swiper('.js-slider-clients', {
    slidesPerView: 5,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 2500,
    },
    watchOverflow: true,
    pagination: {
      el: '.js-slider-clients .swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
    breakpoints: {
      1024: {
        slidesPerView: 4,
        spaceBetween: 40
      },
      600: {
        slidesPerView: 2,
        spaceBetween: 20
      },
    }
  });

  var swiper = new Swiper('.js-slider-testimonial', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    watchOverflow: true,
    pagination: {
      el: '.js-slider-testimonial .swiper-pagination',
      type: 'bullets',
      clickable: true,
    }
  });

  var swiper = new Swiper('.js-slider-gallery', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    watchOverflow: true,
    pagination: {
      el: '.js-slider-gallery .swiper-pagination',
      type: 'bullets',
      clickable: true,
    }
  });

  var swiper = new Swiper('.js-slider-solution', {
    slidesPerView: 3,
    watchOverflow: true,
    pagination: {
      el: '.js-slider-solution .swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
    breakpoints: {
      1023: {
        slidesPerView: 2,
      },
      600: {
        slidesPerView: 1,
      },
    }
  });

  var swiper = new Swiper('.js-slider-vacancies', {
    slidesPerView: 3,
    spaceBetween: 25,
    watchOverflow: true,
    pagination: {
      el: '.js-slider-vacancies .swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
    breakpoints: {
      1023: {
        slidesPerView: 2,
      },
      600: {
        slidesPerView: 1,
      },
    }
  });

  // Header
  $(window).on('scroll', function() {
    const $html = $('html'),
          $this = $(this);
    
    if ($this.scrollTop() != 0) {
      $html.addClass('is-active-header')
    } else {
      $html.removeClass('is-active-header')
    }
  });

  // Remove action
  $('.js-no-action> a').on('click', function(e) {
    e.preventDefault();
  });

  // Menu mobile
  $('.js-menu-mobile').on('click', function(e) {
    const $html = $('html');

    $html.toggleClass('is-active-menu');
  });

  // Goto
  $('.js-goto').on('click', function(e) {
    e.preventDefault();
    const id = $(this).attr('href');
    $('html').animate({scrollTop: $(id).offset().top - 100}, 'slow')
  });

  // Counter Numbers
  function CounterNumbers() {
    const options = {
      duration: 3,
      useEasing: true,
      useGrouping: true,
      separator: ".",
      decimal: ""
    };

    const counters = document.querySelectorAll(".js-number");

    counters.forEach((item) => {
      const value = item.dataset.value;
      const counter = new CountUp(item, value, options);
      counter.start();
    });
  }

  if(document.querySelector(".js-animated-numbers")) {
    new Waypoint({
      element: document.querySelector(".js-animated-numbers"),
      handler: function () {
        CounterNumbers();
      },
      offset: "100%"
    });
  }

  // Animeted on scroll
  $(window).on('scroll', function() {
    const winHeight = $(this).innerHeight(),
          winScroll = $(this).scrollTop() + winHeight;

    $('.js-animated').each(function() {
      const $this = $(this),
            elTop = $this.offset().top;

      if(winScroll >= elTop + winHeight / 3) {
        $this.addClass('is-visible');
      } else {
        $this.removeClass('is-visible');
      }
    });
  });

  // Animated start
  function start() {
    $('.js-animated-start').addClass('is-visible');
  }

  $(window).on('load', function() {
    window.setTimeout(function() {
      start();
    }, 1000);
  });

  // Play video yt
  $('.js-video-player').on('click', function() {
    const $video = $(this),
          videoSrc = $video.data('video'),
          videoPlayer = $video.children('.js-video-play');
    
    $video.addClass('is-playing');
    videoPlayer.attr('src', videoSrc);
  });

  //modal
  $('.js-open-modal').on('click', function(e) {
    e.preventDefault();
    const id = $(this).attr('href');

    $(id).addClass('is-visible-modal');
  });

  $('.c-modal').on('click', function(e) {
    if( $(e.target).is('.js-close-modal') || $(e.target).is('.c-modal') ) {
      e.preventDefault();
      $(this).removeClass('is-visible-modal');
    }
  });

  $(document).keyup(function(e) {
    if(e.which=='27'){
      $('.c-modal').removeClass('is-visible-modal');
    }
  });

  // MASKED INPUT
  $(".js-data").mask("99/99/9999");
  $(".js-cpf").mask("999.999.999-99");
  $(".js-cep").mask("99999-999");
  $(".js-cnpj").mask("99.999.999/9999-99");
  $('.js-phone').focusout(function(){
    var phone, element;
    element = $(this);
    element.unmask();
    phone = element.val().replace(/\D/g, '');
    if(phone.length > 10) {
      element.mask("(99) 99999-999?9");
    } else {
      element.mask("(99) 9999-9999?9");
    }
  }).trigger('focusout');

});