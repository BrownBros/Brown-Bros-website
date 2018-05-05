<?php
/**
 * Copyright: ©2018 Ronald Lamoreaux, DBA Chindraba
 * License: This work is not licensed for use or distribution other
 *          other than for the website it is built for.
 * Project: www.BrownBros.net
 **/
function build_html_header($id, $data_set) {
  require 'templates/html_header.php' ;
  if ($id == $data_set['by_name']['home']) {
    $page_title = Config::get('company_name_title');
  } else {
    $page_title = implode(' | ', array($data_set[$id]['page_title'],  Config::get('company_name_title')));
  }
  $page_desc = implode(' ', array(Config::get('site_desc'), $data_set[$id]['page_desc']));
  preg_replace('/"/', '', $page_desc);
  $page_keywords = implode(',', array($data_set[$id]['page_keywords'], Config::get('site_keywords')));
  preg_replace('/"/', '', $page_keywords);
  $style_stack = array();
  foreach (Config::get('style_sheets') as $sheet_name) {
    $style_stack[] = sprintf($html_header_style, $sheet_name);
  }
  return sprintf($html_header_body, implode('', array(
    sprintf($html_header_title, $page_title),
    sprintf($html_header_desc, $page_desc),
    sprintf($html_header_keywords, $page_keywords),
    implode('', $style_stack)
  )));
}
?>