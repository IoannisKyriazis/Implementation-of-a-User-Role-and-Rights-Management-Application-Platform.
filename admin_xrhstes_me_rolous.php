<!DOCTYPE HTML>
<html>
<head>
        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Σύστημα Προβολής Δικαιωμάτων | Περιβάλλον Διαχειριστή</title>
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
include "syndesh.php";
include "leitourgies.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit'])) && ($_POST['submit'] == 'Submit')) {

    $id_xrhsth = mysqli_real_escape_string($link, $_POST['id_xrhsth']);
	$id_rolou = mysqli_real_escape_string($link, $_POST['id_rolou']);

    if (empty($id_xrhsth) || empty($id_rolou)) {
        send_message('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ΠΡΟΣΟΧΗ!</strong> Συμπληρώστε όλα τα απαραίτητα στοιχεία.</div>', 'error');
        header("Location: admin_xrhstes_me_rolous.php");
        exit();
    }

    mysqli_autocommit($link, false);

    $query = "INSERT INTO xrhsths_me_rolo(id_xrhsth, id_rolou) VALUES('$id_xrhsth', '$id_rolou')";
	
//echo $query;
//die;
    $result = mysqli_query($link, $query);
	
	

    if ($result) {
        mysqli_commit($link);
        send_message('<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ΕΠΙΤΥΧΙΑ ΔΗΜΙΟΥΡΓΙΑΣ ΡΟΛΟΥ!</strong> Ο ρόλος δημιουργήθηκε με επιτυχία!</div>', 'success');
        header("Location: admin_xrhstes_me_rolous.php");
        exit();
    } else {
        mysqli_rollback($link);
        send_message('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ΑΠΟΤΥΧΙΑ!</strong> Τα στοιχεία δεν καταχωρήθηκαν λόγω προβλήματος της βάσης δεδομένων.</div>', 'error');
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit1'])) && ($_POST['submit1'] == 'Submit1')) {

    $id_xrhsth_e = mysqli_real_escape_string($link, $_POST['id_xrhsth']);
	$id_rolou_e = mysqli_real_escape_string($link, $_POST['id_rolou']);

    if (empty($id_xrhsth_e) || empty($id_rolou_e)) {
        send_message('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ΠΡΟΣΟΧΗ!</strong> Συμπληρώστε όλα τα απαραίτητα στοιχεία.</div>', 'error');
        header("Location: admin_xrhstes_me_rolous.php");
        exit();
    }

    mysqli_autocommit($link, false);

    $query = "DELETE FROM xrhsths_me_rolo WHERE id_xrhsth='$id_xrhsth_e' or id_rolou='$id_rolou_e'"; //ΔΕΝ ΠΑΙΖΕΙ ΚΑΙ ΔΕΝ ΞΕΡΟΥΜΕ ΤΟ ΓΙΑΤΙ. ΣΠΑΤΑΛΗΣΑΜΕ 2 ΗΜΕΡΕΣ ΓΙΑ ΑΥΤΟ ΤΟ ΠΡΑΓΜΑ.
	
//echo $query;
//die;
    $result = mysqli_query($link, $query);
	
	

    if ($result) {
        mysqli_commit($link);
        send_message('<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ΕΠΙΤΥΧΙΑ ΔΗΜΙΟΥΡΓΙΑΣ ΡΟΛΟΥ!</strong> Ο ρόλος δημιουργήθηκε με επιτυχία!</div>', 'success');
        header("Location: admin_xrhstes_me_rolous.php");
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
<header>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- logotypo -->
  <ul class="nav navbar-nav navbar-collapse collapse justify-content-center">
  <a class="navbar-brand"  href="admin.php">Περιβάλλον Διαχειριστή | Ρόλοι</a>
</ul>
</nav>

<nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
  <!-- menu -->
  <ul class="nav navbar-nav navbar-collapse collapse justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="admin.php">Αρχική</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="admin_ekkremeisxrhstes.php">Αιτήματα</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="admin_xrhstes.php">Χρήστες</a>
    </li>
	<li class="nav-item active">
      <a class="nav-link" href="admin_roloi.php">Ρόλοι</a>
    </li>
  </ul>
</nav>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <!-- menu -->
  <ul class="nav navbar-nav navbar-collapse collapse justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="admin_oloi_roloi.php">Όλοι οι ρόλοι</a>
    </li>
	<li class="nav-item active">
      <a class="nav-link" href="admin_xrhstes_me_rolous.php">Χρήστες με ρόλους</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="admin_xrhstes_pou_den_exoun_rolo.php">Χρήστες χωρίς ρόλους</a>
    </li>
  </ul>
</nav>
</header>

<main role="main" class="container">
<div class="wrapper">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Χρήστες με Ρόλους&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
                    </div>
                    <?php
                    require_once "syndesh.php";
                    
                    $sql = "SELECT * FROM xrhsths, rolos, xrhsths_me_rolo WHERE xrhsths_me_rolo.id_rolou=rolos.id_rolou AND xrhsths_me_rolo.id_xrhsth=xrhsths.id_xrhsth";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
										echo "<th>ID Χρήστη</th>";
										echo "<th>ID Ρόλου</th>";
                                        echo "<th>Όνομα Ρόλου</th>";
										echo "<th>Όνομα Χρήστη</th>";
										echo "<th>Επώνυμο Χρήστη</th>";
										echo "<th>Email Χρήστη</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
										echo "<td>" . $row['id_xrhsth'] . "</td>";
										echo "<td>" . $row['id_rolou'] . "</td>";
                                        echo "<td>" . $row['onoma_rolou'] . "</td>";
										echo "<td>" . $row['onoma_xrhsth'] . "</td>";
										echo "<td>" . $row['eponimo_xrhsth'] . "</td>";
										echo "<td>" . $row['email_xrhsth'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Δεν βρέθηκαν ρόλοι!</em></div>';
                        }
                    } else{
                        echo "Κάτι πήγε λάθος. Προσπαθήστε ξανα αργότερα";
                    }
 
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
	
	
	<div class ="container-fluid">
  <div class ="row">
    <div class ="col-md-6 col-sm-6">
	<div class="login-form">
    <form action="admin_xrhstes_me_rolous.php" method="post">
        <h2 class="text-center">Ανάθεση Ρόλου</h2>
		
<div class="form-group">
            <input type="text" name="id_xrhsth" class="form-control" placeholder="ID Χρήστη" required="required">	
        </div>
		<div class="form-group">
            <input type="text" name="id_rolou" class="form-control" placeholder="ID Ρόλου" required="required">	
        </div>
		
        <div class="form-group mt-5">
            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Ανάθεση Ρόλου</button>
			<a href="admin_xrhstes_me_rolous.php" class="btn btn-secondary active" role="button" aria-pressed="true">Ακύρωση / ΠΙΣΩ</a>
        </div>
               
    </form>
</div>
</div>
<div class ="col-md-6 col-sm-6">
	<div class="login-form">
    <form action="admin_xrhstes_me_rolous.php" method="post">
        <h2 class="text-center">Διαγραφή Ρόλου από χρήστη</h2>
		
<div class="form-group">
            <input type="text" name="id_xrhsth_e" class="form-control" placeholder="ID Χρήστη" required="required">	
        </div>
		<div class="form-group">
            <input type="text" name="id_rolou_e" class="form-control" placeholder="ID Ρόλου" required="required">	
        </div>
		
        <div class="form-group mt-5">
            <button type="submit" name="submit1" value="Submit1" class="btn btn-primary">Διαγραφή Ρόλου</button>
			<a href="admin_xrhstes_me_rolous.php" class="btn btn-secondary active" role="button" aria-pressed="true">Ακύρωση / ΠΙΣΩ</a>
        </div>
               
    </form>
</div>
</div>
  </div>
</div>




	</main>




</body>

</html>