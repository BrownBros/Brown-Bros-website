<?php
/**
 * Copyright: ©2018 Ronald Lamoreaux, DBA Chindraba
 * License: This work is not licensed for use or distribution other
 *          other than for the website it is built for.
 * Project: www.BrownBros.net
 **/
function build_crumb_nav($id, $data_set) {
  require 'templates/nav_menus.php';
  $crumb_list = array();
  $crumb_list[] = sprintf($nav_crumb_tail, $data_set[$id]['page_title']);
  $current_id = $data_set[$id]['parent_id'];
  while ( 0 != $current_id ) {
    array_unshift($crumb_list, sprintf($nav_crumb_link,
      $data_set[$current_id]['link_name'],
      $data_set[$current_id]['page_title']
    ));
    $current_id = $data_set[$current_id]['parent_id'];
  }
  array_unshift($crumb_list, sprintf($nav_crumb_link, 'home', Config::get('company_name_html')));
  return sprintf($nav_crumb, implode(' &gt; ', $crumb_list));
}

function build_foot_nav($id, $data_set) {
  require 'templates/nav_menus.php';
  $foot_links = array();
  foreach ($data_set['foot_nav'] as $candidate_id) {
    $candidate_parent = $data_set[$candidate_id]['parent_id'];
    if ( $data_set[$candidate_id]['always_show'] || $id == $candidate_parent ) {
        $foot_links[] = sprintf($nav_foot_link,
          $data_set[$candidate_id]['link_name'],
          $data_set[$candidate_id]['page_title']
        );
    }
  }
  return sprintf($nav_foot, implode(' | ', $foot_links));
}

function build_top_nav($id, $data_set) {
  require 'templates/nav_menus.php';
  $top_links = array();
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
    $_style = $self_style;
    if ( $id == $candidate_id ) {
      $_format = $nav_top_self;
    } elseif ( $data_set[$candidate_id]['always_show'] && ! $candidate_parent ) {
      $_format = $nav_top_always;
    } elseif ( $id == $candidate_parent ) {
      $_format = $nav_top_child;
      $_style = $child_style;
    } elseif ( $page_parent == $candidate_parent ) {
      $_format = $nav_top_sibling;
    }
    $top_links[] = sprintf($_format,
      $data_set[$candidate_id]['link_name'],
      $data_set[$candidate_id]['page_title'],
      $_style);
  }
  return sprintf($nav_top_menu, implode('', $top_links));
}

function build_nav_menus($id, $data_set) {
  require 'templates/nav_menus.php';
  return array(
    sprintf($nav_top,
      build_top_nav($id, $data_set),
      build_crumb_nav($id, $data_set)
    ),
    build_foot_nav($id, $data_set)
  );
}
?>
