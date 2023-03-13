<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
    <?php
		session_start();
		include "syndesh.php";
		include "leitourgies.php";
		$_SESSION['rolos'] = 0;
		$email_xrhsth = mysqli_real_escape_string($link, $_POST['email_xrhsth']);
		$kodikos_xrhsth = mysqli_real_escape_string($link, $_POST['kodikos_xrhsth']);
		
		if (empty($email_xrhsth) || empty($kodikos_xrhsth)) {
			send_message('Πρέπει να συμπληρώσετε και τα 2 πεδία (email και κωδικό χρήστη)', 'error');
			header("Location: index.php");
			exit();
		}
		
		$sql = "SELECT xrhsths_me_rolo.id_xrhsth, xrhsths_me_rolo.id_rolou, email_xrhsth, kodikos_xrhsth FROM xrhsths, rolos, xrhsths_me_rolo WHERE email_xrhsth='$email_xrhsth' and kodikos_xrhsth='$kodikos_xrhsth' and (xrhsths.id_xrhsth=xrhsths_me_rolo.id_xrhsth and rolos.id_rolou=xrhsths_me_rolo.id_rolou)";
		$result = mysqli_query($link, $sql) or die(mysqli_error($link));
		$count = mysqli_num_rows($result);
		
		if ($count == 1) {
			$row = mysqli_fetch_assoc($result);
			$rolos = $row['id_rolou'];
			
			$_SESSION['email_xrhsth'] = $email_xrhsth;
			$_SESSION['kodikos_xrhsth'] = $kodikos_xrhsth;
			$_SESSION['id_rolou'] = $rolos;
			} else {
			send_message('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ΠΡΟΣΟΧΗ!</strong> Τα στοιχεία που δώσατε είναι λάθος. Προσπαθήστε ξανά.</div>', 'error');
			header("Location: index.php");
			exit();
		}
		
		switch ($_SESSION['id_rolou']) {
		case 1: //admin
			if(!isset($_SESSION["email_xrhsth"])){
				header("Location: login.php");
				exit(); 
				}
            header("Location: admin.php");
            exit();
            break;
		case 2: //teacher
            if(!isset($_SESSION["email_xrhsth"])){
				header("Location: login.php");
				exit(); 
				}
            header("Location: teacher.php");
            exit();
            break;
		case 3: //student
            if(!isset($_SESSION["email_xrhsth"])){
				header("Location: login.php");
				exit(); 
				}
            header("Location: student.php");
            exit();
            break;
		default: //aplosxrhsths
			if(!isset($_SESSION["email_xrhsth"])){
				header("Location: login.php");
				exit(); 
				}
            header("Location: aplosxrhsths.php");
            exit();
            break;
		}
	?>
</html>