<?php 
//connessione al server per simulare il login.
ini_set('display_errors', 1);

error_reporting(E_ALL);
require_once("Connect_to_Server.php");

							session_start();
							echo"</br>qui trovi un piccolo feedback su quello che sta accadendo";
							echo "</br></br></br>";
							echo "Codice ID: ". $_SESSION['cliente_id']."</br>";
							echo "Nome cliente: ". $_SESSION['Nome']."</br>";
							echo "Cognome cliente: ". $_SESSION['Cognome']."</br>";
							echo "Username: ". $_SESSION['Username']."</br>";
							echo "Password ". $_SESSION['Password']."</br>";
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


<?php
	$t2=microtime();
	
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
	$Record=$doc->documentElement->childNodes;	

// creo un ciclo, nella quale visito tutti i record presenti nel file e ne visualizzo il contenuto.
/*
for($i=0; $i<$Record->length; $i++){
										//mi posiziono su i-esimo Record e ne visualizzo il contenuto
										
										$Record_Visited=$Record->item($i);
										
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

 Informazioni contenuti nei record che possono essere visualizzati
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
	

echo "<div class=\"Box_Articolo\">

			  <img src=\"box.jpg\" alt=\"immagine box\" style=\"width:100px\">
			 ";
	echo  "</p class=\"text_art \">". $NomeArtValue  ."</p>";
	echo "</p class=\"text_art \">".  $PrezzoUniValue."euro</p>";		 
	
	echo"<form action=\"MAIN.php?id=".$CodArtValue ."\" method=\"post\">";

		echo"<input type=\"hidden\" name=\"Nome_art\"    value=\"" .$NomeArtValue   . "\" >";   
		echo"<input type=\"hidden\" name=\"Prezzo\"    value=\"" .$PrezzoUniValue ."\" >";
	    echo"<input type=\"hidden\" name=\"id_art\"    value=\"" .$CodArtValue    ."\" >";
	    echo"<input type=\"hidden\" name=\"id_client\" value=\"" .$_SESSION["cliente_id"] ."\" >";
//gli hidden type servono per tenere traccia di quale articolo viene aggiunto al carrello.	
	echo "<div>
		 	<input type=\"number\" name=\"Quantita\" class=\"Box_quantita\" value=1>
		</div>";

	echo "<div>
			<input type=\"submit\" name=\"add_to_cart\" class=\"Box_bottone\" value=\"Aggiungi al carrello\">
		</div>";

	echo"</div>
			</form>	
		</br>";	

	echo"</p>";


}
*/
?>

</body>
</html>	