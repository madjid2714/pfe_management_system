<?php
$link = mysqli_connect("localhost", "root", "madjid", "univ");
$link -> set_charset("utf8");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
