<?php
$page_name= filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
?>
<html>
<!--
 * Copyright ©2018 Ronald Lamoreaux, DBA Chindraba
 *
 * This work is not licensed for use or distribution.
-->
<?php include('cgi-bin/html_head.php'); ?>
<body>
<div id="page_box"><div id="page_wrapper">
<?php
    include('cgi-bin/page_nav.php');
    include('cgi-bin/page_header.php');
?>
<div id="content_wrapper"><?php include("pages/$page_name.php"); ?></div>
<?php include('cgi-bin/page_footer.php'); ?>
</div>
<div id="copyright">Site content Copyright &copy;2018 by Brown Bros. Heat &amp; Air.</div></div>
</body>
</html>
