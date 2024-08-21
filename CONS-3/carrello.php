<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("Connect_to_Server.php"); 

							session_start();
							


if( isset($_POST['remove']) ){				
		if(empty($_POST['remove']) ){
							echo "<p>ERRORE</p>";	
		}else{

	echo"</br></br>";

	echo"</br>qui trovi un piccolo feedback su quello che sta accadendo";

							echo "</br></br>"; 
							echo "Cliente id :"			. $_SESSION['cliente_id']	. "</br>";
							echo "Cliente nome :"		. $_SESSION['Nome']		 	. "</br>";
							echo "Cliente cognome :"	. $_SESSION['Cognome']		. "</br>";
							echo "Cliente Username :"	. $_SESSION['Username']		. "</br>";
							echo "Cliente Password :"	. $_SESSION['Password']		. "</br>";	
							
$XmlStringCarrello = "";
$docCart = new DOMDocument();

	foreach ( file("CARRELLO_DATA.xml") as $nodeCart ){
											 $XmlStringCarrello .= trim($nodeCart);
	}

	if ( !$docCart->loadXML($XmlStringCarrello) ){
	  									die ("ERROR PARSING THIS DOCUMENT\n");
	}
					
							$RecordsHolder=$docCart->documentElement->childNodes;
							$rootCart = $docCart->documentElement;

							$itemToRemove = $RecordsHolder->item( $_POST['element_pos'] );

							$rootCart->removeChild($itemToRemove);

							$path2=dirname(__FILE__) . "/CARRELLO_DATA.xml";
							$docCart->save($path2);
	
	
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
		<link rel="stylesheet" href="styleTest.css">			
</head>	

<body>

	<div class="Box_Container_Nav">
									<div class="Box_Button_Nav">	<a href="RegistrazioneForm.php">Register</a> </div>  
									<div class="Box_Button_Nav">	<a href="LOGIN.php">LOG-IN</a>	</div>
									
																														
									<div class="Box_Button_Nav">	<a href="MAIN.php">Shop</a> </div>
									<div class="Box_Button_Nav">	<a href=""></a> </div>
									<div class="Box_Button_Nav">	<a href="LOGOUT.php">LOG-OUT</a> </div>	
	</div>	

<div class="Box_Container_car">
		
<?php
								
	$t2=microtime();

// IL NUMERO DI ELEMENTI DA STAMPARE DENTRO IN UNA PAGINA 	
	$pageLength = 24;
// costruisco una stringa avente il contenuto del file CARRELLO_DATA.xml, rimuovendo charatteri aggiuntivi come spazi tra gli elementi, rendendolo più "leggibile".
	
	$xmlString = "";
		foreach ( file("CARRELLO_DATA.XML") as $node ) {
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
	$root = $doc->documentElement;
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

/*-----------------------------------------------------------------INIZIO DATA EXTRACTION INSIDE XML FILE----------------------------------------------------------------- */

for( $i = $FirstRecordToVisit; $i<$LastRecordToVisit; $i++ ){
										//mi posiziono su i-esimo Record e ne visualizzo il contenuto
										
										$Record_Visited=$RecordsHolder->item($i);
										
										$IdCliente=				$Record_Visited->firstChild;
										$ClienteIDValue=	$IdCliente->textContent;

										$Art= 					$IdCliente->nextSibling;
										$IdArtValue= 		$Art->textContent;
																			
										$CodArt= 				$Art->nextSibling;		
										$CodArtValue=		$CodArt->textContent;	

										$NomeArt=				$CodArt->nextSibling;
										$NomeArtValue=		$NomeArt->textContent;

										$NameBrand=				$NomeArt->nextSibling;
										$NameBrandValue=	$NameBrand->textContent;
							
										$MadeIn=				$NameBrand->nextSibling;
										$MadeInValue= 		$MadeIn->textContent;

										$Composizione=			$MadeIn->nextSibling;
										$ComposizioneValue=	$Composizione->textContent;

										$Taglia=				$Composizione->nextSibling;
										$TagliaValue= 		$Taglia->textContent;
								
										$PrezzoUni=				$Taglia->nextSibling;
										$PrezzoUniValue=	$PrezzoUni->textContent;

										$Quantita=				$Record_Visited->lastChild;
										$QuantitaValue=		$Quantita->textContent;

/*
Informazioni contenuti nei record che possono essere visualizzati(mostro solo alcuni dei dati al fine di creare un'anagrafica del prodotto)
		echo "<p>";
		echo $ClienteIDValue 	."<br>";
		echo $IdArtValue		."<br>";
		echo $NomeArtValue		."<br>";
		echo $CodArtValue		."<br>";
		echo $NameBrandValue	."<br>";
		echo $MadeInValue		."<br>";
		echo $ComposizioneValue	."<br>";
		echo $TagliaValue		."<br>";
		echo $PrezzoUniValue	."<br>";
		echo $QuantitaValue		."<br>";

		echo "<br>";
*/			


					if(!strcmp($_SESSION["cliente_id"],$ClienteIDValue ) ){		
								
								echo "<div class=\"Box_carrello\">";

										echo "<div class=\"info_art\">";										    
										    echo"<p>";
											
											    echo "ClienteID:". $ClienteIDValue."<br />";
											    echo "Quantita:".$QuantitaValue	."<br />";
											    echo "Taglia:".$TagliaValue	."<br />";
											    echo "Prezzo:".$PrezzoUniValue."<br />";

										    echo "</p>";
										echo "</div>"; 

										echo "<div Box_carrello_input>";  
										    
										    echo "<form action=\"carrello.php?id=".$i ."\" method=\"post\">";

										    echo "<input type=\"hidden\" name=\"element_pos\" 					value=\"" . $i   		. "\" >";										
										    echo "<input type=\"submit\" name=\"remove\" class=\"Box_remove\" 	value=\"rimuovi dal carrello\">";
										   
										    echo "</form>"; 
										echo "</div>";   

								echo "</div>";
					}			

}
								
?>
	
</div>			


</body>
</html>	
