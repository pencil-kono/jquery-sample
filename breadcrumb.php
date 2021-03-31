<?php

global $post;
require(dirname(__FILE__).'/variable.php');

if(is_page()){
    $pankuzu1 = <<<TXT
    <div class="pankuzu-home">
        <a href="{$site_url}">Home</a>
    </div>
TXT;

    $pankuzu2 = <<<TXT
    <div class="pankuzu-page active">
        <a href="{$site_url}/{$slag}">{$title}</a>
    </div>
TXT;

    if($post->post_parent){
        $parent_id = $post->post_parent;
        $post_data = get_post($parent_id);
        $slag = $post_data->post_name; 
        $title = $post_data->post_title; 
        $pankuzu3 = <<<TXT
        <div class="pankuzu-page">
            <a href="{$site_url}/{$slag}">{$title}</a>
        </div>
TXT;
    }

    // if(親固定ページがあれば)
}


if($pankuzu3){
    $pankuzu = <<<TXT
    <div class="pankuzu-wrapper">
        {$pankuzu1}
        {$pankuzu3}
        {$pankuzu2}
    </div> 
TXT;
}elseif($pankuzu2){
    $pankuzu = <<<TXT
        <div class="pankuzu-wrapper">
            {$pankuzu1}
            {$pankuzu2}
        </div> 
TXT;
}