<?php

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

function build_nav_links($id, $data_set) {
  require "templates/nav_menus.php";
  $top_links = array();
  $foot_links = array();
  $crumbs = array();
  $_style = '';
  $_format = '%s';
  $page_parent = $data_set[$id]['parent_id'];
  if ( 0 == $page_parent ) {
    $self_style = 'top_nav_1';
    $child_style = 'top_nav_2';
  } else {
    $self_style = 'top_nav_2';
    $child_style = 'top_nav_3';
  }
  foreach ($data_set['main_nav'] as $candidate_id) {
    $candidate_parent = $data_set[$candidate_id]['parent_id'];
    if ( $id == $candidate_id ) {
      $_style = $self_style;
      $_format = $top_nav_self;
    } elseif ( $data_set[$candidate_id]['always_show'] && ! $candidate_parent ) {
      $_style = '';
      $_format = $top_nav_always;
    } elseif ( $id == $candidate_parent ) {
      $_style = $child_style;
      $_format = $top_nav_child;
    } elseif ( $page_parent == $candidate_parent ) {
      $_style = $self_style;
      $_format = $top_nav_sibling;
    }
    $top_links[] = sprintf($_format,
      $data_set[$candidate_id]['link_name'],
      $data_set[$candidate_id]['page_title'],
      $_style);
  }
  $crumbs[] = sprintf($crumb_nav_tail, $data_set[$id]['page_title']);
  $current_id = $page_parent;
  while ( 0 != $current_id ) {
    array_unshift($crumbs, sprintf($crumb_nav_link,
      $data_set[$current_id]['link_name'],
      $data_set[$current_id]['page_title']
    ));
    $current_id = $data_set[$current_id]['parent_id'];
  }
  array_unshift($crumbs, sprintf($crumb_nav_tail, Config::get('company_name_html')));
  foreach ($data_set['foot_nav'] as $candidate_id) {
    $candidate_parent = $data_set[$candidate_id]['parent_id'];
    if ( $data_set[$candidate_id]['always_show'] || $id == $candidate_parent ) {
        $foot_links[] = sprintf($foot_nav_link,
          $data_set[$candidate_id]['link_name'],
          $data_set[$candidate_id]['page_title']
        );
    }
  }
  $top_nav_html = sprintf($top_nav_body,
    implode('', $top_links),
    sprintf($crumb_nav_line, implode(' > ', $crumbs))
  );
  $foot_nav_html = sprintf($foot_nav_line, implode(' | ', $foot_links));
  return array($top_nav_html, $foot_nav_html);
}

function build_html_head($id, $data_set) {
  require 'templates/html_head.php' ;
  if ($id == $data_set['by_name']['home']) {
    $page_title = Config::get('company_name_title');
  } else {
    $page_title = implode(' | ', array($page_data_collection[id]['page_title'],  Config::get('company_name_title')));
  }
  $title_html = sprintf($head_title, $page_title);
  $page_keywords = implode(',', array($data_set[$id]['page_keywords'], Config::get('site_keywords')));
  preg_replace('/"/', '', $page_keywords);
  $keywords_html = sprintf($head_keyword, $page_keywords);
  $page_desc = implode(' ', array(Config::get('site_desc'), $data_set[$id]['page_desc']));
  preg_replace('/"/', '', $page_desc);
  $desc_html = sprintf($head_desc, $page_desc);
  $page_styles = array_map(function($sheet_name){return sprintf('<link rel="stylesheet" type="text/css" href="css/%s.css" media="screen, handheld" />', $sheet_name);}, Config::get('style_sheets'));
  $style_html = implode('', $page_styles);
  return sprintf($html_head_body, $title_html, $keywords_html, $desc_html, $style_html);
}

function build_body_head($page_id, $page_data_collection) {
  require 'templates/page_header.php';
  $header_html = sprintf($header_body,
    Config::get('logo_file'),
    Config::get('company_address_street'),
    Config::get('company_address_city'),
    Config::get('compay_address_state'),
    Config::get('company_address_zipcode'),
    Config::get('contractor_license'),
    Config::get('company_tagline'),
    Config::get('company_name_page'),
    Config::get('company_phone_url'),
    Config::get('company_phone_display'),
    Config::get('company_slogan')
  );
  return $header_html;
}
?>