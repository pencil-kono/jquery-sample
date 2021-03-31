$(function(){
    var swiper01 = new Swiper ('.swiper-container-1', {});

    var swiper02 = new Swiper('.swiper-container-2', {
        loop: true,
        slidesPerView: 3,
        centeredSlides: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });

    var swiper03 = new Swiper ('.swiper-container-3', {
        autoplay: {
            delay: 0,
        },
        loop: true,
        speed: 10000,
    });


    var thumb = new Swiper ('#thumb', {
        noSwiping: true,
        slidesPerView: 1,
        loop: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });

    var main = new Swiper ('#slide', {
        slidesPerView: 3,
        // loop: true,
        centeredSlides: true,
        // noSwiping: true,
        touchRatio: 0.2,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: thumb
        }
    });

    main.params.control = thumb;
    thumb.params.control = main;

    // クリック時スライド移動
    $('#slide').on('click', '.swiper-slide', function() {
        // クリックされたサムネイルの順番を取得
        let slideIndex = $('#slide .swiper-slide').index(this);
        // 引数に指定したスライドに移動させる
        main.slideTo(slideIndex);
        console.log(slideIndex);
    });

    // メインのスライドが動いた時にサムネイルも連動させる
    // スライドが変わった時にイベント slideChange API
    main.on('slideChange', () => {
        // realIndex 現在activeになっているスライドの番号
        thumb.slideToLoop(main.realIndex);
    });
    // サムネイルをスライドした時にメインスライドを連動させる(上記と同じ)
    thumb.on('slideChange', () => {
        main.slideToLoop(thumb.realIndex);
    });
},);

