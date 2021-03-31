<?php

get_header();
require(dirname(__FILE__).'/aside.php');

// name => slag
$page_slugs = array(
    'スライダー' =>
        array(
            'slick' => 'slick',
            'swiper' => 'swiper',
            'jQuery.BgSwitcher' => 'jquery-bgswitcher',
        ),
    'ポップアップ' =>
        array(
            'colorbox' => 'colorbox',
            'Jbox' => 'jbox'
        ),
);

foreach ($page_slugs as $func => $plugs){
    $func_name = $func;
    foreach($plugs as $plug_name => $plug_slug){
        $plug_card .= <<<TXT
        <a href="{$site_url}/{$plug_slug}" class="plug-card">
            <h3 class="plug-ribbon">{$func_name}</h3>
            <p>{$plug_name}</p>
        </a>
TXT;
    }
}


$index_html = <<<TXT
<div class="content-wrapper">
    <section class="content">
        <h1 class="top-ttl">
            プラグイン一覧
        </h1>
        <div class="plug-card-wrapper">
            {$plug_card}
        </div>
    </section>
</div>
TXT;



echo <<<TXT
{$index_html}
{$aside_html}
TXT;

get_footer();

