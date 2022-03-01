$(document).ready(function () {
    $('.img-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3000,
    });
});

$(document).ready(function () {
    $('.img-mul-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }]
    });
});

// bai 2

$(document).ready(function () {
    $(".card-header").click(function () {

        if ($(this).next(".card-body").hasClass("active")) {
            $(this).next(".card-body").removeClass("active").slideUp()
            $(this).children("span").removeClass("fa-minus").addClass("fa-plus")
        } else {
            $(".card .card-body").removeClass("active").slideUp()
            $(".card .card-header span").removeClass("fa-minus").addClass("fa-plus")
            $(this).next(".card-body").addClass("active").slideDown()
            $(this).children("span").removeClass("fa-plus").addClass("fa-minus")
        }

    })
})