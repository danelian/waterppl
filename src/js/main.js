document.addEventListener("DOMContentLoaded", function (event) {
  /**
   * Инициализация плагина AOS
   */
  // AOS.init();

  document.addEventListener('wpcf7mailsent', function (event) {
    document.querySelector('#popup-success').style.display = 'block';
  }, false);
  document.querySelectorAll('#popup-close-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelector('#popup-success').style.display = 'none';
    });
  });
  document.addEventListener("click", (event) => {
    document.querySelector('#popup-success').style.display = 'none';
  });
  /**
   * Burger Menu
   */
  const navMenu = document.getElementById('nav-menu'),
    navToggle = document.getElementById('nav-toggle'),
    navToggleIcon = document.querySelector('#nav-toggle i');
  navToggle.addEventListener('click', () => {
    navMenu.classList.toggle('show-menu');
    navToggleIcon.classList.toggle('icon-close');
  });
  const navLink = document.querySelectorAll('.nav-menu a')
  const linkAction = () => {
    const navMenu = document.getElementById('nav-menu')
    navMenu.classList.remove('show-menu')
  }
  navLink.forEach(n => n.addEventListener('click', linkAction))
  document.addEventListener("click", function (event) {
    if (!navMenu.contains(event.target) && !navToggle.contains(event.target)) {
      navMenu.classList.remove("show-menu");
      navToggleIcon.classList.remove('icon-close');
    }
  });


  /**
   * Accordion
   */
  const accordionItems = document.querySelectorAll('.accordion')
  accordionItems.forEach((item) => {
    const accordionHeader = item.querySelector('.accordion h3 button')
    accordionHeader.addEventListener('click', () => {
      const openItem = document.querySelector('.accordion-open')
      toggleItem(item)
      if (openItem && openItem !== item) {
        toggleItem(openItem)
      }
    })
  })
  const toggleItem = (item) => {
    const accordionContent = item.querySelector('.accordion-content')
    if (item.classList.contains('accordion-open')) {
      accordionContent.removeAttribute('style')
      item.classList.remove('accordion-open')
    } else {
      accordionContent.style.height = accordionContent.scrollHeight + 'px'
      item.classList.add('accordion-open')
    }
  }

  /**
   * Компонент "Рейтинг"
   */
  document.querySelectorAll(".rating").forEach(function (rating) {
    var agregate = rating.querySelector('.rating-agregate').textContent;
    var fulles = 5;
    var rightes = (agregate / fulles) * 100;
    rating.querySelector('.progress').style.width = rightes + '%';
  });


  /**
   * Слайдер на главной странице
   */
  var swiper = new Swiper(".heroSwiper", {
    pagination: {
      el: ".hero .swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        // Добавляем ведущий ноль к числам от 1 до 9
        var bulletNumber = (index + 1).toString().padStart(2, '0');
        return '<span class="' + className + '">' + bulletNumber + "</span>";
      },
    },
  });

  /**
   * Слайдер для блока Place
   */
  var swiper = new Swiper(".placeSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
      prevEl: ".swiper-button-prev",
      nextEl: ".swiper-button-next",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        // Добавляем ведущий ноль к числам от 1 до 9
        var bulletNumber = (index + 1).toString().padStart(2, '0');
        return '<span class="' + className + '">' + bulletNumber + "</span>";
      },
    },
  });

  /**
   * Слайдер для блока faq-head (отображается в моб.версии)
   */
  var swiper = new Swiper(".faqSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
      prevEl: ".swiper-button-prev",
      nextEl: ".swiper-button-next",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        // Добавляем ведущий ноль к числам от 1 до 9
        var bulletNumber = (index + 1).toString().padStart(2, '0');
        return '<span class="' + className + '">' + bulletNumber + "</span>";
      },
    },
  });

  /**
   * Слайдер на странице Trips Article
   */
  var swiper = new Swiper(".tripblSwiper", {
    navigation: {
      prevEl: ".swiper-button-prev",
      nextEl: ".swiper-button-next",
    },
    pagination: {
      el: ".tripbl .swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        // Добавляем ведущий ноль к числам от 1 до 9
        var bulletNumber = (index + 1).toString().padStart(2, '0');
        return '<span class="' + className + '">' + bulletNumber + "</span>";
      },
    },
    breakpoints: {
      1024: {
        navigation: {
          nextEl: ".tripbl .second-button-next.swiper-button-next",
        },
      }
    }
  });

  /**
   * Слайдер на странице Course Article
   */
  var swiper = new Swiper(".courseGallerySwiper", {
    navigation: {
      prevEl: ".course-gallery .swiper-nav .swiper-button-prev",
      nextEl: ".course-gallery .swiper-nav .swiper-button-next",
    },
    pagination: {
      el: ".course-gallery .swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        // Добавляем ведущий ноль к числам от 1 до 9
        var bulletNumber = (index + 1).toString().padStart(2, '0');
        return '<span class="' + className + '">' + bulletNumber + "</span>";
      },
    },
    breakpoints: {
      1024: {
        navigation: {
          prevEl: ".course-gallery .second-button-prev.swiper-button-prev",
          nextEl: ".course-gallery .second-button-next.swiper-button-next",
        },
      }
    }
  });

  /**
   * Слайдер Trips на главной странице
   */
  var tripsSwiper = new Swiper(".tripsSwiper", {
    slidesPerView: 1,
    slidesPerGroup: 1,
    spaceBetween: 20,
    navigation: {
      prevEl: ".trips-swiper-nav .swiper-button-prev",
      nextEl: ".trips-swiper-nav .swiper-button-next",
    },
    pagination: {
      el: ".trips-swiper-nav .swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        // Добавляем ведущий ноль к числам от 1 до 9
        var bulletNumber = (index + 1).toString().padStart(2, '0');
        return '<span class="' + className + '">' + bulletNumber + "</span>";
      },
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        slidesPerGroup: 1,
      },
      768: {
        slidesPerView: 2,
        slidesPerGroup: 2,
      },
      1280: {
        slidesPerView: 3,
        slidesPerGroup: 3,
      }
    }
  });

  /**
   * Слайдер Courses на главной странице
   */
  var coursesSwiper = new Swiper(".coursesSwiper", {
    slidesPerView: 1,
    slidesPerGroup: 1,
    spaceBetween: 20,
    navigation: {
      prevEl: ".courses-swiper-nav .swiper-button-prev",
      nextEl: ".courses-swiper-nav .swiper-button-next",
    },
    pagination: {
      el: ".courses-swiper-nav .swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        // Добавляем ведущий ноль к числам от 1 до 9
        var bulletNumber = (index + 1).toString().padStart(2, '0');
        return '<span class="' + className + '">' + bulletNumber + "</span>";
      },
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        slidesPerGroup: 1,
      },
      768: {
        slidesPerView: 2,
        slidesPerGroup: 2,
      },
      1280: {
        slidesPerView: 3,
        slidesPerGroup: 3,
      }
    }
  });


});

  /*=============== SCROLL REVEAL ANIMATION ===============*/

  // const sr = ScrollReveal({
  //     origin: 'bottom',
  //     distance: '60px',
  //     duration: 2500,
  //     delay: 400,
  //     reset: true
  // })

  // sr.reveal('.fade-up')

    // AOS.init();



    // new WOW().init();
