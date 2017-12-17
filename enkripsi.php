<?php
include './system/koneksi.php';
session_start();
if (empty($_SESSION['nip']) || empty($_SESSION['password']) || empty($_SESSION['level']))
    header("location:login_guru.php");

require 'header.php';
?>
<link rel="stylesheet" href="Datepicker/base/jquery.ui.all.css" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="Datepicker/jquery.js"></script>
<script type="text/javascript" src="Datepicker/jquery.ui.core.js"></script>
<script type="text/javascript" src="Datepicker/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="Datepicker/jquery.ui.widget.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tgl_ujian").datepicker({
            dateFormat: "yy/mm/dd",
            changeMonth: true,
            changeYear: true
        });
    });
</script>

<?php
require './view/view_enkripsi.php';
//require 'footer.php';

