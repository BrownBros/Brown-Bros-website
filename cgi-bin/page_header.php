<header>
  <img id="logo" src="assets/<?php echo Config::get('logo_file'); ?>">
  <address><?php
  echo Config::get('company_address_street') . ', ' . Config::get('company_address_city') . ', ' . Config::get('compay_address_state') . ' ' . Config::get('company_address_zipcode');
  ?></address>
  <div id="license">AZ R.O.C. <span># <?php echo Config::get('contractor_license'); ?></span></div>
  <div class="slogan"><?php echo Config::get('company_tagline'); ?></div>
  <div id="company_name"><?php echo Config::get('company_name_page'); ?></div>
  <div><a href="tel:<?php echo Config::get('company_phone_url'); ?>"><?php echo Config::get('company_phone_display');?></a></div>
  <div class="slogan"><?php echo Config::get('company_slogan'); ?></div>
</header>
