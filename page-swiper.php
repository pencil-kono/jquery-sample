<?php

get_header();
require(dirname(__FILE__).'/aside.php');

$index = 0;

$points = array(
    "jQueryに依存していない",
    "バージョン 5.0からはIEは完全に動作対象外に",
    "レスポンシブの対応可能",
    "オプションが豊富にある（多機能／高性能）",
    "コンテンツ・スライダーなので、画像以外にもテキスト／動画でも組み込みできる",
);

foreach ( $points as $point ) {
    $point_list_html .= <<<TXT
        <li>{$point}</li>
TXT;
}

$swiper_exam_0 = <<<TXT
<div class="swiper-container swiper-container-1">
    <div class="swiper-wrapper">
        <div class="swiper-slide slide-1">Slide 1</div>
        <div class="swiper-slide slide-2">Slide 2</div>
        <div class="swiper-slide slide-3">Slide 3</div>
    </div>
</div>
TXT;

$swiper_exam_1 = <<<TXT
<div class="swiper-container swiper-container-2"> 
  <div class="swiper-wrapper"> 
    <div class="swiper-slide slide-1">Slide 1</div>
    <div class="swiper-slide slide-2">Slide 2</div>
    <div class="swiper-slide slide-3">Slide 3</div>
  </div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>
TXT;

$swiper_exam_2 = <<<TXT
<div class="swiper-container swiper-container-3">
    <div class="swiper-wrapper">
        <div class="swiper-slide slide-1">Slide 1</div>
        <div class="swiper-slide slide-2">Slide 2</div>
        <div class="swiper-slide slide-3">Slide 3</div>
    </div>
</div>
TXT;

$swiper_exam_3 = <<<TXT
<div class="double-swiper">
    <!-- 上のスライド部分 -->   
    <div class="swiper-container-4" id="thumb">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide-1">Slide 1</div>
            <div class="swiper-slide slide-2">Slide 2</div>
            <div class="swiper-slide slide-3">Slide 3</div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <!-- 下のスライド部分 -->
    <div class="swiper-container-4" id="slide">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide-1">Slide 1</div>
            <div class="swiper-slide slide-2">Slide 2</div>
            <div class="swiper-slide slide-3">Slide 3</div>
        </div>
    </div>
</div>
TXT;


$code_html_arr = array(
    array(
        '<div class="swiper-container">',
        ' <div class="swiper-wrapper">',
        '  <div class="swiper-slide">Slide 1</div>',
        '  <div class="swiper-slide">Slide 2</div>',
        '  <div class="swiper-slide">Slide 3</div>',
        ' </div>',
        '</div>',
    ),
    array(
        '<div class="swiper-container"> ',
        ' <div class="swiper-wrapper"> ',
        '  <div class="swiper-slide"><img src="画像パス" alt="" /></div>',
        '  <div class="swiper-slide"><img src="画像パス" alt="" /></div>',
        '  <div class="swiper-slide"><img src="画像パス" alt="" /></div>',
        ' </div>',
        ' <div class="swiper-pagination"></div>',
        ' <div class="swiper-button-prev"></div>',
        ' <div class="swiper-button-next"></div>',
        '</div>',
    ),
    array(
        '<div class="swiper-container>',
        '<div class="swiper-wrapper">',
        '<div class="swiper-slide slide-1">Slide 1</div>',
        '<div class="swiper-slide slide-2">Slide 2</div>',
        '<div class="swiper-slide slide-3">Slide 3</div>',
        '</div>',
        '</div>',
    ),
    array(
        '<div class="double-swiper">',
        '<!-- 上のスライド部分 -->',
        '<div class="swiper-container-4" id="thumb">',
        '<div class="swiper-wrapper">',
        '<div class="swiper-slide slide-1">Slide 1</div>',
        ' <div class="swiper-slide slide-2">Slide 2</div>',
        '<div class="swiper-slide slide-3">Slide 3</div>',
        '</div>',
        '<div class="swiper-button-prev"></div>',
        '<div class="swiper-button-next"></div>',
        '</div>',
        '<!-- 下のスライド部分 -->',
        '<div class="swiper-container-4" id="slide">',
        '<div class="swiper-wrapper">',
        '<div class="swiper-slide slide-1">Slide 1</div>',
        '<div class="swiper-slide slide-2">Slide 2</div>',
        '<div class="swiper-slide slide-3">Slide 3</div>',
        '</div>',
        '</div>',
        '</div>',
    )
);

