<?php
/**
 * Copyright: ©2018 Ronald Lamoreaux, DBA Chindraba
 * License: This work is not licensed for use or distribution other
 *          other than for the website it is built for.
 * Project: www.BrownBros.net
 **/
class Config {
  private static $config = null;
  public static function init() {
    self::$config = require "includes/configure.php";
  }
  public static function get($key) {
    return self::$config[$key];
  }
} Config::init();

require_once 'includes/templates/content_header.php';
require_once 'includes/templates/content_footer.php';
require_once 'includes/templates/html_header.php';
require_once 'includes/templates/nav_menus.php';

function retrieve_page_data() {
  $file_data = file(Config::get('pages_path') . "/_pages.dat", FILE_IGNORE_NEW_LINES);
  $data_records = array_map(function($_file_record) {
    $_data_record = array();
    list(
      $_data_record['page_id'],
      $_data_record['parent_id'],
      $_data_record['main_order'],
      $_data_record['foot_order'],
      $_data_record['link_name'],
      $_data_record['page_title'],
      $_data_record['page_desc'],
      $_data_record['page_keywords'],
      $_data_record['always_show']
    ) = explode('µ', $_file_record);
    return $_data_record;
  }, $file_data);
  return $data_records;
}

function locate_page_content($page_name) {
  $_source = null;
  $_handler = 'none';
  $page_source = Config::get('pages_path') . "/$page_name";
  if ( file_exists("$page_source.php") ) {
    $_source = "$page_source.php";
    $_handler = 'include';
  } elseif ( file_exists("$page_source.html") ) {
    $_source = "$page_source.html";
    $_handler = 'read';
  } elseif ( file_exists("$page_source") && is_dir("$page_source") ){
    if ( file_exists("$page_source/index.php") ) {
      $_source = "$page_source/index.php";
      $_handler = 'include';
    } elseif ( file_exists("$page_source/index.html") ) {
      $_source = "$page_source/index.html";
      $_handler = 'read';
    }
  }
  return array($_handler, $_source);
}

function build_page_meta() {
/*
 * Expecting file to be:
 *    page_id,       // starts at 1
 *    parent_id      // id=0: top-level page (no parent)
 *    main_order     // min:1, lower is higher on the list
 *                   // 0 = not shown
 *    foot_order     // min:1, lower is on the left
 *                   // 0 = not shown
 *    link_name      // used in the URL
 *    page_title     // used for display of links and title bar
 *    page_desc      // added to the site description for the page
 *    page_keywords  // added to the site keywords for the page
 *    always_show    // link shows without regard to page level
 */
  $page_collective = array();
  $page_data_records = retrieve_page_data();
  foreach ($page_data_records as $page_data_record) {
    $page_name = $page_data_record['link_name'];
    list(
      $page_data_record['handler'],
      $page_data_record['source']
    ) = locate_page_content($page_name);
    if ('none' != $page_data_record['handler']) {
      $page_id = $page_data_record['page_id'];
      $page_collective['names'][] = $page_name;
      $page_collective[$page_id] = $page_data_record;
      $page_collective['by_name'][$page_name] = $page_id;
      $page_collective['by_parent'][$page_data_record['parent_id']][] = $page_id;
      if ( 0 != $page_data_record['main_order'] ) {
        $page_collective['main_nav'][$page_data_record['main_order']] = $page_id;
      }
      if ( 0 != $page_data_record['foot_order'] ) {
        $page_collective['foot_nav'][$page_data_record['foot_order']] = $page_id;
      }
    }
  }
  return $page_collective;
}


?>
