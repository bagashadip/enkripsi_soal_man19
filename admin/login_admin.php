<!DOCTYPE html>

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
                <img src="images/admin_login.gif" width="270" height="120" class="logo_admin">
                <br><br>
                <div class="form-box">
                    <form action="system/proses_login.php" method="post">
                        <input name="username" type="text" placeholder="username">
                        <input name="password" type="password" placeholder="password">
                        <button class="btn btn-info btn-block login" type="submit" name="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

