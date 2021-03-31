<?php

get_header();
require(dirname(__FILE__).'/aside.php');

$index = 0;

$points = array(
    "jQueryに依存",
    "IEは7より対応",
    "レスポンシブの対応可能",
    "シンプルで多機能",
    "画像１枚表示からスライドショー、iframeなど",
    "ajaxで外部ファイルも表示できる",
    "外観はCSSで変更できる",
);

foreach ( $points as $point ) {
    $point_list_html .= <<<TXT
        <li>{$point}</li>
TXT;
}

$colorbox_only = <<<TXT
<a class="colorbox_exam_single colorbox-item" href="{$tmp_url}/img/coffee.jpg" title="コーヒー">
  <img src="{$tmp_url}/img/coffee.jpg" alt="" />
</a>
TXT;

$colorbox_slide = <<<TXT
<a class="colorbox_exam_slide colorbox-item" href="{$tmp_url}/img/yuyake.jpg" title="夕焼け">
  <img src="{$tmp_url}/img/yuyake.jpg" alt="" />
</a>
<a class="colorbox_exam_slide colorbox-item" href="{$tmp_url}/img/coffee.jpg" title="コーヒー">
  <img src="{$tmp_url}/img/coffee.jpg" alt="" />
</a>
<a class="colorbox_exam_slide colorbox-item" href="{$tmp_url}/img/mori.jpg" title="森">
  <img src="{$tmp_url}/img/mori.jpg" alt="" />
</a>
TXT;


$colorbox_iframe = <<<TXT
<a class="colorbox_exam_iframe colorbox-item" href="https://www.pencil.co.jp/">iframeで表示</a>
TXT;


$code_html_arr = array(
  array(
    '<a class="colorbox-item" href="画像パス" title="タイトル">',
    '<img src="画像パス" alt="" />',
    '</a>',
  ),
  array(
    '<a class="colorbox-item" href="画像パス" title="タイトル">',
    '<img src="画像パス" alt="" />',
    '</a>',
    '<a class="colorbox-item" href="画像パス" title="タイトル">',
    '<img src="画像パス" alt="" />',
    '</a>',
    '<a class="colorbox-item" href="画像パス" title="タイトル">',
    '<img src="画像パス" alt="" />',
    '</a>',
  ),
  array(
    '<a class="colorbox_exam_iframe" href="https://www.pencil.co.jp/about/organization/">iframeで表示</a>'
  ),
);

$code_css = <<<TXT
TXT;

$code_js_arr = array(
  array(
    '$(function() {',
    '$(".colorbox-item").colorbox({',
    'opacity: 0.7',
    '});',
  ),
  array(
    '$(function() {',
    '$(".colorbox-item").colorbox({',
    'rel:"slideshow"',
    'slideshow:true',
    'slideshowSpeed:3000',
    'maxWidth:"90%"',
    'maxHeight:"90%"',
    'opacity: 0.7',
    '});',    
    ),
  array(
    '$(".colorbox_exam_iframe").colorbox({',
    'iframe: true,',
    'maxWidth:"80%",',
    'maxHeight:"80%",',
    'opacity: 0.7',
    '});',
  )
);

$code_num = count($code_html_arr);

for($i=0; $i<$code_num; $i++){
  ${"html_code_".$i} = get_code($code_html_arr, "html", $i);
  ${"js_code_".$i} = get_code($code_js_arr, "js", $i);
  $arr = get_copy_str($index, ${"html_code_".$i}, ${"js_code_".$i}, ${"css_code_".$i});
  ${"copy_str_".$i} = $arr[0];
  $index = $arr[1];
}

  
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

    <div class="only-wrap">
        <h3>画像単体で表示</h3>
        <div class="colorbox-wrapper">
            {$colorbox_only}
        </div>
        {$copy_str_0}
    </div>

    <div class="slide-wrap">
        <h3>スライドで表示</h3>
        <div class="colorbox-wrapper">
            {$colorbox_slide}
        </div>
        {$copy_str_1}
    </div>

    <div class="iframe-wrap">
        <h3>iframeで表示</h3>
        <div class="colorbox-wrapper">
            {$colorbox_iframe}
        </div>
        {$copy_str_2}
    </div>

    <div class="plug-explain">
        <h2>解説ページ</h2>
        <a href="https://gimmicklog.com/jquery/299/">https://gimmicklog.com/jquery/299/</a>
    </div>
</section>
TXT;




//出力
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