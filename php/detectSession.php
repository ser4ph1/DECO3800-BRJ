<?php
session_start();
if (isset($_SESSION['username'])) {
  echo 'Session is active';
}else{
	echo 'Session is not active or my code is broken';
}
?>