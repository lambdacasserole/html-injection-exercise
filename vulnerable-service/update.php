<?php

// If this page was posted to.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Save email to database.
  file_put_contents('emails.txt', "\n"
    . date('Y/m/d') . ' ' . date('h:i:sa') . '|'
    . $_SERVER['REMOTE_ADDR'] . '|'
    . $_POST['email'], FILE_APPEND);

  // TODO: Use strip_tags to prevent inclusion of HTML payloads.
  // file_put_contents('emails.txt', "\n"
  //   . date('Y/m/d') . ' ' . date('h:i:sa') . '|'
  //   . $_SERVER['REMOTE_ADDR'] . '|'
  //   . strip_tags($_POST['email']), FILE_APPEND);

  // Redirect to home page with thank-you message.
  header("Location: /?action=thanks");
}
