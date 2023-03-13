<?php
if(isset($_POST["id_xrhsth"]) && !empty($_POST["id_xrhsth"])){
    
    require_once "syndesh.php";
    
 
    $sql = "DELETE FROM xrhsths WHERE id_xrhsth = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        
        $param_id = trim($_POST["id_xrhsth"]);
        
      
        if(mysqli_stmt_execute($stmt)){
           
            header("location: admin_xrhstes_oloi.php");
            exit();
        } else{
            echo "Κάτι πήγε λάθος. Προσπαθήστε ξανα αργότερα";
        }
    }
     
    
    mysqli_stmt_close($stmt);
  
    mysqli_close($link);
} else{
  
    if(empty(trim($_GET["id_xrhsth"]))){
       
        header("location: error.php");
        exit();
    }
}
?>

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
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Διαγραφή Χρήστη</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id_xrhsth" value="<?php echo trim($_GET["id_xrhsth"]); ?>"/>
                            <p>Θέλετε να διαγράψετε αυτόν τον χρήστη; Η ενέργεια είναι μη αναστρέψιμη.</p>
                            <p>
                                <input type="submit" value="Ναι" class="btn btn-danger" >
                                <a href="admin_ekkremeisxrhstes.php" class="btn btn-secondary">Όχι</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>