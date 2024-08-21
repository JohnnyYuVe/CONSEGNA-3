
<?php 
//-----------------------------------------------------------------CONNECTION BLOCK----------------------------------------------------------------- 
//SIMULATION OF A CONNECTION WITH A WEB PAGE THROUGHT phpmyAdmin server.
ini_set('display_errors', 1);

error_reporting(E_ALL);
require_once("Connect_to_Server.php");

							session_start();

/*FEEDBACK ABOUT WHAT HAPPEN PREVIOUSLY INSIDE LOGIN.PHP TO SEE IF EVERYTHING WENT SMOOTH.
							echo "</br></br>";

							echo "Codice ID: "				. $_SESSION['cliente_id']."</br>";
							echo "Nome cliente: "			. $_SESSION['Nome']		."</br>";
							echo "Cognome cliente: "			. $_SESSION['Cognome']	."</br>";
							echo "Username: "				. $_SESSION['Username']	."</br>";
							echo "Password: "				. $_SESSION['Password']	."</br>";
							echo "Email: "					. $_SESSION['Email']	."</br>";
							echo "COD_FIS: "				. $_SESSION['COD_FIS']	."</br>";
							echo "Percorso assoluto del file:"	. __FILE__ 			."</br>";
*/	

?>

<?php
//-----------------------------------------------------------------INPUT BLOCK-----------------------------------------------------------------  

// BLOCK CODE IN WAIT FOR SOME INFORMATION TO ADD INSIDE THE CARRELLO DATA + A LITTLE CHECK ABOUT THE INFORMATION THAT WAS SEND/SAVED INSIDE $_POST.

if( isset($_POST['add_to_cart'])  ){

							if(	empty($_POST["id_client"]	) || empty($_POST["id_art"]		) || empty($_POST["Nome_art"]		) ||
								empty($_POST["Prezzo_uni_art"]) || empty($_POST["Quantita"]		) || empty($_POST["cod_art"]		) ||
								empty($_POST["name_brand_art"]) || empty($_POST["made_in_art"]	) || empty($_POST["comp_art"]		) ||	
								empty($_POST["taglia_art"]	)
							){echo "\ERRORE NELLA RICEZIONE DELL'ARTICOLO";}
							
							else{


/*	CARRELLO DATA RECIVED THAT HAS TO ADD INSIDE THE FILE(Rimuovere il commento per vedere cosa si sta inserendo ).

								echo "informazione inserito dentro IL FILE CARRELLO";			*/				
		echo"</br></br>";
		echo "Client id :"		. $_POST["id_client"]		."</br>";
		echo	"Art id :"		. $_POST["id_art"]			."</br>";
		echo	"Nome art :"		. $_POST["Nome_art"]		."</br>";
		echo	"Prezzo art :"		. $_POST["Prezzo_uni_art"]	."</br>";
		echo	"Quantita art :"	. $_POST["Quantita"]		."</br>";
		echo	"Codice art :"		. $_POST["cod_art"]			."</br>";
		echo	"brand art :"		. $_POST["name_brand_art"]	."</br>";
		echo	"made in art :"	. $_POST["made_in_art"]		."</br>";
		echo	"comp art :"		. $_POST["comp_art"]		."</br>";
		echo	"taglia art :"		. $_POST["taglia_art"]		."</br>";


		Test();

}
}

?>

<!-- -----------------------------------------------------------------PAGE BLOCK----------------------------------------------------------------- -->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>	
		<title>pagina principale </title>
		
		<link rel="stylesheet" href="styleTest.css">	
		
</head>	

<body>

<?php	
// IL NUMERO DI ELEMENTI DA STAMPARE DENTRO IN UNA PAGINA 	
	$pageLength = 24;
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

?>

<!--Piccolo menu a barra sulla parte alta della pagina -->
<div class="Box_Container_Nav">
						<div class="Box_Button_Nav">	<a href="RegistrazioneForm.php">Register</a></div>  
						<div class="Box_Button_Nav">	<a href="LOGIN.php">LOG-IN			</a></div>
						<div class="Box_Button_Nav">	 <a href="carrello.php">Carrello		 </a></div>
						<div class="Box_Button_Nav">	<a href="MAIN.php"> shop						</a></div>
						<div class="Box_Button_Nav">	<a href="LOGOUT.php">LOG-OUT			</a></div>	
