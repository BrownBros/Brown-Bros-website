
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
