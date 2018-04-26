<footer>
  <div>Any time you need us! Week-ends, holidays, we're here for you!</div><?php
// This line in the footer makes no sense, and will probably be removed later.
// If the visitor sees this page, they already have the URL, and don't need it displayed.
  ?><div>Visit: <a href="http://<?php echo $domain_url; ?>"><?php echo $domain_url; ?></a></div>
  <div>Contact: <a href="mailto:<?php echo $contact_email_safe; ?>"><?php echo $contact_email_safe; ?></a></div>
  <div>All major credit cards accepted</div>
  <div>
<?php foreach ($accepted_cards as $accepted_card) { ?>
    <img class="card_logo" src="cards/<?php echo $accepted_card; ?>.png" />
<?php } ?>  </div>
</footer>
