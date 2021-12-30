<?php
$link = mysqli_connect("127.0.0.1", "root", "madjid", "univ");
$link -> set_charset("utf8");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}