$code_js_arr = array(
    array(
        'var swiper = new Swiper (".swiper-container", {});',
    ),
    array(
        'var swiper = new Swiper(".swiper-container", {',
        ' loop: true,',
        ' slidesPerView: 3, //スライダーに表示する枚数',
        ' centeredSlides: true,',
        ' navigation: {',
        '  nextEl: ".swiper-button-next",',
        '  prevEl: ".swiper-button-prev",',
        ' }',
        '});',
    ),
    array(
        'var swiper = new Swiper (".swiper-container-3", {',
        'autoplay: {',
        'delay: 0,',
        '},',
        'loop: true,',
        'speed: 10000,',
        '});',
    ),
    array(
        "var thumb = new Swiper ('#thumb', {",
        'noSwiping: true,',
        'slidesPerView: 1,',
        'loop: true,',
        'watchSlidesVisibility: true,',
        'watchSlidesProgress: true,',
        '});',
        '',
        'var main = new Swiper ("#slide", {',
        'slidesPerView: 3,',
        'centeredSlides: true,',
        'touchRatio: 0.2,',
        'navigation: {',
        'nextEl: ".swiper-button-next",',
        'prevEl: ".swiper-button-prev",',
        '},',
        'thumbs: {',
        'swiper: thumb',
        '}',
        '});',
        '',
        'main.params.control = thumb;',
        'thumb.params.control = main;',
        '',
        '// クリック時スライド移動',
        "$('#slide').on('click', '.swiper-slide', function() {",
        '// クリックされたサムネイルの順番を取得',
        "let slideIndex = $('#slide .swiper-slide').index(this);",
        '// 引数に指定したスライドに移動させる',
        'main.slideTo(slideIndex);',
        '});',
        '',
        '// メインのスライドが動いた時にサムネイルも連動させる',
        '// スライドが変わった時にイベント slideChange API',
        "main.on('slideChange', () => {",
        '// realIndex 現在activeになっているスライドの番号',
        'thumb.slideToLoop(main.realIndex);',
        '});',
        '',
        '// 上と同じ',
        "thumb.on('slideChange', () => {",
        'main.slideToLoop(thumb.realIndex);',
        '});',
    )
);

/*-------------------
  コピー用コード用意
------------------*/
$code_num = count($code_html_arr);

for($i=0; $i<$code_num; $i++){
    ${"html_code_".$i} = get_code($code_html_arr, "html", $i);
    ${"js_code_".$i} = get_code($code_js_arr, "js", $i);
    // ${"css_code_".$i} = get_code($code_css_arr, "css", $i);
    $arr = get_copy_str($index, ${"html_code_".$i}, ${"js_code_".$i}, ${"css_code_".$i});
    ${"copy_str_".$i} = $arr[0];
    $index = $arr[1];
}


/*-------------------
    html準備
------------------*/
$page_html = <<<TXT
<section class="plug-content">
    {$plug_start_html}
    <div class="plug-desc">
        <ul>
            {$point_list_html}
        </ul>
    </div>
    <div class="plug-exam-ttl">
        <h2>実際の挙動</h2>
    </div>

    <div class="swiper-exam-wrapper">
        <h3>デフォルト</h3>
        <div class="swiper-exam">
            {$swiper_exam_0}
        </div>
        {$copy_str_0}
    </div>
    
    <div class="swiper-exam-wrapper">
        <h3>無限スライド</h3>
        <div class="swiper-exam">
            {$swiper_exam_1}
        </div>
        {$copy_str_1}
    </div>

    <div class="swiper-exam-wrapper">
        <h3>自動スライド</h3>
        <div class="swiper-exam">
            {$swiper_exam_2}
        </div>
        {$copy_str_2}
    </div>

    <div class="swiper-exam-wrapper">
        <h3>サムネイル付き</h3>
        <div class="swiper-exam">
            {$swiper_exam_3}
        </div>
        {$copy_str_3}
    </div>

    <div class="plug-explain">
        <h2>解説ページ</h2>
        <p><a href="https://coder-memo.com/swiper-option/">https://coder-memo.com/swiper-option/</a></p>
        <p><a href="https://www.webdesignleaves.com/pr/plugins/swiper_js.html">https://www.webdesignleaves.com/pr/plugins/swiper_js.html</a></p>
    </div>
</section>
TXT;




/*-------------------
    出力
------------------*/
echo <<<TXT
<div class="content-wrapper">
    {$page_html}
TXT;

comments_template();

echo <<<TXT
</div>
{$aside_html}
TXT;

get_footer();