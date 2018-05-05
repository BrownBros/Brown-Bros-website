<?php
/**
 * Copyright: ©2018 Ronald Lamoreaux, DBA Chindraba
 * License: This work is not licensed for use or distribution other
 *          other than for the website it is built for.
 * Project: www.BrownBros.net
 **/
function build_content_header($page_id, $page_data_collection) {
  require 'templates/content_header.php';
  return sprintf($content_header, implode('', array(
    sprintf($content_header_logo, Config::get('logo_file')),
    sprintf($content_header_address,
      Config::get('company_address_street'),
      Config::get('company_address_city'),
      Config::get('compay_address_state'),
      Config::get('company_address_zipcode')
    ),
    sprintf($content_header_license, Config::get('contractor_license')),
    sprintf($content_header_tagline, Config::get('company_tagline')),
    sprintf($content_header_desc,Config::get('company_desc')),
    sprintf($content_header_phone,
      Config::get('company_phone_url'),
      Config::get('company_phone_display')
    ),
    sprintf($content_header_slogan, Config::get('company_slogan'))
  )));
}
?>