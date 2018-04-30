<?php
    $sender_name =
    $sender_phone =
    $sender_email =
    $sender_confirm =
    $sender_memo =
    $error_name =
    $error_email =
    $error_phone =
    $error_memo =
    $error_message = "";
    $clear_to_send = 1;
    if(isset($_POST['sender_sent'])) {
      if (empty($_POST["sender_name"])) {
        $error_name = "Please enter your name.";
        $clear_to_send = 0;
      } else {
        $sender_name = filter_input( INPUT_POST, "sender_name", FILTER_SANITIZE_STRING);
        if (!preg_match("/^[\.,a-zA-Z ]*$/",$sender_name)) {
          $error_name = "Only letters and spaces are allowed";
          $clear_to_send = 0;
        }
      }
      if (empty($_POST["sender_phone"])) {
        $error_phone = "We need a phone number to reach you at";
        $clear_to_send = 0;
      } else {
        $sender_phone = $_POST["sender_phone"];
        $cleaned = preg_replace('/[^[:digit:]]/', '', $sender_phone);
        if (preg_match('/^1?(\d{3})(\d{3})(\d{4})$/', $cleaned, $matches) ) {
          $sender_phone = "({$matches[1]}) {$matches[2]}-{$matches[3]}";
        } elseif ( preg_match('/^1?(\d{3})(\d{4})$/', $cleaned, $matches) )  {
          $sender_phone = "{$matches[1]}-{$matches[2]}";
        } else {
          $error_phone = "The phone number does not look right.<br>If you have a business extension, please add that to the message rather than include it in the phone number.";
          $sender_phone = $_POST["sender_phone"];
          $clear_to_send = 0;
        }
      }
      if (empty($_POST["sender_email"]) || empty($_POST["sender_confirm"])) {
        $error_email = "We need your email to send the message";
        $clear_to_send = 0;
      } else {
        $sender_email = filter_input( INPUT_POST, "sender_email", FILTER_SANITIZE_EMAIL);
        $sender_confirm = filter_input( INPUT_POST, "sender_confirm", FILTER_SANITIZE_EMAIL);
        if ( $sender_email == $sender_confirm ) {
          if (! filter_var($sender_email, FILTER_VALIDATE_EMAIL) ) {
            $error_email = "Email address appears to be invalid";
            $clear_to_send = 0;
          }
        } else {
          $error_email = "The two email addresses do not match.";
          $clear_to_send = 0;
        }
      }
      if (empty($_POST["sender_memo"])) {
        $error_memo = "A message is required";
        $clear_to_send = 0;
      } else {
        $sender_memo = $_POST['sender_memo'];
      }
      if (isset($_POST['sender_human'])) {
        $log_line = implode('µ', array(gmdate('c'), $_SERVER['REMOTE_ADDR'], $_POST["sender_name"], $_POST["sender_email"], $_POST["sender_phone"], $_POST["sender_memo"]) );
        file_put_contents("contacts/dropped.log", $log_line.PHP_EOL , FILE_APPEND | LOCK_EX);
        $page_name = "no_thanks";
      } else {
        if( 1 == $clear_to_send ) {
          $now = time();
          $time_short = gmdate('c', $now);
          $time_long = date('r', $now);
          $confirm_email = "$sender_name <$sender_email>";
          $confirm_subject = "Contact message you left at www.BrownBros.net";
          $confirm_body = "Hello, $sender_name:
Thank you for contacting Brown Bros.
Your message was:
----
$sender_memo
----
Name: $sender_name <$sender_email>
Phone: $sender_phone

This is a Contact Confirmation email.
Your message has been sent to our mailbox.
We will contact you as soon as possible.

$time_long";
          $notice_email = $contact_email;
          $notice_subject = "Web contact from $sender_name <$sender_email>";
          $notice_body = "$time_long
A user $sender_name used the 'Contacted Us' page and sent this information:
Message:
-----
$sender_memo
-----
Name: $sender_name <$sender_email>
Phone: $sender_phone

A confirmational email was sent to them at the address they supplied.
$time_short";
          $headers = "From: noreply@BrownBros.net\nReply-To: noreply@BrownBros.net\n";
          if(mail($confirm_email, $confirm_subject, $confirm_body, $headers ) && mail($notice_email, $notice_subject, $notice_body, $headers )) {
            $log_line = implode('µ', array($time_short, $_SERVER['REMOTE_ADDR'], $_POST["sender_name"], $_POST["sender_email"], $_POST["sender_phone"], $_POST["sender_memo"]) );
            file_put_contents("contacts/sent.log", $log_line.PHP_EOL , FILE_APPEND | LOCK_EX);
            $page_name = 'thanks';
          } else {
            $error_message = "We're sorry! There was a problem sending your message.";
          }
        } else {
          $error_message = "Something was not correct. Please review your information and try again.";
        }
      }
    }
?>
