<!DOCTYPE html>
<?php
session_start();
include("leitourgies.php");
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Σύστημα Προβολής Δικαιωμάτων | Σύνδεση</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<body>
<?php
        print_message();
        echo "<br>";
?>
<div class="login-form">
    <form name="login" action="login.php" method="post">
        <h2 class="text-center">Σύνδεση Χρήστη</h2>       
        <div class="form-group">
            <input type="text" name="email_xrhsth" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="kodikos_xrhsth" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Σύνδεση</button>
        </div>
               
    </form>
    <p class="text-center"><a href="dimiourgia_logariasmou.php">Δημιουργία Λογαριασμού</a></p>
</div>
</body>
</html>