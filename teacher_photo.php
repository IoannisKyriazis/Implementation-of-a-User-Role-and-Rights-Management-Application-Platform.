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

<?php //ΔΕΝ ΔΟΥΛΕΥΕΙ Η ΜΕΤΑΦΟΡΤΩΣΗ ΤΗΣ ΦΩΤΟΓΡΑΦΙΑΣ. ΦΑΓΑΜΕ ΤΟΥΛΑΧΙΣΤΟΝ 4 ΗΜΕΡΕΣ ΓΙΑ ΑΥΤΟ ΤΟ ΘΕΜΑ. Η ΕΜΦΑΝΙΣΗ ΤΗΣ ΦΩΤΟΓΡΑΦΙΑΣ ΔΟΥΛΕΥΕΙ ΚΑΝΟΝΙΚΑ
session_start();
require_once 'syndesh.php'; 
  
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            $insert = $db->query("update xrhsths set image=:'$imgContent' where email_xrhsth = '".$_SESSION['email_xrhsth']."'"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "Η μεταφόρτωση επετεύχθει."; 
            }else{ 
                $statusMsg = "Η μεταφόρτωση απέτυχε. Προσπαθήστε ξανά αργότερα."; 
            }  
        }else{ 
            $statusMsg = 'Το σύστημα δέχεται αρχεία με κατάληξη JPG, JPEG, PNG, & GIF.'; 
        } 
    }else{ 
        $statusMsg = 'Επιλέξτε αρχείο.'; 
    } 
} 
 
echo $statusMsg; 
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
    <li class="nav-item">
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
	<li class="nav-item active">
      <a class="nav-link" href="teacher_photo.php">Φωτογραφία</a>
    </li>
  </ul>
</nav>
</header>

<main role="main" class="container">
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Φωτογραφία</h3></div>
                            <div class="card-body">
					<?php  
require_once 'syndesh.php'; 
  
$result = $link->query("SELECT image FROM xrhsths WHERE email_xrhsth='" . $_SESSION['email_xrhsth'] . "'"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" width="100px" height="100px"/> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Η φωτογραφία δεν βρέθηκε!</p> 
<?php } ?>
	

<div class="form-group mt-5">	
	<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
	<div class="form-group mt-5">
    <button type="submit" name="submit" value="Upload" class="btn btn-primary">Αποθήκευση</button>
			<a href="teacher.php" class="btn btn-secondary active" role="button" aria-pressed="true">Ακύρωση / ΠΙΣΩ</a>
</div>
</form>
	</div>

</div>
            </div>
        </div>
		</div></div>
</div>


</form>
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