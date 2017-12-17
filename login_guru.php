
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Man 19 - Guru</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="login-container">
                <div id="output"></div>
                <div class="avatar"></div>
                <div class="form-box">
                    <?php
                    $txt = "Jika password belum diubah gunakan NIP guru untuk password.";
                    $cls = "alert-warning";
                    if(isset($_GET['error'])) {
                        if($_GET['error'] == '0'){
                            $txt = "Username atau password tidak boleh kosong";
                            $cls = "alert-info";
                        }else if($_GET['error'] == '1'){
                            $txt = "Username atau password salah!";
                            $cls = "alert-danger";
                        }
                    }
                    ?>
                    <form action="system/login_guru_proses.php" method="post">
                        <p class="<?php echo $cls;?>"><?php echo $txt;?></p>
                        <input name="username" type="text" placeholder="username">
                        <input name="password" type="password" placeholder="password">
                        <button class="btn btn-info btn-block login" type="submit" name="login">Login</button>
                        <a href="admin/login_admin.php">Login sebagai admin</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
