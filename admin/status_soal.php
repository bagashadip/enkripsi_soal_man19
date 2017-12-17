<?php

include '../system/koneksi.php';
session_start();
if (empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['level']))
    header("location:login_admin.php");

require 'header.php';
require './view/view_status_soal.php';
require 'footer.php';

