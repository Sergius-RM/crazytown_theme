jQuery.noConflict();
(function ($) {
  document.addEventListener('DOMContentLoaded', function () {
    const topLevelItems = document.querySelectorAll('.dropdown');

    topLevelItems.forEach(function (topLevelItem) {
      const subMenus = topLevelItem.querySelectorAll('.sub-menu');
      const triggerElement = document.createElement('span');
      triggerElement.classList.add('menu-trigger');
      topLevelItem.appendChild(triggerElement);

      topLevelItem.addEventListener('click', function (event) {
        const target = event.target;

        if (target === triggerElement) {
          event.preventDefault();

          if (window.innerWidth <= 845) {
            const isSubMenuOpen = subMenus[0].style.display === 'block';

            closeOtherSubMenus(topLevelItem);

            if (isSubMenuOpen) {
              subMenus.forEach(function (subMenu) {
                subMenu.style.display = 'none';
              });
            } else {
              subMenus.forEach(function (subMenu) {
                subMenu.style.display = 'block';
              });
            }
          }
        }
      }, { passive: true }); // Добавляем флаг passive

      topLevelItem.addEventListener('mouseenter', function (event) {
        if (window.innerWidth > 845) {
          const isSubMenuOpen = subMenus[0].style.display === 'block';

          closeOtherSubMenus(topLevelItem);

          if (!isSubMenuOpen) {
            subMenus.forEach(function (subMenu) {
              subMenu.style.display = 'block';
            });
          }
        }
      }, { passive: true }); // Добавляем флаг passive

      subMenus.forEach(function (subMenu) {
        subMenu.style.display = 'none';
      });
    });

    function closeOtherSubMenus(currentTopLevelItem) {
      topLevelItems.forEach(function (item) {
        if (item !== currentTopLevelItem) {
          const subMenus = item.querySelectorAll('.sub-menu');
          subMenus.forEach(function (subMenu) {
            subMenu.style.display = 'none';
          });
        }
      });
    }
  }, { passive: true }); // Добавляем флаг passive

  // WOW script
  new WOW().init();

  ///tiny-slider
  $('.slide_list').each(function (index, element) {
    var slider = tns({
      container: element,
      edgePadding: 10,
      autoHeight: true,
      items: 1,
      loop: true,
      swipeAngle: false,
      speed: 500,
      gutter: 80,
      mouseDrag: true,
      autoplay: true,
      controls: true,
      nav: false,
      responsive: {
        540: {
          items: 1,
          edgePadding: 150,
        },
        1200: {
          items: 1,
          edgePadding: 200,
        },
        1440: {
          items: 1,
          edgePadding: 150,
        },
        1500: {
          items: 1,
          edgePadding: 350,
        },
      }
    });
  });

  $('.related_articles_list').each(function (index, element) {
    var slider2 = tns({
      container: element,
      edgePadding: 50,
      autoHeight: true,
      items: 1,
      loop: false,
      swipeAngle: false,
      speed: 500,
      gutter: 20,
      mouseDrag: true,
      autoplay: false,
      controls: true,
      nav: false,
      responsive: {
        640: {
          items: 2,
          edgePadding: 50,
        },
        768: {
          items: 3,
          edgePadding: 50,
        },
        980: {
          items: 3,
          edgePadding: 100,
        },
        1400: {
          items: 3,
          edgePadding: 300,
        },
        2000: {
          items: 2,
          edgePadding: 400,
        }
      }
    });
  });

  $('.community_member_slider').each(function (index, element) {
    var slider3 = tns({
      container: element,
      autoHeight: true,
      items: 1,
      loop: true,
      swipeAngle: false,
      speed: 500,
      gutter: 20,
      mouseDrag: true,
      autoplay: false,
      controls: true,
      nav: true,
      navPosition: 'bottom'
    });
  });

  $('.sijainnit_articles_list').each(function (index, element) {
    var slider4 = tns({
      container: element,
      edgePadding: 50,
      autoHeight: true,
      items: 1,
      loop: false,
      swipeAngle: false,
      speed: 500,
      gutter: 20,
      mouseDrag: true,
      autoplay: false,
      controls: true,
      nav: false,
      responsive: {
        640: {
          items: 2,
          edgePadding: 50,
        },
        768: {
          items: 2,
          edgePadding: 100,
        },
        980: {
          items: 2,
          edgePadding: 100,
        },
        1400: {
          items: 2,
          edgePadding: 300,
        },
        2000: {
          items: 2,
          edgePadding: 400,
        }
      }
    });
  });


  const swiper = new Swiper('.swiper_highlighted', {
    slidesPerView: 1,
    spaceBetween: 40,
    centeredSlides: true,

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    on: {
      slideChangeTransitionEnd: function() {
        const slides = this.slides;
        const currentSlideIndex = this.activeIndex;
        // Проверяем, что текущий слайд близок к третьему с конца
        if (slides.length - currentSlideIndex <= 3) {
          // Отключаем прокрутку к следующему слайду
          this.allowSlideNext = false;
        } else {
          // Включаем прокрутку к следующему слайду
          this.allowSlideNext = true;
        }
      }
    },
    // Опции
    breakpoints: {
      480: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      980: {
        slidesPerView: 4,
      }
    }
  });

  const swiper_location = new Swiper('.swiper_location', {
    slidesPerView: 1,
    spaceBetween: 20,
    centeredSlides: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    // Опции
    breakpoints: {
      480: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      980: {
        slidesPerView: 3,
      }
    }
  });

})(jQuery);