</div>	





<!-- -----------------------------------------------------------------INIZIO CONTAINER PER BOX_ART----------------------------------------------------------------- -->
<div class="Box_Container_Art">

<?php
	
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

/*-----------------------------------------------------------------INIZIO DATA EXTRACTION INSIDE XML FILE----------------------------------------------------------------- */

for( $i = $FirstRecordToVisit; $i<$LastRecordToVisit; $i++ ){
										//mi posiziono su i-esimo Record e ne visualizzo il contenuto
										
										$Record_Visited=$RecordsHolder->item($i);
										
										$Art= 				$Record_Visited->firstChild;
										$IdArtValue= 		$Art->textContent;
										
										$CodArt= 				$Art->nextSibling;
										$CodArtValue=		$CodArt->textContent;

										$NomeArt=				$CodArt->nextSibling;
										$NomeArtValue=		$NomeArt->textContent;

										$NameBrand=			$NomeArt->nextSibling;
										$NameBrandValue=	$NameBrand->textContent;
							
										$MadeIn=				$NameBrand->nextSibling;
										$MadeInValue= 		$MadeIn->textContent;

										$Composizione=			$MadeIn->nextSibling;
										$ComposizioneValue=	$Composizione->textContent;

										$Taglia=				$Composizione->nextSibling;
										$TagliaValue= 		$Taglia->textContent;
								
										$PrezzoUni=			$Record_Visited->lastChild;
										$PrezzoUniValue=	$PrezzoUni->textContent;

/*
Informazioni contenuti nei record che possono essere visualizzati(mostro solo alcuni dei dati al fine di creare un'anagrafica del prodotto)
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


/*  -----------------------------------------------------------------INIZIO ANAGRAFICA ARTICOLO BOX----------------------------------------------------------------- */
echo "<div class=\"Box_Articolo\">

			  <img src=\"box.jpg\" alt=\"immagine box\" style=\"width:100px\">
			 ";
	echo  "</p class=\"text_art \">".  $NomeArtValue  	."</p>";
	echo  "</p class=\"text_art \">".  $PrezzoUniValue	."euro</p>";		 

//OGNI BOX HA LA SUA FORM 	
	
	echo  "<form action=\"MAIN.php?id=".$CodArtValue  	."\" method=\"POST\">";

/*---------------------------------INIZIO INFORMAZIONI NON VISIBILI DELL'ARTICOLO PASSATI TRAMITE FORM ---------------------------------*/
		echo"<input type=\"hidden\" name=\"Nome_art\"    		value=\"" . $NomeArtValue   			. "\" >";   
		echo"<input type=\"hidden\" name=\"Prezzo_uni_art\"    value=\"" . $PrezzoUniValue 			. "\" >";
	     echo"<input type=\"hidden\" name=\"cod_art\"    		value=\"" . $CodArtValue    			. "\" >";
	     echo"<input type=\"hidden\" name=\"id_art\"    		value=\"" . $IdArtValue    			. "\" >";
	     echo"<input type=\"hidden\" name=\"name_brand_art\"    value=\"" . $NameBrandValue    		. "\" >";
	     echo"<input type=\"hidden\" name=\"made_in_art\"    	value=\"" . $MadeInValue    			. "\" >";
	     echo"<input type=\"hidden\" name=\"comp_art\"    		value=\"" . $ComposizioneValue    		. "\" >"; 
	     echo"<input type=\"hidden\" name=\"taglia_art\"    	value=\"" . $TagliaValue    			. "\" >";  
	     echo"<input type=\"hidden\" name=\"id_client\" 		value=\"" . $_SESSION["cliente_id"]	. "\" >";

		//gli hidden type servono per tenere traccia di quale articolo viene aggiunto al carrello.		
	echo "<div>
		 	<input type=\"number\" name=\"Quantita\" class=\"Box_quantita\" value=1>
		</div>";

	echo "<div>
			<input type=\"submit\" name=\"add_to_cart\" class=\"Box_bottone\" value=\"Aggiungi al carrello\">
		</div>";

	echo"</form>";
/*---------------------------------FINE  INFORMAZIONI NON VISIBILI DELL'ARTICOLO PASSATI TRAMITE FORM ---------------------------------*/

echo"</div>";			

/*  -----------------------------------------------------------------FINE ANAGRAFICA ARTICOLO BOX----------------------------------------------------------------- */	


}
/*-----------------------------------------------------------------FINE DATA EXTRACTION INSIDE XML FILE----------------------------------------------------------------- */

	if ( $LastRecordToVisit < $RecordsHolder->length - 1 ) {
	     echo '<p>
	     		<a href="MAIN.php?next='. $LastRecordToVisit. '">NEXT PAGE &gt;&gt;&gt;</a>
	     	</p>';

	     	
	} else {
		print '<p>** END FILE **</p>';
	}


