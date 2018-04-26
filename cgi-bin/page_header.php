<header>
  <img id="logo" src="assets/<?php echo $logo_file; ?>">
  <address><?php
  echo $company_address_street . ', ' . $company_address_city . ', ' . $compay_address_state . ' ' . $company_address_zipcode;
  ?></address>
  <div id="license">AZ R.O.C. <span># <?php echo $contractor_license; ?></span></div>
  <div class="slogan"><?php echo $company_tagline; ?></div>
  <div id="company_name">Air Conditioning &amp; Heating Sales &amp; Service</div>
  <div><a href="tel:<?php echo $company_phone_url; ?>"><?php echo $company_phone_display;?></a></div>
  <div class="slogan"><?php echo $company_slogan; ?></div>
</header>
