<?php
include '../system/koneksi.php';
$sessi = $_SESSION['username'];

$sql = "SELECT * FROM guru WHERE nip = '$sessi'";
$query = mysql_query($sql);
$data_admin = mysql_fetch_array($query);
$nm_admin = $data_admin['nm_guru'];
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <title>Man 19 - Admin</title>
        <style>


            #noti_Container {
                position:relative;
            }

            #noti_Counter {
                display:block;
                position:absolute;
                background:#E1141E;
                color:#FFF;
                font-size:12px;
                font-weight:normal;
                padding:1px 3px;
                margin: 12px 0px 0 24px;
                border-radius:2px;
                -moz-border-radius:2px; 
                -webkit-border-radius:2px;
                z-index:1;
            }

            /* THE NOTIFICAIONS WINDOW. THIS REMAINS HIDDEN WHEN THE PAGE LOADS. */
            #notifications {
                display:none;
                width:430px;
                position:absolute;
                top:30px;
                left:0;
                background:#FFF;
                border:solid 1px rgba(100, 100, 100, .20);
                -webkit-box-shadow:0 3px 8px rgba(0, 0, 0, .20);
                z-index: 0;
            }
            /* AN ARROW LIKE STRUCTURE JUST OVER THE NOTIFICATIONS WINDOW */
            #notifications:before {         
                content: '';
                display:block;
                width:0;
                height:0;
                color:transparent;
                border:10px solid #CCC;
                border-color:transparent transparent #FFF;
                margin-top:-20px;
                margin-left:10px;
            }

            h3 {
                display:block;
                color:#333; 
                background:#FFF;
                font-weight:bold;
                font-size:13px;    
                padding:8px;
                margin:0;
                border-bottom:solid 1px rgba(100, 100, 100, .30);
            }

            
        </style>


        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="admin_home.php">Admin</a>
                </div>
                <!-- Top Menu Items -->
                <?php
                    $q = "SELECT COUNT(id_soal) AS notif FROM soal WHERE date(tgl_upload) = current_date";
                    $rest = mysql_query($q);
                    $data_notif = mysql_fetch_array($rest);
                    $notif = $data_notif['notif'];
                ?>
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <div id="noti_Button"></div>
                        <div id="noti_Counter"></div> 
                        <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i><b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                              
                                <?php
                                $query = "SELECT soal.id_soal, soal.id_mp, soal.tgl_upload, (SELECT mp.nm_mp FROM mp WHERE mp.id_mp=soal.id_mp) as mapel, soal.id_mp, (SELECT guru.nm_guru FROM guru WHERE guru.nip=soal.nip) as nm_guru, (SELECT guru.nm_guru FROM guru WHERE guru.nip=soal.nip_pan) as nm_pengawas, soal.tgl_ujian, soal.thn_ajar, date(tgl_upload) as tgl_enkrip, soal.status FROM soal, guru WHERE soal.nip = guru.nip AND date(soal.tgl_upload) = current_date ORDER BY soal.id_soal DESC";
                                $result = mysql_query($query);
                                $i = 0;
                                while ($data = mysql_fetch_array($result)) {
                                    if($notif != 0){
                                        if ($i % 2 == 0)
                                            $bg = "bg-info";
                                        else
                                            $bg = "bg-success";
                                    ?>
                                        <a href="status_soal.php?id_soal=<?php echo $data['id_soal']; ?>&id_mp=<?php echo $data['id_mp']; ?>&guru=<?php echo $data['nm_guru']; ?>&pengawas=<?php echo $data['nm_pengawas']; ?>&status=<?php echo $data['status']; ?>" class="<?php echo $bg; ?>">
                                            <div class="media">
                                                <span class="pull-left">
                                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                                </span>
                                                <div class="media-body">
                                                    <h5 class="media-heading"><strong>Soal dengan kode Mata Pelajaran: <?php echo $data['id_mp']; ?> Telah dienkrip.</strong>
                                                    </h5>
                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> <?php echo $data['tgl_upload']; ?></p>
                                                    <p>Guru <b><?php echo $data['nm_guru']; ?></b> telah meng-enkrip soal dengan kode mata pelajaran "<b><?php echo $data['id_mp']; ?></b>"</p>
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>
                            </li>
                            <li class="message-footer">
                                <?php
                                    if($notif == 0){
                                        $txt = "Belum ada soal yang dienkrip hari ini.";
                                    }else{
                                        $txt = "Lihat semua pemberitahuan";
                                    }
                                ?>
                                <a href="#"><?php echo $txt;?></a>
                            </li>
                        </ul>

                    </li>
                    
                    <script>
                        $(document).ready(function () {

                            // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER.
                            $('#noti_Counter')
                                    .css({opacity: 0})
                                    .text('<?php echo $notif;?>')              // ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
                                    .css({top: '-10px'})
                                    .animate({top: '-2px', opacity: 1}, 500);

                            $('#noti_Button').click(function () {

                                $('#noti_Counter').fadeOut('slow');                 // HIDE THE COUNTER.

                                return false;
                            });
                        });
                    </script>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $nm_admin ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li>
                                <a href="system/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="admin_home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="data_guru.php"><i class="fa fa-fw fa-bar-chart-o"></i> Data Guru</a>
                        </li>
                        <li>
                            <a href="data_mapel.php"><i class="fa fa-fw fa-table"></i>Data Mata Pelajaran</a>
                        </li>
                        <li>
                            <a href="data_enkrip_dekrip.php"><i class="fa fa-fw fa-edit"></i> Data Enkripsi & Dekripsi</a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>