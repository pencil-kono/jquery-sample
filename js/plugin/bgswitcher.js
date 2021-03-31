$(function(){
  $('.bg-slider-1').bgSwitcher({
    images: [
      path + '/img/bard.jpg',
      path + '/img/mori.jpg',
      path + '/img/yuyake.jpg',
    ], // 切り替える背景画像を指定
  });

  $('.bg-slider-2').bgSwitcher({
    images: [
      path + '/img/bard.jpg',
      path + '/img/mori.jpg',
      path + '/img/yuyake.jpg',
    ], // 切り替える背景画像を指定
    interval: 2000, // 背景画像を切り替える間隔を指定 3000=3秒
    loop: true, // 切り替えを繰り返すか指定
    shuffle: true, // 背景画像の順番をシャッフルするか指定
    effect: "clip", // エフェクトの種類をfade,blind,clip,slide,drop,hideから指定
    duration: 500, // エフェクトの時間を指定します。
    easing: "swing" // エフェクトのイージングをlinear,swingから指定
  });
});
