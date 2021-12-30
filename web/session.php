<?php

if(!$_SESSION['email'] or empty($_SESSION['email']) or $_SESSION['email'] == ''){
	header('location: index.html');
}