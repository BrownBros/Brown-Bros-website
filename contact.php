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
<?php include('cgi-bin/page_header.php'); ?>
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
<?php include('cgi-bin/page_footer.php'); ?>
</div>
<div id="copyright">Site content Copyright &copy;2018 by Brown Bros. Heat &amp; Air.</div></div>
</body>
</html>
