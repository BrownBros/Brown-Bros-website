
<form name="contact_bros" id="contact_bros" autocomplete="on" method="post" enctype="multipart/form-data" action="/contact">
  <h1>Thank you for contacting us.</h1>
  <div>We appreciate your time and we will contact you as soon as we reasonably can.</div>
  <br>
  <div>A copy of your message was emailed to you for your records. The email was sent to <?php echo $sender_email;?>.</div>
  <br>
  <div>The message sent was:</div>
  <textarea name="sender_memo" id="sender_memo" rows="15" disabled="disabled"><?php echo $sender_memo;?></textarea><br>
</form>
