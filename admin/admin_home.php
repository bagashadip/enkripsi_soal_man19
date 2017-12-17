<?php
session_start();
if (empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['level']))
    header("location:login_admin.php");

if($_SESSION['level'] != 'admin')
    header("location:../404.php");
require 'header.php';
require 'view/view_admin_home.php';
require 'footer.php';

