<?php

get_header();
require(dirname(__FILE__).'/aside.php');

$index = 0;

$points = array(
    "jQueryに依存",
    "IEは7より対応",
    "レスポンシブの対応可能",
    "ブレークポイントごとに別々の設定ができる",
    "スワイプやマウスドラッグで切り替え可能",
    "カスタマイズの幅が広い（スライドの削除／フィルタリングまでできる）",
);

foreach ( $points as $point ) {
    $point_list_html .= <<<TXT
        <li>{$point}</li>
TXT;
}

$slick_exam_0 = <<<TXT
    <ul class="slick01">
        <li class="slide-1">Slide 1</li>
        <li class="slide-2">Slide 2</li>
        <li class="slide-3">Slide 3</li>
    </ul>
TXT;

$slick_exam_1 = <<<TXT
    <ul class="slick02">
        <li class="slide-1">Slide 1</li>
        <li class="slide-2">Slide 2</li>
        <li class="slide-3">Slide 3</li>
    </ul>
TXT;

// var_dump($tmp_url);

$slick_exam_2 = <<<TXT
    <ul class="slick03">
        <li class="slide-1"><img src="{$tmp_url}/img/mori.jpg"</li>
        <li class="slide-2"><img src="{$tmp_url}/img/pan.jpeg"</li>
        <li class="slide-3"><img src="{$tmp_url}/img/ramen.jpeg"</li>
    </ul>
TXT;

$code_html_arr = array(
    array(
        '<ul class="slick01">',
        '<li class="slide-1">Slide 1</li>',
        '<li class="slide-2">Slide 2</li>',
        '<li class="slide-3">Slide 3</li>',
        '</ul>',
    ),
    array(
        '<ul class="slick02">',
        '<li class="slide-1">Slide 1</li>',
        '<li class="slide-2">Slide 2</li>',
        '<li class="slide-3">Slide 3</li>',
        '</ul>',
    ),
    array(
        '<ul class="slick03">',
        '<li class="slide-1"><img src="画像パス"></li>',
        '<li class="slide-2"><img src="画像パス"></li>',
        '<li class="slide-3"><img src="画像パス"></li>',
        '</ul>',
    ),
);

$code_js_arr = array(
    array(
        '$(".slick01").slick({});',
    ),
    array(
        '$(".slick02").slick({',
        'autoplay: true,',
        'autoplaySpeed: 2000,',
        'speed: 400,',
        'slidesToShow: 2, //表示するスライドの数',
        'slidesToScroll: 1,',
        'infinite: true,  //無限スクロールにするかどうか',
        '});',
    ),
    array(
        "$('.slick03').slick({",
        "centerMode: true,",
        "centerPadding: '25%',",
        "variableWidth: true,",
        "});",
    ),
);

$code_css_arr = array(
    array(),
    array(),
    array(
        ".slick03 {",
        "height: 20vw;",
        "max-height: 300px;",
        "}",
        "",
        ".slick03 li {",
        "opacity: 0.2;",
        "}",
        "",
        ".slick03 li.slick-active {",
        "opacity: 1;",
        "}",
        "",
        ".slick03 li img {",
        "height: 20vw;",
        "max-height: 300px;",
        "min-height: 250px;",
        "}",
    )
);




/*-------------------
  コピー用コード用意
------------------*/
$code_num = count($code_html_arr);

for($i=0; $i<$code_num; $i++){
    ${"html_code_".$i} = get_code($code_html_arr, "html", $i);
    ${"js_code_".$i} = get_code($code_js_arr, "js", $i);
    ${"css_code_".$i} = get_code($code_css_arr, "css", $i);
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

    <div class="slick-exam-wrapper">
        <h3>デフォルト</h3>
        <div class="slick-exam">
            {$slick_exam_0}
        </div>
        {$copy_str_0}
    </div>

    <div class="slick-exam-wrapper">
        <h3>無限スライド</h3>
        <div class="slick-exam">
            {$slick_exam_1}
        </div>
        {$copy_str_1}
    </div>

    <div class="slick-exam-wrapper">
        <h3>元画像サイズがバラバラなスライド</h3>
        <div class="slick-exam">
            {$slick_exam_2}
        </div>
        {$copy_str_2}
    </div>

    <div class="plug-explain">
        <h2>解説ページ</h2>
        <p><a href="http://kenwheeler.github.io/slick/">http://kenwheeler.github.io/slick/</a></p>
        <p><a href="https://qiita.com/katsunory/items/25b385aae0f07b41e611">https://qiita.com/katsunory/items/25b385aae0f07b41e611</a></p>
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
