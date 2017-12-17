		<div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hasil Enkripsi
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Hasil Enkripsi
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Data Guru -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Hasil Enkripsi Soal Ujian</h3>
                        <h4>Admin dapat mengubah, menghapus data hasil enkripsi di halaman ini.</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-edit"></i> Hasil Enkripsi </h3>
                            </div>
                            <div class="panel-body">
                                <div class="flot-chart">
                                    <div class="flot-chart-content">
										
									<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="margin:20;">
										<tr>
											<th style="background:RoyalBlue;">No</th>
											<th style="background:RoyalBlue;">Mata Pelajaran</th>
											<th style="background:RoyalBlue;">Guru</th> 
											<th style="background:RoyalBlue;">Deskripsi</th>
											<th style="background:RoyalBlue;">Tahun Ajar</th>
											<th style="background:RoyalBlue;">Jenis Dokumen</th>
											<th style="background:RoyalBlue;">Tgl Ujian</th>
											<th style="background:RoyalBlue;">Jam</th>
											<th style="background:RoyalBlue;">Tgl upload</th>
											<th style="background:RoyalBlue;">Pengawas</th> 
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
																			
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- Data Guru -->
				

            </div>
        </div>
    </div>
  