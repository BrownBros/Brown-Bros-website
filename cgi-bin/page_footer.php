<footer>
  <div>Any time you need us! Week-ends, holidays, we're here for you!</div><?php
// This line in the footer makes no sense, and will probably be removed later.
// If the visitor sees this page, they already have the URL, and don't need it displayed.
  echo '  <div>Visit: <a href="http://' . Config::get('domain_url') . '">' . Config::get('domain_url') . '</a></div>'; ?>
  <div>Contact: <a href="mailto:<?php echo Config::get('contact_email_safe') . '">' . Config::get('contact_email_safe'); ?></a></div>
  <div>All major credit cards accepted</div>
  <div>
<?php foreach (Config::get('accepted_cards') as $accepted_card) { ?>
    <img class="card_logo" src="cards/<?php echo $accepted_card; ?>.png" />
<?php } ?>  </div>
</footer>
