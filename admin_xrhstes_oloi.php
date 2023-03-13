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

<body>

<header>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- logotypo -->
  <ul class="nav navbar-nav navbar-collapse collapse justify-content-center">
  <a class="navbar-brand"  href="admin.php">Περιβάλλον Διαχειριστή | Χρήστες</a>
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
	<li class="nav-item active">
      <a class="nav-link" href="admin_xrhstes.php">Χρήστες</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="admin_roloi.php">Ρόλοι</a>
    </li>
  </ul>
</nav>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <!-- menu -->
  <ul class="nav navbar-nav navbar-collapse collapse justify-content-center">
    <li class="nav-item active">
      <a class="nav-link" href="admin_xrhstes_oloi.php">Όλοι οι χρήστες</a>
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
                        <h2 class="pull-left">Εγκεκριμένοι χρήστες</h2>
                    </div>
                    <?php
                   
                    require_once "syndesh.php";
                    
                    
                    $sql = "SELECT * FROM xrhsths";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Όνομα</th>";
                                        echo "<th>Επώνυμο</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Τηλέφωνο</th>";
										echo "<th>Ενέργεια</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_xrhsth'] . "</td>";
                                        echo "<td>" . $row['onoma_xrhsth'] . "</td>";
                                        echo "<td>" . $row['eponimo_xrhsth'] . "</td>";
                                        echo "<td>" . $row['email_xrhsth'] . "</td>";
										echo "<td>" . $row['tilefono_xrhsth'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="epeksergasia.php?id_xrhsth='. $row['id_xrhsth'] .'" class="mr-3" title="Επεξεργασία Χρήστη" data-toggle="tooltip"><span class="fa fa-pen"></span></a>';
                                            echo '<a href="diagrafh_xrhsth.php?id_xrhsth='. $row['id_xrhsth'] .'" title="Διαγραφή Χρήστη" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                         
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Δεν βρέθηκαν εγκεκριμένοι χρήστες!</em></div>';
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