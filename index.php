<?php
// echo "Day la trang index.php";
// header("Location: login.php"); // redirect to login.php
require_once("login.php");
if ($_SESSION["logged"] == 1)
    header("Location: table-datatable.php");
else
    header("Location: auth-login.php");