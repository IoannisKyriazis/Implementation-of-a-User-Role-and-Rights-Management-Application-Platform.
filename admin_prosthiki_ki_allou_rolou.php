<!DOCTYPE html>
<html lang="en">

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
include_once 'syndesh.php';
if(count($_POST)>0) {
mysqli_query($link,"insert into xrhsths_me_rolo values(id_xrhsth='" . $_POST['id_xrhsth'] . "',id_rolou'" . $_POST['id_rolou'] . "')");
$message = '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ΕΠΙΤΥΧΙΑ ΕΠΕΞΕΡΓΑΣΙΑΣ ΛΟΓΑΡΙΑΣΜΟΥ!</strong> Τα στοιχεία του χρήστη ενημερώθηκαν επιτυχώς!.</div>';
}
$result = mysqli_query($link,"SELECT * FROM xrhsths WHERE id_xrhsth='" . $_GET['id_xrhsth'] . "'");
$row= mysqli_fetch_array($result);
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
	<main>
<div class="login-form">
    <form action="admin_prosthiki_ki_allou_rolou.php" method="post">
        <h2 class="text-center">Προσθήκη Ρόλου</h2>
		
<div class="form-group">
            <input type="text" name="id_rolou" class="form-control" placeholder="ID Ρόλου" required="required">	
        </div>
		
		<div class="form-group">
            <input type="text" name="id_xrhsth" class="form-control" placeholder="<?php echo $row['id_xrhsth']; ?>" required="required" disabled>	
        </div>
        <div class="form-group mt-5">
            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Αποθήκευση Ρόλου</button>
			<a href="admin_xrhstes_me_rolous.php" class="btn btn-secondary active" role="button" aria-pressed="true">Ακύρωση / ΠΙΣΩ</a>
        </div>
               
    </form>
</div>

</main>
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