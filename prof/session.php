<?php
if(!$_SESSION['id'] or empty($_SESSION['id']) or $_SESSION['id'] == ''){
	header('location: ../index.html');
}