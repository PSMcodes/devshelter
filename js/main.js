(function ($) {
    "use strict";

    // Spinner
    let spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();

    // var marquee_width = $(".marquee-content-primary").width();
    // document.documentElement.style.setProperty('--marquee-padding', marquee_width + 'px');

    // Initiate the wowjs
    new WOW().init();


    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function () {
        if (this.matchMedia("(min-width: 300px)").matches) {
            $dropdown.hover(
                function () {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function () {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video
    $(document).ready(function () {
        let $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            }
        }
    });

    // $('.dropdown-submenu a.test').on("click", function(e){
    //     $(this).next('ul').toggle();
    //     e.stopPropagation();
    //     e.preventDefault();
    //   });    


    // var myCarousel = document.querySelector('#myCarousel');

    // var carousel = new bootstrap.Carousel(myCarousel, {
    //     interval: 5000,
    //     wrap:true
    // });

    // var myCarousel1 = document.querySelector('#myCarousel1');

    // var carousel = new bootstrap.Carousel(myCarousel1, {
    //     interval: 3000,
    // });

    // var headerCarousel = document.querySelector('#header-carousel');
    // var carousel = new bootstrap.Carousel(headerCarousel, {
    //     interval: 3000,
    //     wrap: true
    // });

    // $('.carousel .carousel-item').each(function () {
    //     var minPerSlide = 4;
    //     var next = $(this).next();
    //     if (!next.length) {
    //         next = $(this).siblings(':first');
    //     }
    //     next.children(':first-child').clone().appendTo($(this));

    //     for (var i = 0; i < minPerSlide; i++) {
    //         next = next.next();
    //         if (!next.length) {
    //             next = $(this).siblings(':first');
    //         }

    //         next.children(':first-child').clone().appendTo($(this));
    //     }
    // });






})(jQuery);

// for contact form
function toggleForms() {
    var regularForm = document.getElementById('regular-form');
    var corporateForm = document.getElementById('corporate-form');
    var toggleButton = document.querySelector('.toggle-button');

    if (regularForm.classList.contains('active')) {
        regularForm.classList.remove('active');
        corporateForm.classList.add('active');
        toggleButton.textContent = 'Switch to Regular Inquiry Form';
    } else {
        regularForm.classList.add('active');
        corporateForm.classList.remove('active');
        toggleButton.textContent = 'Switch to Corporate Inquiry Form';
    }
}

