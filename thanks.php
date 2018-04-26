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
<?php
    include('cgi-bin/page_nav.php');
    include('cgi-bin/page_header.php');
?>
<div id="content_wrapper">

  <form name="contact_bros" id="contact_bros" autocomplete="on" method="post" enctype="multipart/form-data" action="/contact">
    <h1>Thank you for contacting us.</h1>
    <div>We appreciate your time and we will contact you as soon as we reasonably can.</div>
    <br>
    <div>A copy of your message was emailed to you for your records. The email was sent to the email address you provided.</div>
    <br>
    <div>The message sent was:</div>
    <textarea name="sender_memo" id="sender_memo" rows="15" disabled="disabled">Message Content</textarea><br>
  </form>

</div>
<?php include('cgi-bin/page_footer.php'); ?>
</div>
<div id="copyright">Site content Copyright &copy;2018 by Brown Bros. Heat &amp; Air.</div></div>
</body>
</html>
