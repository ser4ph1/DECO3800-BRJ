<?php
/*
 * Returns a message to a validated user
 *
 * And returns a message as text/plain
 */
session_start();

header("Content-Type: text/plain");

//$authenticated = check_login();
//if ($authenticated == true) {
echo "" . $_SESSION['username'] . "";
//}