?>

</div>
<!-- -----------------------------------------------------------------FINE CONTAINER PER BOX_ART----------------------------------------------------------------- -->


</body>

</html>	



<?php

function  Test(){

$XmlStringCarrello = "";
$docCart = new DOMDocument();

	foreach ( file("CARRELLO_DATA.xml") as $nodeCart ){
											 $XmlStringCarrello .= trim($nodeCart);
	}

	if ( !$docCart->loadXML($XmlStringCarrello) ){
	  									die ("ERROR PARSING THIS DOCUMENT\n");
	}


// creazione di un nuovo record per carrello (serve per aggiungere gli articoli scelti dall'utente dentro il suo carrello)
$rootCart = $docCart->documentElement;
$NewRecordCart = $docCart->createElement("record");

$NewIdClient= 	$docCart->createElement 	( "ID_CLIENTE",  	  	$_POST["id_client"]      );
$NewIdArt   = 	$docCart->createElement 	( "ID_ARTICOLO", 	  	$_POST["id_art"] 		);
$NewCodArt  = 	$docCart->createElement 	( "CODICE_ART", 	  	$_POST["cod_art"] 	   	);
$NewNomeArt = 	$docCart->createElement 	( "NOME_ARTICOLO",  	$_POST["Nome_art"]   	);
$NewBrand = 	$docCart->createElement 	( "NOME_BRAND",	  	$_POST["name_brand_art"] );
$NewMadeIn  = 	$docCart->createElement 	( "MADE_IN", 		  	$_POST["made_in_art"]    );
$NewComp 	= 	$docCart->createElement 	( "COMPOSIZIONE",	 	$_POST["comp_art"]	   	);
$NewTaglia  = 	$docCart->createElement 	( "TAGLIA",		  	$_POST["taglia_art"]     );
$NewPrezzo  = 	$docCart->createElement 	( "PREZZO_UNITARIO",	$_POST["Prezzo_uni_art"] );
$NewQuantita=  $docCart->createElement 		( "QUANTITA",			$_POST["Quantita"] 		);

$NewRecordCart -> appendChild ($NewIdClient	);
$NewRecordCart -> appendChild ($NewIdArt	);
$NewRecordCart -> appendChild ($NewCodArt  	);
$NewRecordCart -> appendChild ($NewNomeArt 	);
$NewRecordCart -> appendChild ($NewBrand	); 
$NewRecordCart -> appendChild ($NewMadeIn	);
$NewRecordCart -> appendChild ($NewComp		);
$NewRecordCart -> appendChild ($NewTaglia	);
$NewRecordCart -> appendChild ($NewPrezzo	);
$NewRecordCart -> appendChild ($NewQuantita	);

/*inserimento del record all'interno del file CARRELLO_DATA.XML*/

$NewRecordCartCopy = $NewRecordCart->cloneNode(TRUE);
$rootCart -> appendChild ($NewRecordCartCopy);

$path2=dirname(__FILE__) . "/CARRELLO_DATA.xml";
$docCart->save($path2);


echo "\n<p>inserimento fatto</p>";
}

?>