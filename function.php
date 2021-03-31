<?php

// 配列htmlが１つの場合は第３引数を０
// 複数ある場合は添字に応じた引数を渡す
// 配列の添字に応じてstrで返す
function get_code($code_arr, $name, $index){
  $count = 0;
  foreach($code_arr as $codes){
    foreach($codes as $code){
      if($name == 'html'){
        $code = htmlspecialchars($code, ENT_NOQUOTES);
        ${"html".$count} .= "$code<br>";     
      }
      if($name == 'js'){
        ${"js".$count} .= "$code<br>";
      };
      if($name == 'css'){
        ${"css".$count} .= "$code<br>";
      }
    }
    $count += 1;
  }
  return (${$name.$index});
}



// コピー用ボタンを$indexで制御
// 初期indexは0
// 該当コードがあればindexを１つ増やす
//戻り値 [コード文字列, 増加させたindex]
function get_copy_str($index, $html, $js, $css){
	if($html){
		$html = <<<TXT
		<div class="html-wrapper">
			<div class="btn-wrapper">
				<p class="language">HTML</p>
				<button id="btn-{$index}" class="btn-copy">Copy</button>
			</div>
			<code class="html">
				<p id="copy-{$index}" class="copy">{$html}</p>

			</code>
		</div>
TXT;
		$index += 1;
	}

	if($js){
		$js = <<<TXT
		<div class="js-wrapper">
			<div class="btn-wrapper">
				<p class="language">JS</p>
				<button id="btn-{$index}" class="btn-copy">Copy</button>
			</div>
			<code class="js">
				<p id="copy-{$index}" class="copy">{$js}</p>
			</code>
		</div>
TXT;
		$index += 1;
	}

	if($css){
		$css = <<<TXT
		<div class="css-wrapper">
			<div class="btn-wrapper">
				<p class="language">CSS</p>
				<button id="btn-{$index}" class="btn-copy">Copy</button>
			</div>
			<code class="css">
				<p id="copy-{$index}" class="copy">{$css}</p>
			</code>
		</div>
TXT;
		$index += 1;
	}

$code = <<<TXT
<div class="code-wrapper">
{$html}
{$js}
{$css}
</div>
TXT;

	return array($code, $index);
}