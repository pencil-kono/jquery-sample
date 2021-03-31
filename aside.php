<?php

require(dirname(__FILE__).'/variable.php');

$to_popup_html =<<<TXT
<a href="{$site_url}/popup">ポップアップ</a>
TXT;


$to_slider_html =<<<TXT
<a href="{$site_url}/slider">スライダー</a>
TXT;


$aside_html = <<<TXT
<aside>
    <div class="aside-item-wrap">
        <div class="aside-ttl">
            機能名
        </div>
        <div class="aside-item">
            {$to_popup_html}
        </div>
        <div class="aside-item">
            {$to_slider_html}
        </div>
    </div>

</aside>
TXT;

// $categories = get_terms( 'hobby', 'get=all' );
// if($categories){
//     var_dump($categories);
//     $slug = $categories[0]->slug;
//     // var_dump($slug);
// }

// echo <<<TXT
// <a href="{$site_url}/{$slug}">ff</a>
// TXT;


