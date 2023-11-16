<?php

// If this page was posted to.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  file_put_contents('emails.txt', "\n"
    . date('Y/m/d') . ' ' . date('h:i:sa') . '|'
    . $_SERVER['REMOTE_ADDR'] . '|'
    . strip_tags($_POST['email']), FILE_APPEND);
  header("Location: /?action=thanks");
}
