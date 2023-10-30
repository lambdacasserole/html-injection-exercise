<?php

// Note victim IP address.
file_put_contents("captured.txt", $_SERVER['REMOTE_ADDR']);

// Send user on to redirect.
header("Location: /pixel.png");
