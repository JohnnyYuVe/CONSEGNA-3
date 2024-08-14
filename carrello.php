<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("Connect_to_Server.php"); 

							session_start();
							echo"</br>qui trovi un piccolo feedback su quello che sta accadendo";
							echo "</br></br></br>". $_SESSION['cliente_id']."</br>";
							echo$_SESSION['Nome']."</br>";
							echo$_SESSION['Cognome']."</br>";
							echo$_SESSION['Username']."</br>";
							echo$_SESSION['Password']."</br>";


if( isset($_POST['remove']) ){				
		if(empty($_POST['remove'])|| empty($_POST["CL_ID_CARRELLO"])|| empty($_POST["ID_CART"]) ){
							echo "<p>ERRORE</p>";	
		}else{

	echo"</br></br>".$_POST["CL_ID_CARRELLO"]."</br>";
	echo	$_POST["ID_CART"]."</br>";
		

	$cart_table="carrello_tab";
	$Query5="DELETE FROM $cart_table

			 WHERE ID_CLIENTE=\"{$_SESSION['cliente_id']}\" AND ID_CARRELLO=\"{$_POST['ID_CART']} \"
			 ";


	if (!$Risultato_query = mysqli_query($mysqliConnection, $Query5)){
					printf("Nessun risutato\n");				
	}else{

		echo "ELIMINAZIONE AVVENUTA CON SUCCESSO</br>";

	}

	
	}     
}

?>

<?xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>	
		<title>pagina principale</title>	
		<link rel="stylesheet" href="StileSito.css">			
</head>	

<body>

	<div class="Box_Container_Nav">
									<div class="Box_Button_Nav">	<a href="RegistrazioneForm.php">Register</a> </div>  
									<div class="Box_Button_Nav">	<a href="LOGIN.php">LOG-IN</a>	</div>
									
																														
									<div class="Box_Button_Nav">	<a href="carrello.php">Carrello</a> </div>
									<div class="Box_Button_Nav">	<a href=""></a> </div>
									<div class="Box_Button_Nav">	<a href="LOGOUT.php">LOG-OUT</a> </div>	
	</div>	

<div class="Box_Container_car">
		
							<?php
								
								$cart_table="carrello_tab";
								$Query5="SELECT * 
										 FROM  $cart_table
										 WHERE ID_CLIENTE=\"{$_SESSION['cliente_id']}\"	
										 ";


								if (!$Risultato_query = mysqli_query($mysqliConnection, $Query5)){
												printf("Nessun risutato\n");				
								}else{


									while ($row = mysqli_fetch_assoc($Risultato_query)) { // Important line, returns assoc array
									
								echo "<div class=\"Box_carrello\">";

										echo "<div class=\"info_art\">";	
										    echo"<p>". $row["ID_CLIENTE"]."<br />";
										    echo $row["ID_ARTICOLO"]."<br />";
										    echo $row["NOME_ARTICOLO"]."<br />";
										    echo $row["PREZZO_UNITARIO"]."<br />";
										    echo $row["QUANTITA"]."<br /></p>";
										echo "</div>"; 

										echo "<div Box_carrello_input>";  
										    echo "<form action=\"carrello.php?id=".$row["ID_CARRELLO"] ."\" method=\"post\">";

										     echo"<input type=\"hidden\" name=\"CL_ID_CARRELLO\"   value=\"".$_SESSION["cliente_id"] ."\" >";
										     echo"<input type=\"hidden\" name=\"ID_CART\"   value=\"".$row["ID_CARRELLO"] ."\" >";

										    echo "<input type=\"submit\" name=\"remove\" class=\"Box_remove\" value=\"rimuovi dal carrello\">";
										   
										    echo "</form>"; 
										echo "</div>";   

								echo "</div>";
									}
									
								}	
							?>
	
</div>			


</body>
</html>	
