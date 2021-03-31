<?php
require(dirname(__FILE__).'/variable.php');
require(dirname(__FILE__).'/function.php');
require(dirname(__FILE__).'/breadcrumb.php');

wp_head();

$head = <<<TXT
<!doctype html>
	<html lang="ja">
		<head>
      <meta charset="utf-8">
      <title>Jquery Sample</title>
      <link rel="stylesheet" type="text/css" href="{$tmp_url}/css/reset.css">
      <link rel="stylesheet" type="text/css" href="{$tmp_url}/css/main.css">
      <link rel="stylesheet" type="text/css" href="{$tmp_url}/css/comment.css">
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
      {$script_css}
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body>
TXT;

$header = <<<TXT
  <header>
    <h1 class="header-ttl">
        <a href="{$site_url}">Jquery Sample</a>
    </h1>
  </header>
TXT;

// global $template;
// $template_name = basename($template, '.php');
// echo $template_name;

echo <<<TXT
{$head}
{$header}
{$pankuzu}
<div id="content-container">
TXT;
