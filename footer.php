<?php

wp_footer();
require(dirname(__FILE__).'/variable.php');


echo <<<TXT
</div><!-- end content-container -->
{$pager}
<footer>
    <div class="footer-wrapper">
        created by kono
    </div>
</footer>

<script type="text/javascript">
    let path = '{$tmp_url}'
</script>
{$script_js}
<script src="{$tmp_url}/js/index.js"></script>
</body>
</html>
TXT;
?>
