<html>
<!--
 * Copyright ©<?php echo date('Y');?> Ronald Lamoreaux, DBA Chindraba
 *
 * This work is not licensed for use or distribution.
-->
<?php
include('cgi-bin/contact_handler.php');
$page_name= filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
?>
<?php include('cgi-bin/html_head.php'); ?>
<body>
<div id="page_box"><div id="page_wrapper">
<?php
    include('cgi-bin/page_nav.php');
    include('cgi-bin/page_header.php');
?>
<div id="content_wrapper"><?php
  $page_source = getenv('DOCUMENT_ROOT') . '/pages/' . $page_name;
  if ( file_exists("$page_source.php") ) {
    include("$page_source.php");
  } elseif ( file_exists("$page_source.html") ) {
    readfile("$page_source.html");
  } elseif ( file_exists("$page_source") && is_dir("$page_source") ){
    if ( file_exists("$page_source/index.php") ) {
      include("$page_source/index.php");
    } elseif ( file_exists("$page_source/index.html") ) {
      readfile("$page_source/index.html");
    } else {
      echo "<div><b>Cannot find a file to use for the '$page_name ' page.</b></div>\n";
    }
  } else {
    echo "<div><b>Cannot find a directory or file to use for the '$page_name ' page.</b></div>\n";
  }
?></div>
<?php include('cgi-bin/page_footer.php'); ?>
</div>
<div id="copyright">Site content Copyright &copy;<?php echo date('Y');?> by Brown Bros. Heat &amp; Air.</div></div>
</body>
</html>
