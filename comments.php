<?php

require(dirname(__FILE__).'/variable.php');

$args = array(
    'post_id' => $ID,
);

$comments = get_comments( $args );
// var_dump($comments);

$len_comment = count($comments);

$comment_content .= <<<TXT
<div class="plug-comment-ttl">
    <h2>コメント</h2>
</div>
<div class="comment-count">
    <span>{$len_comment}</span>件のコメント
</div>
TXT;

foreach ( $comments as $comment ) {
    $author = $comment->comment_author;
    $content = $comment->comment_content;
    // var_dump($author);
    $comment_content .= <<<TXT
<div class="plug-comment-wrap">
    <div class="plug-comment">
        <div class="comment-author">
            {$author}<span>さん</span>
        </div>
        <div class="comment-content">
            {$content}
        </div>
    </div>
</div>
TXT;
}


$author = <<<TXT
<div class="comment-form-author">
    <label for="author">名前</label>
    <input id="author" name="author" type="text" />
</div>
TXT;

$fields = array(
    'author' => $author,
    'email' => '',
    'url' => '',
    'cookies' => '',
);

$comment_fl = <<<TXT
<div class="comment-form">
    <label for="comment">コメントを入力する</label>
    <textarea id="comment" class="comment-textarea" name="comment" cols="45" rows="4" aria-required="true"></textarea>
</div>
TXT;

$args = array(
    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_field' => $comment_fl,
    'title_reply' => '',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
	'title_reply_to' => '%s に返信する',
	'cancel_reply_link' => '取り消す',
    'label_submit' => '送信する',
    'logged_in_as' => '',
);



if($comment_content){
    echo $comment_content;
}

comment_form( $args );