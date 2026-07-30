(function ($) {
    "use strict";


    /*--------------------------------------------------------------
      RegisterPlugin, ScrollTrigger, SplitText
    --------------------------------------------------------------*/

    //Pricing Two Tab Tabs
    if ($('.pricing-two-tab').length) {
        $('.pricing-two-tab .pricing-two-tab-btns .p-tab-btn').on('click', function (e) {
            e.preventDefault();
            var target = $($(this).attr('data-tab'));

            if ($(target).hasClass('actve-tab')) {
                return false;
            } else {
                $('.pricing-two-tab .pricing-two-tab-btns .p-tab-btn').removeClass('active-btn');
                $(this).addClass('active-btn');
                $('.pricing-two-tab .p-tabs-content .p-tab').removeClass('active-tab');
                $(target).addClass('active-tab');
            }
        });
    }



    //Gallery Two Tab Tabs
    if ($('.gallery-two-tabs-box').length) {
        $('.gallery-two-tabs-box .gallery-two-tab-btns .p-tab-btn').on('click', function (e) {
            e.preventDefault();
            var target = $($(this).attr('data-tab'));

            if ($(target).hasClass('actve-tab')) {
                return false;
            } else {
                $('.gallery-two-tabs-box .gallery-two-tab-btns .p-tab-btn').removeClass('active-btn');
                $(this).addClass('active-btn');
                $('.gallery-two-tabs-box .p-tabs-content .p-tab').removeClass('active-tab');
                $(target).addClass('active-tab');
            }
        });
    }



    // Hover Image
    const link = document.querySelectorAll(".hover-item");
    const linkHoverReveal = document.querySelectorAll(".hover-item__box");
    const linkImages = document.querySelectorAll(".hover-item__box-img");
    for (let i = 0; i < link.length; i++) {
        link[i].addEventListener("mousemove", (e) => {
            linkHoverReveal[i].style.opacity = 1;
            linkHoverReveal[
                i
            ].style.transform = `translate(-100%, -50% ) rotate(15deg)`;
            linkImages[i].style.transform = "scale(1, 1)";
            linkHoverReveal[i].style.left = e.clientX + "px";
        });
        link[i].addEventListener("mouseleave", (e) => {
            linkHoverReveal[i].style.opacity = 0;
            linkHoverReveal[
                i
            ].style.transform = `translate(-50%, -50%) rotate(15deg)`;
            linkImages[i].style.transform = "scale(0.8, 0.8)";
        });
    }







    // custom coursor
    if ($(".custom-cursor").length) {

        var cursor = document.querySelector('.custom-cursor__cursor');
        var cursorinner = document.querySelector('.custom-cursor__cursor-two');
        var a = document.querySelectorAll('a');

        document.addEventListener('mousemove', function (e) {
            var x = e.clientX;
            var y = e.clientY;
            cursor.style.transform = `translate3d(calc(${e.clientX}px - 50%), calc(${e.clientY}px - 50%), 0)`
        });

        document.addEventListener('mousemove', function (e) {
            var x = e.clientX;
            var y = e.clientY;
            cursorinner.style.left = x + 'px';
            cursorinner.style.top = y + 'px';
        });

        document.addEventListener('mousedown', function () {
            cursor.classList.add('click');
            cursorinner.classList.add('custom-cursor__innerhover')
        });

        document.addEventListener('mouseup', function () {
            cursor.classList.remove('click')
            cursorinner.classList.remove('custom-cursor__innerhover')
        });

        a.forEach(item => {
            item.addEventListener('mouseover', () => {
                cursor.classList.add('custom-cursor__hover');
            });
            item.addEventListener('mouseleave', () => {
                cursor.classList.remove('custom-cursor__hover');
            });
        })
    }





    // AOS Animation
    if ($("[data-aos]").length) {
        AOS.init({
            duration: 1000,
            mirror: true
        });
    }



    // Accrodion
    if ($(".accrodion-grp").length) {
        var accrodionGrp = $(".accrodion-grp");
        accrodionGrp.each(function () {
            var accrodionName = $(this).data("grp-name");
            var Self = $(this);
            var accordion = Self.find(".accrodion");
            Self.addClass(accrodionName);
            Self.find(".accrodion .accrodion-content").hide();
            Self.find(".accrodion.active").find(".accrodion-content").show();
            accordion.each(function () {
                $(this)
                    .find(".accrodion-title")
                    .on("click", function () {
                        if ($(this).parent().hasClass("active") === false) {
                            $(".accrodion-grp." + accrodionName)
                                .find(".accrodion")
                                .removeClass("active");
                            $(".accrodion-grp." + accrodionName)
                                .find(".accrodion")
                                .find(".accrodion-content")
                                .slideUp();
                            $(this).parent().addClass("active");
                            $(this).parent().find(".accrodion-content").slideDown();
                        }
                    });
            });
        });
    }








    function dynamicCurrentMenuClass(selector) {
        let FileName = window.location.href.split("/").reverse()[0];

        selector.find("li").each(function () {
            let anchor = $(this).find("a");
            if ($(anchor).attr("href") == FileName) {
                $(this).addClass("current");
            }
        });
        // if any li has .current elmnt add class
        selector.children("li").each(function () {
            if ($(this).find(".current").length) {
                $(this).addClass("current");
            }
        });
        // if no file name return
        if ("" == FileName) {
            selector.find("li").eq(0).addClass("current");
        }
    }

    if ($(".main-menu__list").length) {
        // dynamic current class
        let mainNavUL = $(".main-menu__list");
        dynamicCurrentMenuClass(mainNavUL);
    }


    if ($(".main-menu__list").length && $(".mobile-nav__container").length) {
        let navContent = document.querySelector(".main-menu__list").outerHTML;
        let mobileNavContainer = document.querySelector(".mobile-nav__container");
        mobileNavContainer.innerHTML = navContent;
    }
    // if ($(".sticky-header__content").length) {
    //     let navContent = document.querySelector(".main-menu").innerHTML;
    //     let mobileNavContainer = document.querySelector(".sticky-header__content");
    //     mobileNavContainer.innerHTML = navContent;
    // }

    if ($(".mobile-nav__container .main-menu__list").length) {
        let dropdownAnchor = $(
            ".mobile-nav__container .main-menu__list .dropdown > a"
        );
        dropdownAnchor.each(function () {
            let self = $(this);
            let toggleBtn = document.createElement("BUTTON");
            toggleBtn.setAttribute("aria-label", "dropdown toggler");
            toggleBtn.innerHTML = "<i class='fa fa-angle-down'></i>";
            self.append(function () {
                return toggleBtn;
            });
            self.find("button").on("click", function (e) {
                e.preventDefault();
                let self = $(this);
                self.toggleClass("expanded");
                self.parent().toggleClass("expanded");
                self.parent().parent().children("ul").slideToggle();
            });
        });
    }

    if ($(".mobile-nav__toggler").length) {
        $(".mobile-nav__toggler").on("click", function (e) {
            e.preventDefault();
            $(".mobile-nav__wrapper").toggleClass("expanded");
            $("body").toggleClass("locked");
        });
    }



    if ($(".tabs-box").length) {
        $(".tabs-box .tab-buttons .tab-btn").on("click", function (e) {
            e.preventDefault();
            var target = $($(this).attr("data-tab"));

            if ($(target).is(":visible")) {
                return false;
            } else {
                target
                    .parents(".tabs-box")
                    .find(".tab-buttons")
                    .find(".tab-btn")
                    .removeClass("active-btn");
                $(this).addClass("active-btn");
                target
                    .parents(".tabs-box")
                    .find(".tabs-content")
                    .find(".tab")
                    .fadeOut(0);
                target
                    .parents(".tabs-box")
                    .find(".tabs-content")
                    .find(".tab")
                    .removeClass("active-tab");
                $(target).fadeIn(300);
                $(target).addClass("active-tab");
            }
        });
    }












    // ===Portfolio===
    function projectMasonaryLayout() {
        if ($(".masonary-layout").length) {
            $(".masonary-layout").isotope({
                layoutMode: "masonry"
            });
        }
        if ($(".post-filter").length) {
            $(".post-filter li")
                .children(".filter-text")
                .on("click", function () {
                    var Self = $(this);
                    var selector = Self.parent().attr("data-filter");
                    $(".post-filter li").removeClass("active");
                    Self.parent().addClass("active");
                    $(".filter-layout").isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 500,
                            easing: "linear",
                            queue: false
                        }
                    });
                    return false;
                });
        }

        if ($(".post-filter.has-dynamic-filters-counter").length) {
            // var allItem = $('.single-filter-item').length;
            var activeFilterItem = $(".post-filter.has-dynamic-filters-counter").find(
                "li"
            );
            activeFilterItem.each(function () {
                var filterElement = $(this).data("filter");
                var count = $(".filter-layout").find(filterElement).length;
                $(this)
                    .children(".filter-text")
                    .append('<span class="count">' + count + "</span>");
            });
        }
    }









    if ($(".circle-progress").length) {
        $(".circle-progress").appear(function () {
            let circleProgress = $(".circle-progress");
            circleProgress.each(function () {
                let progress = $(this);
                let progressOptions = progress.data("options");
                progress.circleProgress(progressOptions);
            });
        });
    }






    function SmoothMenuScroll() {
        var anchor = $(".scrollToLink");
        if (anchor.length) {
            anchor.children("a").bind("click", function (event) {
                if ($(window).scrollTop() > 10) {
                    var headerH = "90";
                } else {
                    var headerH = "90";
                }
                var target = $(this);
                $("html, body")
                    .stop()
                    .animate({
                        scrollTop: $(target.attr("href")).offset().top - headerH + "px"
                    },
                        1200,
                        "easeInOutExpo"
                    );
                anchor.removeClass("current");
                anchor.removeClass("current-menu-ancestor");
                anchor.removeClass("current_page_item");
                anchor.removeClass("current-menu-parent");
                target.parent().addClass("current");
                event.preventDefault();
            });
        }
    }
    SmoothMenuScroll();

    function OnePageMenuScroll() {
        var windscroll = $(window).scrollTop();
        if (windscroll >= 117) {
            var menuAnchor = $(".one-page-scroll-menu .scrollToLink").children("a");
            menuAnchor.each(function () {
                var sections = $(this).attr("href");
                $(sections).each(function () {
                    if ($(this).offset().top <= windscroll + 100) {
                        var Sectionid = $(sections).attr("id");
                        $(".one-page-scroll-menu").find("li").removeClass("current");
                        $(".one-page-scroll-menu").find("li").removeClass("current-menu-ancestor");
                        $(".one-page-scroll-menu").find("li").removeClass("current_page_item");
                        $(".one-page-scroll-menu").find("li").removeClass("current-menu-parent");
                        $(".one-page-scroll-menu")
                            .find("a[href*=\\#" + Sectionid + "]")
                            .parent()
                            .addClass("current");
                    }
                });
            });
        } else {
            $(".one-page-scroll-menu li.current").removeClass("current");
            $(".one-page-scroll-menu li:first").addClass("current");
        }
    }






    /*-- Handle Scrollbar --*/
    function handleScrollbar() {
        const bodyHeight = $("body").height();
        const scrollPos = $(window).innerHeight() + $(window).scrollTop();
        let percentage = (scrollPos / bodyHeight) * 100;
        if (percentage > 100) {
            percentage = 100;
        }
        $(".scroll-to-top .scroll-to-top__inner").css("width", percentage + "%");
    }





    function hoverTab2() {
        $('.cs-hover_tab-2 .team-details__awards-single').hover(function () {
            $(this)
                .parents('.cs-hover_tab-2')
                .addClass('active')
                .siblings()
                .removeClass('active');
        });
    }




    /*--------------------------------------------------------------
      Dynamic Background
    --------------------------------------------------------------*/
    function dynamicBackground() {
        $('[data-src]').each(function () {
            var src = $(this).attr('data-src');
            $(this).css({
                'background-image': 'url(' + src + ')',
            });
        });
    }






    $(".add").on("click", function () {
        if ($(this).prev().val() < 999) {
            $(this)
                .prev()
                .val(+$(this).prev().val() + 1);
        }
    });
    $(".sub").on("click", function () {
        if ($(this).next().val() > 1) {
            if ($(this).next().val() > 1)
                $(this)
                    .next()
                    .val(+$(this).next().val() - 1);
        }
    });




    // ===Checkout Payment===
    if ($(".checkout__payment__title").length) {

        $(".checkout__payment__item").find('.checkout__payment__content').hide();
        $(".checkout__payment__item--active").find('.checkout__payment__content').show();

        $(".checkout__payment__title").on("click", function (e) {
            e.preventDefault();


            $(this).parents('.checkout__payment').find('.checkout__payment__item').removeClass("checkout__payment__item--active");
            $(this).parents(".checkout__payment").find(".checkout__payment__content").slideUp();

            $(this).parent().addClass("checkout__payment__item--active");
            $(this).parent().find(".checkout__payment__content").slideDown();

        })
    }



    function cookies() {
        const cookieBox = document.querySelector(".cookies__modal");
        const acceptButton = document.querySelector("#acceptBtn");
        // const declineButton = document.querySelector("#declineBtn");

        if (document.cookie.includes("cookieBy=Weebix") ||
            document.cookie.includes("cookieDeclined=true")) {
            return;
        }

        cookieBox.classList.add("show");

        acceptButton.addEventListener("click", () => {
            cookieBox.classList.remove("show");
            document.cookie = "cookieBy=Weebix; max-age=" + 60 * 60 * 24 * 30 + "; path=/";
            window.location.reload();
        });

        // declineButton.addEventListener("click", () => {
        //     cookieBox.classList.remove("show");
        //     document.cookie = "cookieDeclined=true; max-age=" + 60 * 60 * 24 * 30 + "; path=/";
        //     window.location.reload();
        // });
    }



    // window load event
    $(window).on("load", function () {
        if ($(".preloader").length) {
            $(".preloader").fadeOut();
        }

        projectMasonaryLayout();
        hoverTab2();
        dynamicBackground();
        cookies(); 



        if ($(".post-filter").length) {
            var postFilterList = $(".post-filter li");
            // for first init
            $(".filter-layout").isotope({
                filter: ".filter-item",
                animationOptions: {
                    duration: 500,
                    easing: "linear",
                    queue: false
                }
            });
            // on click filter links
            postFilterList.on("click", function () {
                var Self = $(this);
                var selector = Self.attr("data-filter");
                postFilterList.removeClass("active");
                Self.addClass("active");

                $(".filter-layout").isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 500,
                        easing: "linear",
                        queue: false
                    }
                });
                return false;
            });
        }

        if ($(".post-filter.has-dynamic-filter-counter").length) {
            // var allItem = $('.single-filter-item').length;

            var activeFilterItem = $(".post-filter.has-dynamic-filter-counter").find(
                "li"
            );

            activeFilterItem.each(function () {
                var filterElement = $(this).data("filter");
                var count = $(".filter-layout").find(filterElement).length;
                $(this).append("<sup>[" + count + "]</sup>");
            });
        }


        if ($(".marquee_mode-1").length) {
            $('.marquee_mode-1').marquee({
                speed: 40,
                gap: 45,
                delayBeforeStart: 0,
                direction: 'left',
                duplicated: true,
                pauseOnHover: true,
                startVisible: true,
            });
        }




        if ($(".marquee_mode-2").length) {
            $('.marquee_mode-2').marquee({
                speed: 20,
                gap: 0,
                delayBeforeStart: 0,
                direction: 'left',
                duplicated: true,
                pauseOnHover: true,
                startVisible: true,
            });
        }


        if ($(".marquee_mode-3").length) {
            $('.marquee_mode-3').marquee({
                speed: 20,
                gap: 0,
                delayBeforeStart: 0,
                direction: 'right',
                duplicated: true,
                pauseOnHover: true,
                startVisible: true,
            });
        }

    });

    // window scroll event

    $(window).on("scroll", function () {
        if ($(".stricked-menu").length) {
            var headerScrollPos = 350;
            var stricky = $(".stricked-menu");
            if ($(window).scrollTop() > headerScrollPos) {
                stricky.addClass("stricky-fixed");
            }
            else if ($(this).scrollTop() <= headerScrollPos) {
                stricky.removeClass("stricky-fixed");
            }
        }

        OnePageMenuScroll();

    });

    $(window).on("scroll", function () {
        handleScrollbar();
        if ($(".sticky-header--one-page").length) {
            var headerScrollPos = 130;
            var stricky = $(".sticky-header--one-page");
            if ($(window).scrollTop() > headerScrollPos) {
                stricky.addClass("active");
            } else if ($(this).scrollTop() <= headerScrollPos) {
                stricky.removeClass("active");
            }
        }

        var scrollToTopBtn = ".scroll-to-top";
        if (scrollToTopBtn.length) {
            if ($(window).scrollTop() > 500) {
                $(scrollToTopBtn).addClass("show");
            } else {
                $(scrollToTopBtn).removeClass("show");
            }
        }
    });







    // $('select:not(.ignore)').niceSelect();



})(jQuery);
