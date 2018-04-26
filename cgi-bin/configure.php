<?php
// Site's domain name
$domain_name = "BrownBros.net";
// Site's domain name in non-scrapable format
$domain_name_safe = "BrownBros&#46;net";
// Site's domain url. Usually "www." prefixed to the domain name
$domain_url = "www.BrownBros.net";

// Company contact info
$company_name_title = "Brown Bros. Heat &amp; Air";
$company_name_html = "Brown Bros. Heat &amp; Air";
$company_name_page = "Brown Bros. Air Conditioning &amp; Heating Sales &amp; Service";
$company_address_street = "889 S. Derby Cir.";
$company_address_city = "Golden Valley";
$compay_address_state = "AZ";
$company_address_zipcode = "86416";
$company_phone_display = "(928) 249-4406";
$company_phone_url = "928-249-4406";
// Name of the "contact" for the site
$contact_name = "Mike Brown";

// The email address used for sending "Contact Us" page data
$contact_email = "mike@$domain_name";
// The email address where users can contact the site in non-scrapeable format
$contact_email_safe = "mike&#64;$domain_name_safe";

$company_tagline = '"Serving All of Golden Valley"';
$company_slogan = "We not only work in Golden Valley, we also live in Golden Valley";
$contractor_license = "306454" ;

// list of credit cards accepted. Each must have a like-named .png file
// in the /cards directory
$accepted_cards = array("visa", "master", "amex", "discover");
// Diners' club status is unknown at this time, so not in the list
// $accepted_cards = array("visa", "master", "amex", "discover", "diners");

$site_keywords = "air conditioning, heating, sales, service, repair, installation";
$root_path = getenv('DOCUMENT_ROOT');
$logo_file = "main_logo.png";

$pages_path = "$root_path/pages"
?>
