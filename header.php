<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Man 19 - Guru</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="css/plugins/morris.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="Datepicker/base/jquery.ui.all.css" type="text/css">

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

            .a_button{
                
            }
            
        </style>

        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        
        
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
                    <a class="navbar-brand" href="#">Guru MAN 19 Jakarta</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">

                    <li class="dropdown">
                        <div id="noti_Button"></div>
                        <?php
                        $notif = 0;
                            $nip = $_SESSION['nip'];
                            $query_soal = "SELECT COUNT(id_soal) as total, tgl_upload, tgl_ujian, jam FROM soal WHERE nip_pan='$nip' AND status = 0";
                            $rest = mysql_query($query_soal);
                            $data_soal = mysql_fetch_array($rest);
                                if($data_soal['total'] != 0){
                                    $notif = $data_soal['total'];
                                    ?>
                                        <div id="noti_Counter"></div> 
                                    <?php
                                }
                            
                            
                        ?>
                        <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i><b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                            <?php
                            $i = 0;
                            $q = "SELECT tgl_upload, tgl_ujian, jam, deskripsi FROM soal WHERE nip_pan='$nip' AND status = 0 ORDER BY id_soal DESC";
                                $result = mysql_query($q);
                                if($notif != 0){
                                    
                                while($notif_soal = mysql_fetch_array($result)){
                                    if ($i % 2 == 0)
                                        $bg = "bg-info";
                                    else
                                        $bg = "bg-success";
                                        ?>

                                            <a href="data_soal.php" class="<?php echo $bg; ?>">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="media-heading"><strong>Jadwal mengawas: <?php echo $notif_soal['tgl_ujian'];?> Jam: <?php echo $notif_soal['jam'];?></strong>
                                                    </h5>
                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> <?php echo "Tgl ".$notif_soal['tgl_upload'];?></p>
                                                    <p><?php echo $notif_soal['deskripsi'];?></p>
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
                    <?php
                    $query = "SELECT * FROM guru WHERE nip = '$nip'";
                    $result = mysql_query($query);
                    $data = mysql_fetch_array($result);
                    ?>

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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $data['nm_guru']; ?> <b class="caret"></b></a>
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
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                        </li>
                        <li>
                            <a href="enkripsi.php"><i class="fa fa-edit"></i> Enkripsi</a>
                        </li>
                        <li>
                            <a href="ganti_password.php"><i class="fa fa-book"></i> Ganti Password</a>
                        </li>
                        <li>
                            <a href="help.php"><i class="fa fa-fw fa-question-circle"></i> Help</a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>