$(function() {
    
    "use strict";
    
    //===== Prealoder
    
    $(window).on('load', function(event) {
        $('.preloader').delay(100).fadeOut(100);
    });
    
    
    //===== Sticky

    $(window).on('scroll', function (event) {
        var scroll = $(window).scrollTop();
        if ($(window).width() > 992){
        if (scroll < 20) {
            $(".header_navbar").removeClass("sticky");
            $(".header_navbar .navbar-brand img").attr("src", "img/logo/logo1.png");
            $(".header_navbar h4").attr("style", "color:#fff");
        } else {
            $(".header_navbar").addClass("sticky");
            $(".header_navbar .navbar-brand img").attr("src", "img/logo/logo2.png");
            $(".header_navbar h4").attr("style", "color:#581CCB");
        }}
        else {
                $(".header_navbar").removeClass("sticky");
                $(".header_navbar .navbar-brand img").attr("src", "img/logo/caci.png");
                $(".header_navbar h4").attr("style", "color:#fff");
        }
    });
    
    
    //===== Section Menu Active

    var scrollLink = $('.page-scroll');
    // Active link switching
    $(window).scroll(function () {
        var scrollbarLocation = $(this).scrollTop();

        scrollLink.each(function () {

            var sectionOffset = $(this.hash).offset().top - 73;

            if (sectionOffset <= scrollbarLocation) {
                $(this).parent().addClass('active');
                $(this).parent().siblings().removeClass('active');
            }
        });
    });
    //
    // var aria_expanded = $('.navbar-toggler').attr('aria-expanded');
    // if (aria_expanded){
    //     $('#navbarSupportedContent').attr('style', 'display: flow-root !important;');
    // }else{
    //     $('#navbarSupportedContent').attr('style', 'display: none !important;');
    // }
    //===== close navbar-collapse when a  clicked

    $(".navbar-nav a").on('click', function () {
        $(".navbar-collapse").removeClass("show");
    });

    $(".navbar-toggler").on('click', function () {
        $(this).toggleClass("active");
    });

    $(".navbar-nav a").on('click', function () {
        $(".navbar-toggler").removeClass('active');
    });
    
    
    //===== Back to top
    
    // Show or hide the sticky footer button
    $(window).on('scroll', function(event) {
        if($(this).scrollTop() > 600){
            $('.back-to-top').fadeIn(200)
        } else{
            $('.back-to-top').fadeOut(200)
        }
    });
    
    
    //Animate the scroll to yop
    $('.back-to-top').on('click', function(event) {
        event.preventDefault();
        
        $('html, body').animate({
            scrollTop: 0,
        }, 1500);
    });
    
    
    //=====  WOW active
    
    var wow = new WOW({
        boxClass: 'wow', //
        mobile: false, // 
    })
    wow.init();
    
    
    //===== 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
});