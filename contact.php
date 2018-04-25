<html>
<!--
 * Copyright ©2018 Ronald Lamoreaux, DBA Chindraba
 *
 * This work is not licensed for use or distribution.
-->
<head>
  <title>Brown Bros. Air Conditioning &amp; Heating Sales &amp; Service</title>
  <meta name="author" content="Ronald Lamoreaux, DBA Chindraba" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Brown Bros Air Conditioning and Heating Sales and Service" />
  <meta name="keywords" content="air conditioning, heating, sales, service, repair, installation" />
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/site-style.css" media="screen, handheld" />
  <link rel="stylesheet" type="text/css" href="css/content-style.css" media="screen, handheld" />
</head>
<body>
<div id="page_box"><div id="page_wrapper">
<nav role="navigation">
  <div id="menuToggle">
    <input type="checkbox" />
    <span></span>
    <span></span>
    <span></span>
    <ul id="menu">
      <li><a href='/home' title='Home'>Home</a></li>
      <li><a hrep='/specials' title="Specials">Specials</a></li>
      <li><a href='/about' title='About Us'>About Us</a></li>
      <li><a href='/info' title='Information'>Information</a></li>
      <li>Contact Us</li>
      <li><a href='/faq' title='FAQ'>FAQ</a></li>
    </ul>
  </div>
  <div class="crumb">Brown Bros. Heat &amp; Air</div>
</nav>
<header>
  <img id="logo" src="assets/main_logo.png">
  <address>889 S. Derby Cir., Golden Valley, AZ 86416</address>
  <div id="license">AZ R.O.C. <span># 306454</span></div>
  <div class="slogan">"Serving All of Golden Valley"</div>
  <div id="company_name">Air Conditioning &amp; Heating Sales &amp; Service</div>
  <div><a href="tel:928-249-4406">(928) 249-4406</a></div>
  <div class="slogan">We not only work in Golden Valley, we also live in Golden Valley</em></div>
</header>
<div id="content_wrapper">

  <form name="contact_brownbros" id="contact_brownbros" autocomplete="on" method="post" enctype="multipart/form-data" action="/contact">
    <div>Please enter your information.</div>
    <div class="contact_error"><?php echo $success_message;?></div>
    <input id="contact_from" type="checkbox" autocomplete="off" name="sender_human" value="human">
    <div class="contact_error"><?php echo $error_name;?></div><input class="contact_form" type="text" autocomplete="on" placeholder="Your Name" name="sender_name" value="<?php echo $sender_name;?>" required><br>
    <div class="contact_error"><?php echo $error_phone;?></div><input class="contact_form" type="tel" autocomplete="on" placeholder="☎ A telephone number where we can reach you" name="sender_phone" value="<?php echo $sender_phone;?>" required><br>
    <div class="contact_error"><?php echo $error_email;?></div><input class="contact_form" type="email" autocomplete="on" placeholder="📧 Your email address" name="sender_email" value="<?php echo $sender_email;?>" required><br>
    <input class="contact_form" type="email" autocomplete="on" placeholder="📧 Confirm your email address" name="sender_confirm" value="<?php echo $sender_confirm;?>" required><br>
    <div>Please type your message in the box below</div>
    <div class="contact_error"><?php echo $error_memo;?></div><textarea name="sender_memo" id="sender_memo" placeholder="Type your message here ..." rows="15"><?php echo $sender_memo;?></textarea><br>
    <input type="submit" name="sender_sent" id="sender_sent" value="Send Message" />
  </form>

</div>
<footer>
  <div>Any time you need us! Week-ends, holidays, we're here for you!</div>
  <div>Visit: <a href="http://www.BrownBros.net">www.BrownBros.net</a></div>
  <div>Contact: <a href="mailto:mike&#64;BrownBros&#46;net">mike&#64;BrownBros&#46;net</a></div>
  <div>All major credit cards accepted</div>
  <div>
    <img class="card_logo" src="cards/visa.png" />
    <img class="card_logo" src="cards/master.png" />
    <img class="card_logo" src="cards/amex.png" />
    <img class="card_logo" src="cards/discover.png" />
<!-- Diners Club card acceptance is not yet confirmed
    <img class="card_logo" src="cards/diners.png" />
-->
  </div>
</footer>

</div>
<div id="copyright">Site content Copyright &copy;2018 by Brown Bros. Heat &amp; Air.</div></div>
</body>
</html>
