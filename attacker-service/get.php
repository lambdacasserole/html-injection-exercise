<?php

// This is the file in which the victim's IP will be captured.
$CAPTURE_FILE = 'captured.txt';

// If file unlocked, return captured text file.
if (!file_exists('.lock') && file_exists($CAPTURE_FILE)) {
		echo file_get_contents($CAPTURE_FILE);
} else {
		echo '';
}
