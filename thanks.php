<html>
<!--
 * Copyright ©2018 Ronald Lamoreaux, DBA Chindraba
 *
 * This work is not licensed for use or distribution.
-->
<?php include('cgi-bin/html_head.php'); ?>
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
