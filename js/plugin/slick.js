$(function(){
    $('.slick01').slick({});

    $('.slick02').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 400,
        slidesToShow: 2, //表示するスライドの数
        slidesToScroll: 1,
        infinite: true,
    });

    $('.slick03').slick({
        centerMode: true,
        centerPadding: '25%',
        variableWidth: true,
    });
});

