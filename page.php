<?php

get_header();
require(dirname(__FILE__).'/aside.php');
global $post_data,$ID,$slag,$title,$args,$child_pages;


$page_ttl_html = <<<TXT
<h1 class="plug-ttl">{$title}</h1>
TXT;

if($child_pages){
    foreach ( $child_pages as $child ) {
        $child_name = $child->post_title;
        $child_slag = $child->post_name;    
        $child_link .= <<<TXT
        <a href="{$site_url}/{$slag}/{$child_slag}" class="plug-card">
            <h3 class="plug-ribbon">{$title}</h3>
            <p>{$child_name}</p>
        </a>
TXT;
    }

    $to_child_html = <<<TXT
    <div class="plug-card-wrapper">
        {$child_link}
    </div>
TXT;
}else{

}

switch($slag){
    case 'popup':
        $desc = <<<TXT
        <div class="plug-desc-wrapper">
            サイト内のリンク・ボタンをクリックした時に立ち上がる、別のウインドウ
        </div>
TXT;
        break;

    case 'slider':
        $desc = <<<TXT
        <div class="plug-desc-wrapper">
            サイト内のリンク・ボタンをクリックした時に立ち上がる、別のウインドウ
        </div>
TXT;
        break;
}

$page_html = <<<TXT
<div class="content-wrapper">
    <section class="content">
        {$page_ttl_html}
        {$to_child_html}
    </section>
</div>
TXT;

echo <<<TXT
{$page_html}
{$aside_html}
TXT;

get_footer();
