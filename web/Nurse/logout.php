<?php
session_start();
unset($_SESSION['nrs_id']);
session_destroy();
header('location:../login/staff/index.php');
?>