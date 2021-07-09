/*---------------------------------------------------------------------
    File Name: custom.js
---------------------------------------------------------------------*/

$(function() {

    "use strict";

    /* Preloader
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    setTimeout(function() {
        $('.loader_bg').fadeToggle();
    }, 200);

    /* JQuery Menu
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function() {
        $('header nav').meanmenu();
    });

    /* Tooltip
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    /* sticky
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function() {
        $(".sticky-wrapper-header").sticky({ topSpacing: 0 });
    });

    /* Mouseover
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function() {
        $(".main-menu ul li.megamenu").mouseover(function() {
            if (!$(this).parent().hasClass("#wrapper")) {
                $("#wrapper").addClass('overlay');
            }
        });
        $(".main-menu ul li.megamenu").mouseleave(function() {
            $("#wrapper").removeClass('overlay');
        });
    });

    /* NiceScroll
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(".brand-box").niceScroll({
        cursorcolor: "#9b9b9c",
    });

    /* NiceSelect
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    // $(document).ready(function() {
    //     $('select').niceSelect();
    // });

    /* OwlCarousel - Blog Post slider
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function() {
        var owl = $('.carousel-slider-post');
        owl.owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true
        });
    });

    /* OwlCarousel - Banner Rotator Slider
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function() {
        var owl = $('.banner-rotator-slider');
        owl.owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true
        });
    });




    /* OwlCarousel - Product Slider
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function() {
        var owl = $('#product-in-slider');
        owl.owlCarousel({
            loop: true,
            nav: true,
            margin: 10,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                960: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function(e) {
            if (e.deltaY > 0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });
    });

    /* Scroll to Top
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(window).on('scroll', function() {
        scroll = $(window).scrollTop();
        if (scroll >= 100) {
            $("#back-to-top").addClass('b-show_scrollBut')
        } else {
            $("#back-to-top").removeClass('b-show_scrollBut')
        }
    });
    $("#back-to-top").on("click", function() {
        $('body,html').animate({
            scrollTop: 0
        }, 1000);
    });

    /* Contact-form
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
    $.validator.setDefaults({
        submitHandler: function() {
            alert("submitted!");
        }
    });

    $(document).ready(function() {
        $("#contact-form").validate({
            rules: {
                firstname: "required",
                email: {
                    required: true,
                    email: true
                },
                lastname: "required",
                message: "required",
                agree: "required"
            },
            messages: {
                firstname: "Please enter your firstname",
                email: "Please enter a valid email address",
                lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                message: "Please enter your Message",
                agree: "Please accept our policy"
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("input"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents(".col-md-4, .col-md-12").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".col-md-4, .col-md-12").addClass("has-success").removeClass("has-error");
            }
        });
    });

    /* heroslider
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    var swiper = new Swiper('.heroslider', {
        spaceBetween: 30,
        centeredSlides: true,
        slidesPerView: 'auto',
        paginationClickable: true,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true
        },
    });


    /* Product Filters
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    var swiper = new Swiper('.swiper-product-filters', {
        slidesPerView: 3,
        slidesPerColumn: 2,
        spaceBetween: 30,
        breakpoints: {
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
                slidesPerColumn: 1,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
                slidesPerColumn: 1,
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 10,
                slidesPerColumn: 1,
            }
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true
        }
    });

    /* Countdown
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            var $this = $(this).html(event.strftime('' +
                '<div class="time-bar"><span class="time-box">%w</span> <span class="line-b">weeks</span></div> ' +
                '<div class="time-bar"><span class="time-box">%d</span> <span class="line-b">days</span></div> ' +
                '<div class="time-bar"><span class="time-box">%H</span> <span class="line-b">hr</span></div> ' +
                '<div class="time-bar"><span class="time-box">%M</span> <span class="line-b">min</span></div> ' +
                '<div class="time-bar"><span class="time-box">%S</span> <span class="line-b">sec</span></div>'));
        });
    });

    /* Deal Slider
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $('.deal-slider').slick({
        dots: false,
        infinite: false,
        prevArrow: '.previous-deal',
        nextArrow: '.next-deal',
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: false,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 2,
                infinite: true,
                dots: false
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

    /* News Slider
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $('#news-slider').slick({
        dots: false,
        infinite: false,
        prevArrow: '.previous',
        nextArrow: '.next',
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

    /* Fancybox
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(".fancybox").fancybox({
        maxWidth: 1200,
        maxHeight: 600,
        width: '70%',
        height: '70%',
    });

    /* Toggle sidebar
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });

    /* Product slider
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
    // optional
    $('#blogCarousel').carousel({
        interval: 5000
    });

    //sang
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

});

//rating

$(document).ready(function() {

    var rating_data = 0;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // $(document).on('mouseenter', '.submit_star', function() {
    //     var rating = $(this).data('rating');

    //     reset_background();
    //     for (var count = 1; count <= rating; count++) {
    //         $('#submit_star_' + count).addClass('text-warning');
    //     }
    // });

    function reset_background() {

        for (var count = 1; count <= 5; count++) {
            $('#submit_star_' + count).addClass('star-light');
            $('#submit_star_' + count).removeClass('text-warning');
        }
    }

    // $(document).on('mouseleave', '.submit_star', function() {
    //     reset_background();
    // });

    $(document).on('click', '.submit_star', function() {
        rating_data = $(this).data('rating');


        reset_background();
        for (var count = 1; count <= rating_data; count++) {
            $('#submit_star_' + count).addClass('text-warning');
        }

    });

    $('#save_review').click(function() {
        var user_review = $('#user_review').val();
        var isbn = $('#isbn').val();
        var user_id = $('#user_id').val();
        var rateInfo = {
            user_id: user_id,
            isbn: isbn,
            rating_data: rating_data,
            user_review: user_review
        }
        if (rating_data == 0) {
            $('#validSuccess').hide();
            $('#validTitle').show()
            $('#validTitle').html("You have to rate star!");
            return;
        } else if (user_review == '') {
            $('#validSuccess').hide();
            $('#validTitle').show()
            $('#validTitle').html("Your review can not blank!");
            return;
        } else {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/rating',
                // type: "POST",
                // data: { user_id: user_id, isbn: isbn, rating_data: rating_data, user_review: user_review },
                type: 'Post',
                dataType: "json",
                contentType: "application/json",
                data: JSON.stringify(rateInfo),
                success: function(res) {
                    $('#validSuccess').show();
                    $('#validSuccess').html("Thanks for your feedback!");
                    $('#validTitle').hide();
                    // $('#user_review').val("");
                    reset_background();
                }
            });
            rating_data = 0;
            $('#user_review').val("");
        }
    });

    function resetPage() {
        location.reload();
    }

});

//sort

$(document).ready(function() {
    var url = new URL(window.location.href);
    url.searchParams.append('sort', '');

    $("#sort").on('change', function() {
        url.searchParams.set('sort', $("#sort").val());

        window.location.href = url;
        //this.form.submit();
    })
});
