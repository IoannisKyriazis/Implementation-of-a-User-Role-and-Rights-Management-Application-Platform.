<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Σύστημα Προβολής Δικαιωμάτων | Δημιουργία Λογαριασμού</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<?php
include "syndesh.php";
include "leitourgies.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit'])) && ($_POST['submit'] == 'Submit')) {

    $onoma_ekkremous = mysqli_real_escape_string($link, $_POST['onoma_ekkremous']);
    $eponimo_ekkremous = mysqli_real_escape_string($link, $_POST['eponimo_ekkremous']);
    $email_ekkremous = mysqli_real_escape_string($link, $_POST['email_ekkremous']);
    $tilefono_ekkremous = mysqli_real_escape_string($link, $_POST['tilefono_ekkremous']);
    $kodikos_ekkremous = mysqli_real_escape_string($link, $_POST['kodikos_ekkremous']);

    if (empty($onoma_ekkremous) || empty($eponimo_ekkremous) || (empty($email_ekkremous)) || empty($tilefono_ekkremous) || empty($kodikos_ekkremous)) {
        send_message('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ΠΡΟΣΟΧΗ!</strong> Συμπληρώστε όλα τα απαραίτητα στοιχεία.</div>', 'error');
        header("Location: dimiourgia_logariasmou.php");
        exit();
    }

    mysqli_autocommit($link, false);

    $query = "insert into ekkremhs 
                            (
                                onoma_ekkremous,
                                eponimo_ekkremous,
                                email_ekkremous,
								tilefono_ekkremous,
                                kodikos_ekkremous
                            ) 
                            Values
                            (
                                '$onoma_ekkremous',
                                '$eponimo_ekkremous',
                                '$email_ekkremous',
								'$tilefono_ekkremous',
                                '$kodikos_ekkremous'
                            )";
//echo $query;
//die;
    $result = mysqli_query($link, $query);

    if ($result) {
        mysqli_commit($link);
        send_message('<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ΕΠΙΤΥΧΙΑ ΔΗΜΙΟΥΡΓΙΑΣ ΛΟΓΑΡΙΑΣΜΟΥ!</strong> Ο λογαριασμός σας δημιουργήθηκε με επιτυχία! Περιμένετε μέχρι να εγκριθείτε από τους διαχειριστές.</div>', 'success');
        header("Location: index.php");
        exit();
    } else {
        mysqli_rollback($link);
        send_message('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ΑΠΟΤΥΧΙΑ!</strong> Τα στοιχεία δεν καταχωρήθηκαν λόγω προβλήματος της βάσης δεδομένων.</div>', 'error');
    }
}
?>
<body>
<?php
    print_message();
    echo "<br>";
    ?>
<div class="login-form">
    <form action="dimiourgia_logariasmou.php" method="post">
        <h2 class="text-center">Δημιουργία Λογαριασμού</h2>
		
        <div class="form-group">
            <input type="text" name="onoma_ekkremous" class="form-control" placeholder="Όνομα" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="eponimo_ekkremous" class="form-control" placeholder="Επώνυμο" required="required">
        </div>
<div class="form-group">
            <input type="text" name="email_ekkremous" class="form-control" placeholder="Email" required="required">
        </div>
<div class="form-group">
            <input type="text" name="tilefono_ekkremous" class="form-control" placeholder="Τηλέφωνο" required="required">
        </div>
<div class="form-group">
            <input type="password" name="kodikos_ekkremous" class="form-control" placeholder="Κωδικός Πρόσβασης (password)" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Αίτηση για Δημιουργία Λογαριασμού</button>
        </div>
               
    </form>
    <p class="text-center"><a href="index.php">Έχετε λογαριασμό; Κάντε σύνδεση τώρα!</a></p>
</div>
</body>
</html>