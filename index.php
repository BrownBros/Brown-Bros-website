<html>
<!--
 * Copyright ©<?php echo date('Y');?> Ronald Lamoreaux, DBA Chindraba
 *
 * This work is not licensed for use or distribution.
-->
<?php
class Config {
  private static $config = null;
  public static function init() {
    self::$config = require "cgi-bin/configure.php";
  }
  public static function get($key) {
    return self::$config[$key];
  }
} Config::init();

require "cgi-bin/functions.php";

$page_name= filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
$page_data_collection = build_page_meta();

if ('' == $page_name || ! in_array($page_name, $page_data_collection['names']) ) {
  $page_name = 'home';
}

require 'cgi-bin/contact_handler.php';

$page_id = $page_data_collection['by_name'][$page_name];
list($top_nav_html, $foot_nav_html) = build_nav_links($page_id, $page_data_collection);
$head_html = build_html_head($page_id, $page_data_collection);
$header_html = build_body_head($page_id, $page_data_collection);


echo $head_html;


?>
<body>
<div id="page_box"><div id="page_wrapper">
<?php
    echo $top_nav_html;
    echo $header_html;
?>
<div id="content_wrapper"><?php
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
?></div>
<?php require 'cgi-bin/page_footer.php'; ?>
</div>
<?php echo '<div id="copyright">Site content Copyright &copy;' . date('Y') . ' by ' . Config::get('company_name_html') . '.</div></div>'; ?>
</body>
</html>
