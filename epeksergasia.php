<html>
<head>
        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Περιβάλλον Διαχειριστή | Επεξεργασία Χρήστη</title>
<link rel="stylesheet" href="style.css">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css'>
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

</head>
<?php
include_once 'syndesh.php';
if(count($_POST)>0) {
mysqli_query($link,"UPDATE xrhsths set id_xrhsth='" . $_POST['id_xrhsth'] . "', onoma_xrhsth='" . $_POST['onoma_xrhsth'] . "', eponimo_xrhsth='" . $_POST['eponimo_xrhsth'] . "', email_xrhsth='" . $_POST['email_xrhsth'] . "' ,tilefono_xrhsth='" . $_POST['tilefono_xrhsth'] . "', kodikos_xrhsth='" . $_POST['kodikos_xrhsth'] . "' WHERE id_xrhsth='" . $_POST['id_xrhsth'] . "'");
$message = '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ΕΠΙΤΥΧΙΑ ΕΠΕΞΕΡΓΑΣΙΑΣ ΛΟΓΑΡΙΑΣΜΟΥ!</strong> Τα στοιχεία του χρήστη ενημερώθηκαν επιτυχώς!.</div>';
}
$result = mysqli_query($link,"SELECT * FROM xrhsths WHERE id_xrhsth='" . $_GET['id_xrhsth'] . "'");
$row= mysqli_fetch_array($result);
?>

<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Επεξεργασία Χρήστη</h3></div>
                            <div class="card-body">
    <div class="input-group-prepend mt-2"><span class="input-group-text">ID Χρήστη</span>
	<input type="hidden" name="id_xrhsth" class="txtField" value="<?php echo $row['id_xrhsth']; ?>">
    <input type="text" name="id_xrhsth"  value="<?php echo $row['id_xrhsth']; ?>"></div>
	
    <div class="input-group-prepend mt-3"><span class="input-group-text">Όνομα Χρήστη</span>
    <input type="text" name="onoma_xrhsth" class="txtField" value="<?php echo $row['onoma_xrhsth']; ?>"></div>
	
	<div class="input-group-prepend mt-3"><span class="input-group-text">Επώνυμο Χρήστη</span>
	<input type="text" name="eponimo_xrhsth" class="txtField" value="<?php echo $row['eponimo_xrhsth']; ?>"></div>
	
	<div class="input-group-prepend mt-3"><span class="input-group-text">Email Χρήστη</span>
	<input type="text" name="email_xrhsth" class="txtField" value="<?php echo $row['email_xrhsth']; ?>"></div>
	
	<div class="input-group-prepend mt-3"><span class="input-group-text">Τηλέφωνο Χρήστη</span>
	<input type="text" name="tilefono_xrhsth" class="txtField" value="<?php echo $row['tilefono_xrhsth']; ?>"></div>
	
	<div class="input-group-prepend mt-3"><span class="input-group-text">Συνθηματικό Χρήστη</span>
	<input type="text" name="kodikos_xrhsth" class="txtField" value="<?php echo $row['kodikos_xrhsth']; ?>"></div>
									
    <div class="form-group mt-5">
            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Αποθήκευση</button>
			<a href="admin_xrhstes_oloi.php" class="btn btn-secondary active" role="button" aria-pressed="true">Ακύρωση / ΠΙΣΩ</a>
        </div>

</div>
            </div>
        </div>
		</div></div>
</div>


</form>
<footer class="bg-dark mt-auto footer">
    <div class="container-fluid">
        <div class="d-flex small">
            <div class="text-muted">Copyright © 2021 Kyriazis Ioannis | Papadopoulos Panagiotis - All Rights Reserved.</div>
            <div class="text-muted ml-auto">GR</div>
            <div>
        </div>
    </div>
</footer>
</body>
</html>