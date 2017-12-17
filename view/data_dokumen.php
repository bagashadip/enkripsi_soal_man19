<?php
session_start();
	if (!($_SESSION['username'] && $_SESSION['password'] && $_SESSION['level'])){
		header("location:index.php");
	}else{
		if($_SESSION['level'] == '2'){
			header("location:home_spv.php");
		}else if($_SESSION['level'] == '3'){
			header("location:home_dosen.php");
		}
	}		
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Dokumen </title>
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" / >
	</head>
	
	<body>
		<ul class="nav nav-tabs">
			<li class="active" style="margin:10;"><a href ="home_admin.php">Home</a></li>
			<li class="active" style="margin:10;"><a href = "data_spv.php">SPV</a></li>
			<li class="active" style="margin:10;"><a href = "data_dosen.php">Dosen</a></li>
			<li class="active" style="margin:10;"><a href = "data_matkul.php">Matkul</a></li>
			<li class="active" style="margin:10;"><a href = "data_dokumen.php">Dokumen</a></li>
			<li class="active" style="margin:10;"><a href = "panduan_admin.php">Help</a></li>
			<li class="active" style="margin:10;"><a href = "logout.php">Log Out</a></li>
			<img src="img/LABICTUBL.jpg"style="width:150px;margin:20;" align="right" class="hidden-xs"/></a></li>
		</ul>

<br><br>
	<center>
		<form action="" method="POST" form class="form-horizontal" >	
			<table border="2" width ="100%">
				<tr>
					<th style="background:RoyalYellow;">
						<h3><span style=color:white><i class="glyphicon glyphicon-lock">&nbsp;Data Hasil Enkripsi Soal Ujian</i></span></h3>
					</th>
				</tr>
			</table>
			<br>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="margin:20;">
		<tr>
			<th style="background:RoyalBlue;">No</th>
			<th style="background:RoyalBlue;">Mata Kuliah</th>
			<th style="background:RoyalBlue;">Dosen</th> 
			<th style="background:RoyalBlue;">Deskripsi</th>
			<th style="background:RoyalBlue;">Semester</th>
			<th style="background:RoyalBlue;">Tahun Ajar</th>
			<th style="background:RoyalBlue;">Jenis Dokumen</th>
			<th style="background:RoyalBlue;">Tgl Ujian</th>
			<th style="background:RoyalBlue;">Jam</th>
			<th style="background:RoyalBlue;">Tgl upload</th>
			<th style="background:RoyalBlue;">Spv</th> 
			<th style="background:RoyalBlue;">Password</th>
			<th style="background:RoyalBlue;">Action</th> 
		</tr>
						
<?php
    include 'koneksi.php';
        $query = "select dokumen.*, dosen.nm_dosen,spv.nama_spv,matakuliah.nm_mk from dosen,dokumen,spv,matakuliah
					where dokumen.nip = dosen.nip and dokumen.nim = spv.nim and dokumen.id_mk = matakuliah.id_mk ";
        $exe = mysql_query($query);
		$no = 1;
		$id_dok = null;
            while($row = mysql_fetch_assoc($exe)){
				$id_dok = $row['id_dok'];
                $a = $row['nm_mk'];
                $b = $row['nm_dosen'];
				$c = $row['deskripsi'];
				$d = $row['semester'];
				$e = $row['thn_ajar'];
                $f = $row['jns_ujian'];
				$g = $row['tgl_ujian'];
				$h = $row['jam'];
				$i = $row['tgl_upload'];
                $j = $row['nama_spv'];
                $k = base64_decode($row['key']);
					echo "<tr><td>$no</td><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td><td>$f</td><td>$g</td><td>$h</td><td>$i</td><td>$j</td><td>$k</td>
							
							<td>
								<a class='btn btn-info' href='dekripsi.php?id=$id_dok'>Dekripsi
									<i class='glyphicon glyphicon-download-alt icon-white'></i>	
								</a>
							</td>
						</tr>";
					$no++;
				}
?>
	</table>
</body>
</html>

			