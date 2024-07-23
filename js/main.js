(function ($) {
    "use strict";

    document.addEventListener("DOMContentLoaded", function() {
        var loader = document.getElementById('loader');
        var content = document.getElementById('content');
    
        // Increase opacity to show the loader
        setTimeout(function() {
            loader.style.opacity = 1;
        }, 100); // Start the fade-in effect after a short delay
    
        // Simulate loading time
        window.onload = function() {
            // Hide the loader and show the content
            setTimeout(function() {
                loader.style.opacity = 0;
                setTimeout(function() {
                    loader.style.display = 'none';
                    content.style.display = 'block';
                }, 1000); // Ensure the loader fades out before hiding
            }, 3000); // Adjust the delay to match your loading time
        };
    });

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
        toggleButton.textContent = 'Switch to Normal Inquiry Form';
    }
}

    
// document.addEventListener('DOMContentLoaded', function() {
//     const radioInputs = document.querySelectorAll('.radio-input');
//     const descriptionBoxes = document.querySelectorAll('.description-box');

//     radioInputs.forEach((input, index) => {
//         input.addEventListener('change', () => {
//             // Hide all description boxes
//             descriptionBoxes.forEach(box => {
//                 box.classList.remove('active');
//             });

//             // Show selected description box
//             descriptionBoxes[index].classList.add('active');
//         });
//     });
// });

document.addEventListener('DOMContentLoaded', function() {
    const radioInputs = document.querySelectorAll('.radio-input');
    const descriptionBoxes = document.querySelectorAll('.description-box');
    let currentIndex = 0;
    let intervalId;

    function showDescription(index) {
        console.log("box1",index);
        descriptionBoxes.forEach((box, idx) => {
            if (idx === index) {
                box.classList.add('active');
            } else {
                box.classList.remove('active');
            }
        });

        radioInputs.forEach((input, idx) => {
            input.checked = (idx === index);
        });
    }

    function startAutoCycle() {
        intervalId = setInterval(() => {
            showDescription(currentIndex);
            currentIndex = (currentIndex + 1) % descriptionBoxes.length;
        }, 3000);
    }

    function stopAutoCycle() {
        clearInterval(intervalId);
    }

    radioInputs.forEach((input, index) => {
        input.addEventListener('change', () => {
            stopAutoCycle();
            currentIndex = index;
            showDescription(currentIndex);
            setTimeout(startAutoCycle, 3000); 
        });
    });

    startAutoCycle();
});

document.addEventListener('DOMContentLoaded', function() {
    const radioInputs = document.querySelectorAll('.radio-fight');
    const descriptionBoxes = document.querySelectorAll('.description-box2');
    let currentIndex = 0;
    let intervalId;

    function showDescription(index) {
        // console.log(index);
        descriptionBoxes.forEach((box, idx) => {
            if (idx === index) {
                box.classList.add('active');
            } else {
                box.classList.remove('active');
            }
        });

        radioInputs.forEach((input, idx) => {
            input.checked = (idx === index);
        });
    }

    function startAutoCycle() {
        intervalId = setInterval(() => {
            showDescription(currentIndex);
            currentIndex = (currentIndex + 1) % descriptionBoxes.length;
        }, 3000);
    }

    function stopAutoCycle() {
        clearInterval(intervalId);
    }

    radioInputs.forEach((input, index) => {
        input.addEventListener('change', () => {
            stopAutoCycle();
            currentIndex = index;
            showDescription(currentIndex);
            setTimeout(startAutoCycle, 3000); 
        });
    });

    startAutoCycle();
});

document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.getElementById('load-more-btn');
    const additionalText = document.getElementById('additional-text');

    if (loadMoreBtn && additionalText) {
        loadMoreBtn.addEventListener('click', function() {
            additionalText.classList.toggle('hidden-on-small');
            if (additionalText.classList.contains('hidden-on-small')) {
                loadMoreBtn.innerText = 'Show More';
            } else {
                loadMoreBtn.innerText = 'Show Less';
            }
        });
    }
});




$(document).ready(function(){
    var marquee_width = $(".marquee-content-primary").width();
    document.documentElement.style.setProperty('--marquee-padding', marquee_width + 'px');
  });
  
  