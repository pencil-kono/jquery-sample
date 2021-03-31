<?php

get_header();
require(dirname(__FILE__).'/aside.php');

//変数宣言
$c = 0;
$nest_html_arr_0 = array();
$nest_html_arr_1 = array();
$code_html_arr_0 = array();
$code_html_arr_1 = array();

$code_js_arr_0 = array();
$index = 0;

$points = array(
    "jQueryに依存",
    "レスポンシブの対応可能",
    "カスタマイズ性に優れている",
    "様々な機能を実装できる",
    "ツールチップ、モーダルウィンドウ、通知、イメージギャラリー　など",
);


foreach ( $points as $point ) {
    $point_list_html .= <<<TXT
        <li>{$point}</li>
TXT;
}

//tooltip html
for($i=0; $i<=3; $i++){
    $jbox_tooltip .= <<<TXT
    <div class="jbox-{$i} jbox-item" title="jbox-{$i}">
        Hover
    </div>
TXT;

    $arr_0 = array(
        "<div class='jbox-{$i} jbox-item' title='jbox-{$i}''>",
        'Hover',
        '</div>',
        '',
    );

    array_push($nest_html_arr_0, $arr_0);

    $c = $i;
}

$arr_0 = call_user_func_array("array_merge", $nest_html_arr_0); 
array_push($code_html_arr_0, $arr_0);
$html_code_0 = get_code($code_html_arr_0, "html", 0);


//modalwindow html
for($i=$c+1; $i<=7; $i++){
    $jbox_modal .= <<<TXT
    <div class="jbox-{$i} jbox-item" title="jbox-{$i}">
        Click
    </div>
TXT;

    $arr_1 = array(
        "<div class='jbox-{$i} jbox-item' title='jbox-{$i}''>",
        'Click',
        '</div>',
        '',
    );

    array_push($nest_html_arr_1, $arr_1);
}

$arr_1 = call_user_func_array("array_merge", $nest_html_arr_1); 
array_push($code_html_arr_1, $arr_1);
$html_code_1 = get_code($code_html_arr_1, "html", 0);


$code_js_arr = array(
    array(
        'new jBox("Tooltip", {',
        'attach: ".jbox-0",',
        '});',
        '',
        'new jBox("Tooltip", {',
        ' attach: ".jbox-1",',
        'title: "ポインターの位置いじれる",',
        'pointer: "right:60"',
        '});', 
        '',
        'new jBox("Tooltip", {',
        'attach: ".jbox-2",',
        'width: 300',
        'height: 200',
        'title: "サイズ変更",',
        '});', 
        '',
        'new jBox("Tooltip", {',
        'attach: ".jbox-3",',
        'animation: "tada",',
        'title: "アニメーション"',
        '});', 
        '',
    ),
    array(
        'new jBox("Modal", {',
        'attach: ".jbox-4",',
        'title: "My Modal Window"',
        'content: "jbox-4"',
        '});',
        '',
        'new jBox("Modal", {',
            'attach: ".jbox-5",',
            'width: 300,',
            'height: 200,',
            'title: "Modal Window",',
            'content: "<i>Hello there!</i>"',
        '});',
        '',     
        'new jBox("Modal", {',
            'attach: ".jbox-6",',
            'title: "Modal Animation",',
            'animation: "tada"',
            'content: "アニメーション"',
        '});',
        '',     
        'new jBox("Modal", {',
            'attach: ".jbox-7",',
            'title: "Modal Animation",',
            'animation: "flip"',
            'content: "アニメーション"',
        '});',
        '',        
    )
);


/*-------------------
  コピー用コード用意
------------------*/
for($i=0; $i<2; $i++){
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
    <div class="tool-wrap">
        <h3>TOOLTIPS</h3>
        <div class="jbox-wrapper">
            {$jbox_tooltip}
        </div>
        {$copy_str_0}
    <div>

    <div class="modal-wrap">
        <h3>MODAL WINDOWS</h3>
        <div class="jbox-wrapper">
            {$jbox_modal}
        </div>
        {$copy_str_1}
    </div>

    <div class="plug-explain">
        <h2>解説ページ</h2>
        <a href="https://keizokuma.com/javascript-library-jbox/">https://keizokuma.com/javascript-library-jbox/</a>
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
<!-- end content-wrapper -->
{$aside_html}
TXT;

get_footer();



