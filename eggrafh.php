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
session_start();
include "syndesh.php";
include "leitourgies.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit'])) && ($_POST['submit'] == 'Submit')) {

    $onoma_ekkremous = mysqli_real_escape_string($link, $_POST['onoma_ekkremous']);
    $eponimo_ekkremous = mysqli_real_escape_string($link, $_POST['eponimo_ekkremous']);
    $email_ekkremous = mysqli_real_escape_string($link, $_POST['email_ekkremous']);
    $tilefono_ekkremous = mysqli_real_escape_string($link, $_POST['tilefono_ekkremous']);
    $kodikos_ekkremous = mysqli_real_escape_string($link, $_POST['kodikos_ekkremous']);

    if (empty($onoma_ekkremous) || empty($eponimo_ekkremous) || (empty($email_ekkremous)) || empty($tilefono_ekkremous) || empty($kodikos_ekkremous)) {
        send_message('Πρέπει να συμπληρώσετε τα υποχρεωτικά πεδία (με τον αστερίσκο *)', 'error');
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
        send_message('Τα στοιχεία σας καταχωρήθηκαν με επιτυχία.', 'success');
        header("Location: index.php");
        exit();
    } else {
        mysqli_rollback($link);
        send_message('Τα στοιχεία δεν καταχωρήθηκαν λόγω προβλήματος στην βάση του συστήματος.', 'error');
    }
}
?>

</html>