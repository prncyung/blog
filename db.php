<?php

//for offline
$db = mysqli_connect("localhost", "root", "", "blog");
if (mysqli_connect_errno()) {
    echo "failed to conncet" . mysqli_connect_error();
}

//for online
/*
$db = mysqli_connect("localhost", "infonati_root", "blog123@#", "infonati_blog");
if (mysqli_connect_errno()) {
    echo "failed to conncet" . mysqli_connect_error();
}*/
