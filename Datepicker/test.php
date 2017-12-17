<link rel="stylesheet" href="base/jquery.ui.all.css" type="text/css">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.ui.core.js"></script>
<script type="text/javascript" src="jquery.ui.datepicker.js"></script>
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


<input type="text"  id="tgl_ujian" name="tgl_ujian"  placeholder="Tanggal ujian" required>
