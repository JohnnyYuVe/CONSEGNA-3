<?php 
//connessione al server per simulare il login.
ini_set('display_errors', 1);

error_reporting(E_ALL);
require_once("Connect_to_Server.php");

							session_start();
							echo"</br>qui trovi un piccolo feedback su quello che sta accadendo";
							echo "</br></br></br>";
							echo "Codice ID: "		. $_SESSION['cliente_id']."</br>";
							echo "Nome cliente: "	. $_SESSION['Nome']."</br>";
							echo "Cognome cliente: "	. $_SESSION['Cognome']."</br>";
							echo "Username: "		. $_SESSION['Username']."</br>";
							echo "Password: "		. $_SESSION['Password']."</br>";
							echo "Email: "			. $_SESSION['Email']."</br>";
							echo "COD_FIS: "		. $_SESSION['COD_FIS']."</br>";
							echo "Percorso assoluto del file:". __FILE__;
?>

<?php
   
// blocco di codice in attesa che venga aggiunto un articolo nel carrello.
if( isset($_POST['add_to_cart'])  ){

if(empty($_POST['Nome_art'] ) || empty($_POST['Prezzo'])|| empty($_POST['id_art']) || empty($_POST['Quantita'])| empty($_POST['id_client']) ){
		echo "\ERRORE NELLA RICEZIONE DELL'ARTICOLO";
	}else{echo "good delle informazioni";

	echo"</br></br>".$_POST["id_client"]."</br>";
	echo	$_POST["id_art"]."</br>";
	echo	$_POST["Nome_art"]."</br>";
	echo	$_POST["Prezzo"]."</br>";
	echo	$_POST["Quantita"]."</br>";

	$carrello_tabLe = "carrello_tab";

	$Querry4="INSERT INTO $carrello_tabLe(ID_CLIENTE,ID_ARTICOLO,NOME_ARTICOLO,PREZZO_UNITARIO,QUANTITA)
		  VALUES
		  		('".$_POST["id_client"]."','".$_POST["id_art"]."','".$_POST["Nome_art"]."','".$_POST["Prezzo"]."','" .$_POST["Quantita"]."'" .")";

	if (!$Risultato_query = mysqli_query($mysqliConnection, $Querry4)){
												  echo"Inserimento articolo nel carrello fallita";
												  printf("Nessun risutato\n");
											      
 	}else{  
 	echo"aggiunto avvenuta con successo";    
	}
	}
	
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>	
		<title>pagina principale z</title>
		
		<link rel="stylesheet" href="StileSito.css">	
		
</head>	

<body>
<!--Piccolo menu a barra sulla parte alta della pagina -->
<div class="Box_Container_Nav">
									<div class="Box_Button_Nav">	<a href="RegistrazioneForm.php">Register</a> </div>  
									<div class="Box_Button_Nav">	<a href="LOGIN.php">LOG-IN</a>	</div>
									
																														
									<div class="Box_Button_Nav">	<a href="carrello.php">Carrello</a> </div>
									<div class="Box_Button_Nav">	<a href=""></a> </div>
									<div class="Box_Button_Nav">	<a href="LOGOUT.php">LOG-OUT</a> </div>	


</div>	

	
<div class="Box_Container_Art">

<?php
	$t2=microtime();

// IL NUMERO DI ELEMENTI DA STAMPARE DENTRO IN UNA PAGINA 	
	$pageLength = 24;
// costruisco una stringa avente il contenuto del file PRODOTO_DATA.xml, rimuovendo charatteri aggiuntivi come spazi tra gli elementi, rendendolo più "leggibile".
	
	$xmlString = "";
		foreach ( file("PRODOTTO_DATA.XML") as $node ) {
											$xmlString .= trim($node);
		}
		
//creo un documento da usare e carico il contenuto della stringa dentro il documento
	$doc = new DOMDocument();	
	$doc->loadXML($xmlString);

//Validazione xml se è conforme con il suo schema
	if ($doc->validate()) {
  						echo "<p>This document is valid</p>\n";
	}else{
  		 echo "<p>This document is not valid</p>\n";
	}


// inizializzo un puntatore per scorrere i record contenuti nel file.
	$RecordsHolder=$doc->documentElement->childNodes;


//STAMPA PARZIALE DEGLI ELEMENTI CONTENUTI DENTRO IL FILE XML
	if ( isset($_GET['next']) ) {
							$FirstRecordToVisit = $_GET['next'];
	} else {
		$FirstRecordToVisit = 0;
	}

	if ( $RecordsHolder->length - $FirstRecordToVisit < $pageLength ) {
										$LastRecordToVisit = $RecordsHolder->length;
	} else {
			$LastRecordToVisit = $FirstRecordToVisit + $pageLength;
	}	

// creo un ciclo, nella quale visito tutti i record presenti nel file e ne visualizzo il contenuto.


for( $i = $FirstRecordToVisit; $i<$LastRecordToVisit; $i++ ){
										//mi posiziono su i-esimo Record e ne visualizzo il contenuto
										
										$Record_Visited=$RecordsHolder->item($i);
										
										$Art= 				$Record_Visited->firstChild;
										$IdArtValue= 		$Art->textContent;
										
										$CodArt= 			$Art->nextSibling;
										$CodArtValue=		$CodArt->textContent;

										$NomeArt=			$CodArt->nextSibling;
										$NomeArtValue=		$NomeArt->textContent;

										$NameBrand=			$NomeArt->nextSibling;
										$NameBrandValue=	$NameBrand->textContent;
							
										$MadeIn=			$NameBrand->nextSibling;
										$MadeInValue= 		$MadeIn->textContent;

										$Composizione=		$MadeIn->nextSibling;
										$ComposizioneValue=	$Composizione->textContent;

										$Taglia=			$Composizione->nextSibling;
										$TagliaValue= 		$Taglia->textContent;
								
										$PrezzoUni=			$Record_Visited->lastChild;
										$PrezzoUniValue=	$PrezzoUni->textContent;
/*
 //Informazioni contenuti nei record che possono essere visualizzati(mostro solo alcuni dei dati al fine di creare un'anagrafica del prodotto)
		echo "<p>";
		echo $IdArtValue."<br>";
		echo $NomeArtValue."<br>";
		echo $CodArtValue."<br>";
		echo $NameBrandValue."<br>";
		echo $MadeInValue."<br>";
		echo $ComposizioneValue."<br>";
		echo $TagliaValue."<br>";
		echo $PrezzoUniValue."<br>";
		echo "<br>";
*/	

echo "<div class=\"Box_Articolo\">

			  <img src=\"box.jpg\" alt=\"immagine box\" style=\"width:100px\">
			 ";
	echo  "</p class=\"text_art \">". $NomeArtValue  ."</p>";
	echo "</p class=\"text_art \">".  $PrezzoUniValue."euro</p>";		 
	
	echo"<form action=\"MAIN.php?id=".$CodArtValue ."\" method=\"post\">";

		echo"<input type=\"hidden\" name=\"Nome_art\"    			value=\"" . $NomeArtValue   			. "\" >";   
		echo"<input type=\"hidden\" name=\"Prezzo\"    			value=\"" . $PrezzoUniValue 			. "\" >";
	     echo"<input type=\"hidden\" name=\"cod_art\"    			value=\"" . $CodArtValue    			. "\" >";
	     echo"<input type=\"hidden\" name=\"id_art\"    			value=\"" . $IdArtValue    			. "\" >";
	     echo"<input type=\"hidden\" name=\"name_brand_art\"    	value=\"" . $NameBrandValue    		. "\" >";
	     echo"<input type=\"hidden\" name=\"made_in_art\"    		value=\"" . $MadeInValue    			. "\" >";
	     echo"<input type=\"hidden\" name=\"comp_art\"    			value=\"" . $ComposizioneValue    		. "\" >"; 
	     echo"<input type=\"hidden\" name=\"taglia_art\"    		value=\"" . $TagliaValue    			. "\" >";  



	     echo"<input type=\"hidden\" name=\"id_client\" 	value=\"" . $_SESSION["cliente_id"]	. "\" >";




		//gli hidden type servono per tenere traccia di quale articolo viene aggiunto al carrello.		
	echo "<div>
		 	<input type=\"number\" name=\"Quantita\" class=\"Box_quantita\" value=1>
		</div>";

	echo "<div>
			<input type=\"submit\" name=\"add_to_cart\" class=\"Box_bottone\" value=\"Aggiungi al carrello\">
		</div>";

	echo"</form>";

echo"</div>;	
		</br>";	

	


}

if ( $LastRecordToVisit < $RecordsHolder->length - 1 ) {
     echo '<p><a href="MAIN.php?next='. $LastRecordToVisit. '">prossimo gruppo di stampe &gt;&gt;&gt;</a></p>';
} else {
	print '<p>** Fin **</p>';
}

?>
</div>	
</body>
</html>	