<?php
/**
 * Copyright: ©2018 Ronald Lamoreaux, DBA Chindraba
 * License: This work is not licensed for use or distribution other
 *          other than for the website it is built for.
 * Project: www.BrownBros.net
 **/
function build_content_footer() {
  require 'templates/content_footer.php';
  $card_stack = array();
  foreach (Config::get('accepted_cards') as $card_name) {
    $card_stack[] = sprintf($credit_card_image, $card_name);
  }
  return sprintf($content_footer, implode('', array(
    sprintf($content_footer_closer, Config::get('footer_tag_line')),
    sprintf($content_footer_web_link, Config::get('domain_url')),
    sprintf($content_footer_email_link, Config::get('contact_email_safe')),
    sprintf($credit_card_row, implode(' ', $card_stack))
  )));
}
?>
