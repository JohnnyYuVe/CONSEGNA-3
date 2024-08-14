<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require("Connect_to_Server.php");
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>	
		<title>Login</title>
		
		<link rel="stylesheet" href="StileSito.css">
		
</head>	




<body>	

<h2 style="text-align: center; font-size: 40px;"> Login Form</h2>	
		


<form action="<?php $_SERVER['PHP_SELF'] ?>" class="Box_Container_Input" method="post">

		   

		<div >
		    <label for="Username"><b>Username</b></br></label>
		      		<input type="text" class="BOX_INPUT" placeholder="Enter Username" name="Username" required>
		</div> 

		<div >      
		    <label for="Password"><b>Password</b></br></label>
		      		<input type="password" class="BOX_INPUT" placeholder="Enter Password" name="Password" required>
		</div> 

		
		      	<div >	
		      		<button type="submit" class="BOX_BOTTONE" name="invio">Login</button>		      
		      		<button type="submit" class="BOX_BOTTONE" name="reset">Reset</button>
	    		</div> 

<label><input type="checkbox" checked="checked" name="remember"> Remember me</label>

	    </form> 
	


</body>

</html>



<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);



//controllo dei dati proveniente dalla form LOGIN
if( isset($_POST['invio']) ){				
		if(empty($_POST['Username']) || empty($_POST['Password']) ){
							echo "<p>dati mancanti!!!</p>";	
		}else{
					
			$User_table = "utente_tab";

			//querry utilizzato per il login
			$Query1="SELECT *
				     FROM $User_table
				 	 WHERE USERNAME = \"{$_POST['Username']}\" AND PASSWORD =\"{$_POST['Password']}\"
					";

				if (!$Risultato_query = mysqli_query($mysqliConnection, $Query1)){
					printf("Nessun risutato\n");
					 exit();
					 
				}
				$Riga = mysqli_fetch_array($Risultato_query);

				// carico le infromazioni dell'utente dentro la sessione;
				if($Riga){			
							echo"Inserimento dati nella sessione";
							session_start();
							$_SESSION['cliente_id']=$Riga['ID_CLIENTE'];
							$_SESSION['Nome']=$Riga['NOME'];
							$_SESSION['Cognome']=$Riga['COGNOME'];
							$_SESSION['Username']=$Riga['USERNAME'];
							$_SESSION['Password']=$Riga['PASSWORD'];
							header('Location: http://localhost/php_program/cons3/MAIN.php');		
				}else{
					echo"Accesso negato";
				}

		}
}

?>

