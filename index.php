<?php
include './system/koneksi.php';
session_start();
if(empty($_SESSION['nip']) || empty($_SESSION['password']) || empty($_SESSION['level']))
    header("location:login_guru.php");
    

require 'header.php';
require './view/view_guru_home.php';
require 'footer.php';

