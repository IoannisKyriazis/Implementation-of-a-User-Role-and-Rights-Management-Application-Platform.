<!DOCTYPE HTML>
<html>
<head>
        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Σύστημα Προβολής Δικαιωμάτων | Περιβάλλον Χρήστη</title>
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
session_start();
 include_once"syndesh.php";
	
	
    $select= "select * from xrhsths where email_xrhsth = '".$_SESSION['email_xrhsth']."'";
    $sql = mysqli_query($link,$select);
    $row = mysqli_fetch_assoc($sql);
    
?>

<body>
<header>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- logotypo -->
  <ul class="nav navbar-nav navbar-collapse collapse justify-content-center">
  <a class="navbar-brand"  href="teacher.php">Περιβάλλον Χρήστη | Αρχική</a>
</ul>
</nav>

<nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
  <!-- menu -->
  <ul class="nav navbar-nav navbar-collapse collapse justify-content-center">
    <li class="nav-item active">
      <a class="nav-link" href="teacher.php">Αρχική</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="teacher_error.php">Αιτήματα</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="teacher_error.php">Χρήστες</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="teacher_error.php">Ρόλοι</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="teacher_prof.php">Προφίλ</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="teacher_photo.php">Φωτογραφία</a>
    </li>
  </ul>
</nav>
</header>

<main role="main" class="container">
<div class="container bg-light">
    <div class="row card bg-light text-black align-items-center">
		<div class="card-body bg-success">Εισέλθατε επιτυχώς στο σύστημα ως καθηγητής!</div>  
        <div class="card-body"><br><br><br><br><br><br><br><br><br><br><br><br><br>Καλώς ήλθατε <?php echo $row['onoma_xrhsth']?>! Περιηγηθείτε στο μενού.</div>
        <a href="logout.php" class="btn btn-danger btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Αποσύνδεση
        </a>
      </p>
<br><br><br><br><br><br><br><br><br><br>
	</div>
	
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