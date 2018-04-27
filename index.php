<html>
<!--
 * Copyright ©<?php echo date('Y');?> Ronald Lamoreaux, DBA Chindraba
 *
 * This work is not licensed for use or distribution.
-->
<?php
include('cgi-bin/configure.php');
include('cgi-bin/contact_handler.php');
$page_name= filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
$page_data = array();
$page_links = array();
$pages_info = file("$pages_path/_pages.dat", FILE_IGNORE_NEW_LINES);
$page_names = array_map(function($data){$info = explode('µ',$data); return $info[0];},$pages_info);
if ('' == $page_name || ! in_array($page_name, $page_names) ) {
  $page_name = 'home';
}
foreach ($pages_info as $page_info) {
  $page_data = explode('µ', $page_info);
  $page_names[$page_data[0]] = $page_data[1];
  if ($page_name == $page_data[0]) {
    $page_title = $page_data[1];
    $page_desc = $page_data[2];
    $page_keywords = $page_data[3];
    $page_links[$page_data[0]] = "      <li>$page_title</li>\n";
    if ('home' == $page_name ){
      $meta_title = $company_name_title;
      $page_crumb = $company_name_html;
    } else {
      $meta_title = "$page_title | $company_name_title";
      $page_crumb = "$company_name_html :: $page_title";
    }
  } else {
    $page_links[$page_data[0]] = "      <li><a href='/$page_data[0]' title='$page_data[1]'>$page_data[1]</a></li>\n";
  }
}
?>
<?php include('cgi-bin/html_head.php'); ?>
<body>
<div id="page_box"><div id="page_wrapper">
<?php
    include('cgi-bin/page_nav.php');
    include('cgi-bin/page_header.php');
?>
<div id="content_wrapper"><?php
  $page_source = "$pages_path/$page_name";
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
