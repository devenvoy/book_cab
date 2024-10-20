<?php
$connect = mysqli_connect("localhost", "root", "", "db_car_c");
if (!$connect)
    echo "Connection Failed" or die(mysqli_connect_error());
?>