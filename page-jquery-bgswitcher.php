<?php

get_header();
require(dirname(__FILE__).'/aside.php');

$index = 0;

$points = array(
    "背景画像をスライドさせたりフェードさせることができる",
    "IEは7より対応",
    "レスポンシブの対応可能",
    "背景画像を描画領域を決める事が出来る",
    "そのサイズに合わせてスライド／フェードできる",
    "背景画像なので上オブジェクトを置くのが容易",
    "水平方向に画像を切替える際は少し手を加える必要がある",
);

foreach ( $points as $point ) {
    $point_list_html .= <<<TXT
        <li>{$point}</li>
TXT;
}

$bgswitcher_exam_0 = <<<TXT
<div class="bg-slider-1">
  <h1 class="bg-slider__title">DEMO</h1>
</div>
TXT;

$bgswitcher_exam_1 = <<<TXT
<div class="bg-slider-2">
  <h1 class="bg-slider__title">DEMO</h1>
</div>
TXT;



$code_html_arr = array(
    array(
        '<div class="bg-slider">',
        '<h1 class="bg-slider__title">DEMO</h1>',
        '</div>',
    ),
    array(
        '<div class="bg-slider">',
        '<h1 class="bg-slider__title">DEMO</h1>',
        '</div>',  
    )
);

$code_js_arr = array(
    array(
        '$(".bg-slider").bgSwitcher({',
        'images: [',
        'path + "画像パス",',
        'path + "画像パス",',
        'path + "画像パス",',
        '], // 切り替える背景画像を指定',
        '});',
        '});',
    ),
    array(
        '$(".bg-slider").bgSwitcher({',
        'images: [',
        'path + "画像パス",',
        'path + "画像パス",',
        'path + "画像パス",',
        '],',
        'interval: 2000, //切り替える間隔を指定',
        'loop: true, //切り替えを繰り返すか指定',
        'shuffle: true, // 背景画像の順番をシャッフルするか指定',
        'effect: "clip", // エフェクトの種類をfade,blind,clip,slide,drop,hideから指定',
        'duration: 500, // エフェクトの時間を指定',
        'easing: "swing"',
        '});',
        '});',
    )
);

$code_css_arr = array(
    array(
        '.bg-slider {',
        'display: flex;',
        'align-items: center;',
        'justify-content: center;',
        'width: 100%;',
        'height: 30vw;',
        'max-height: 400px;',
        'min-height: 350px;',
        'background-position:center center;',
        'background-size: cover;',
        '}',
        '',
        '.bg-slider-1 .bg-slider__title {',
        'color: #fff;',
        'font-size: 48px;',
        'text-align:center;',
        'text-shadow: 1px 1px 1px #000;',
        'z-index: 1;',
        '}',
    ),
    array(
        '上と同じ',
    )
);

$code_num = count($code_html_arr);

for($i=0; $i<$code_num; $i++){
    ${"html_code_".$i} = get_code($code_html_arr, "html", $i);
    ${"js_code_".$i} = get_code($code_js_arr, "js", $i);
    ${"css_code_".$i} = get_code($code_css_arr, "css", $i);
    $arr = get_copy_str($index, ${"html_code_".$i}, ${"js_code_".$i}, ${"css_code_".$i});
    ${"copy_str_".$i} = $arr[0];
    $index = $arr[1];
}

// var_dump($css_code_0);



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

    <div class="bgswitcher-exam-wrapper">
        <h3>デフォルト</h3>
        <div class="bgswitcher-exam">
            {$bgswitcher_exam_0}
        </div>
        {$copy_str_0}
    </div>

    <div class="bgswitcher-exam-wrapper">
        <h3>カスタマイズ</h3>
        <div class="bgswitcher-exam">
            {$bgswitcher_exam_1}
        </div>
        {$copy_str_1}
    </div>

    <div class="plug-explain">
        <h2>解説ページ</h2>
        <p><a href="https://www.creamu.co.jp/blog/technology/2019/07/jquery_bgswitcher.html">https://www.creamu.co.jp/blog/technology/2019/07/jquery_bgswitcher.html</a></p>
        <p><a href="https://fit-jp.com/bgswitcher/">https://fit-jp.com/bgswitcher/</a></p>
    </div>
</section>
TXT;


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