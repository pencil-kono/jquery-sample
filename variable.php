<?php

global $tmp_url,$search_form,$pager;
global $script_js,$script_css;

/*-------------------
    共通変数
------------------*/
$tmp_url = get_bloginfo('template_directory');//ディレクトリ
$site_url = get_bloginfo('url');//サイトURL



/*-------------------
    ページ別変数
------------------*/
if (is_page()){
    global $post_data,$ID,$slag,$title,$args,$child_pages,$plug_start_html;
    $post_data = get_post();
    // var_dump($post_data);
    $ID = $post_data->ID;
    $slag = $post_data->post_name;
    $title = $post_data->post_title;
    $args = array(
        'post_parent' => $ID,
        'post_type'   => 'page'
    );

    $child_pages = get_children( $args );
    
    $plug_start_html = <<<TXT
    <h1 class="plug-ttl">{$title}</h1>
    <h2 class="plug-about">
        このプラグイン／ライブラリについて
    </h2>
TXT;
}



/*-------------------
    ページ別scriptの読み込み
------------------*/

if (is_page('jbox')){
    $script_js = <<<TXT
    <script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.7/dist/jBox.all.min.js"></script>
    <script src="{$tmp_url}/js/plugin/jbox.js"></script>
TXT;

    $script_css = <<<TXT
    <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.7/dist/jBox.all.min.css" rel="stylesheet">
TXT;
} 

elseif (is_page('colorbox')){
    $script_js = <<<TXT
    <script src="{$tmp_url}/plugin/colorbox/jquery.colorbox-min.js"></script>
    <script src="{$tmp_url}/js/plugin/colorbox.js"></script>
TXT;

    $script_css = <<<TXT
    <link rel="stylesheet" href="{$tmp_url}/plugin/colorbox/colorbox.css">
    <link rel="stylesheet" href="{$tmp_url}/css/colorbox.css">
TXT;
}

elseif (is_page('swiper')){
    $script_js = <<<TXT
    <script src="{$tmp_url}/plugin/swiper/swiper.min.js"></script>
    <script src="{$tmp_url}/js/plugin/swiper.js"></script>
TXT;

    $script_css = <<<TXT
    <link rel="stylesheet" href="{$tmp_url}/plugin/swiper/swiper.min.css">
    <link rel="stylesheet" href="{$tmp_url}/css/swiper.css">
TXT;
} 

elseif (is_page('jquery-bgswitcher')){
    $script_js = <<<TXT
    <script src="{$tmp_url}/plugin/bgswitcher/jquery.bgswitcher.js"></script>
    <script src="{$tmp_url}/js/plugin/bgswitcher.js"></script>
TXT;

    $script_css = <<<TXT
    <link rel="stylesheet" href="{$tmp_url}/css/bgswi.css">
TXT;
} 

elseif (is_page('slick')){
    $script_js = <<<TXT
    <script src="{$tmp_url}/plugin/slick/slick.min.js"></script>
    <script src="{$tmp_url}/js/plugin/slick.js"></script>
TXT;

    $script_css = <<<TXT
    <link rel="stylesheet" href="{$tmp_url}/plugin/slick/slick.css">
    <link rel="stylesheet" href="{$tmp_url}/plugin/slick/slick-theme.css">
    <link rel="stylesheet" href="{$tmp_url}/css/slick.css">
TXT;
}

else{

}
  
?>  