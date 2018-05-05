<!DOCTYPE html>
<html>
<?php
require "includes/functions.php";
$debug_data = '';
$page_name= filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
$page_data_collection = build_page_meta();
if ('' == $page_name || ! in_array($page_name, $page_data_collection['names']) ) {
  $page_name = 'home';
}

// require 'cgi-bin/contact_handler.php';

$page_id = $page_data_collection['by_name'][$page_name];

$html_header = build_html_header($page_id, $page_data_collection);
list($nav_top_html, $nav_foot_html) = build_nav_menus($page_id, $page_data_collection);
$content_header_html = build_content_header($page_id, $page_data_collection);
$content_footer_html = build_content_footer();

echo <<<PART_1
<!--
/**
 * Copyright: ©<?php echo date('Y');?> Ronald Lamoreaux, DBA Chindraba
 * License: This work is not licensed for use or distribution other
 *          other than for the website it is built for.
 * Project: www.BrownBros.net
 **/
-->
$html_header
<body>
<div id="page_box"><div id="page_wrapper">
$nav_top_html
$content_header_html
<div id="content_wrapper">
PART_1;
  $page_source = Config::get('pages_path') . "/$page_name";
  if ( file_exists("$page_source.php") ) {
    require "$page_source.php";
  } elseif ( file_exists("$page_source.html") ) {
    readfile("$page_source.html");
  } elseif ( file_exists("$page_source") && is_dir("$page_source") ){
    if ( file_exists("$page_source/index.php") ) {
      require "$page_source/index.php";
    } elseif ( file_exists("$page_source/index.html") ) {
      readfile("$page_source/index.html");
    } else {
      echo "<div><b>Cannot find a file to use for the '$page_name ' page.</b></div>\n";
    }
  } else {
    echo "<div><b>Cannot find a directory or file to use for the '$page_name ' page.</b></div>\n";
  }
echo <<<PART_2
</div>
$content_footer_html
</div>
<div id="copyright">Site content Copyright &copy;2018 by Config::get('company_name_html')</div></div>'
</body>
</html>
PART_2;
?>
