<?php

/*CREAZIONE FILE CARRELLO DATA NEL L'ATTUALE PERCORSO FILE

echo __FILE__;
$path2=dirname(__FILE__) . "/CARRELLO_DATA.xml";

TEORICAMENTE NON SERVE CREARE QUESTO FILE SICCOME DI BASE DOVREBBE ESSERE POPOLATO.
*/

//-----------------------------------------------------------------------------------------------------------------------------
// modifiche nel documento xml
$XmlStringCarrello = "";

	foreach ( file("CARRELLO_DATA.xml") as $nodeCart ) {
																											$XmlStringCarrello .= trim($nodeCart);
	}

$docCart = new DOMDocument();

	if (!$docCart->loadXML($XmlStringCarrello)) {
	  																					die ("ERROR PARSING THIS DOCUMENT\n");
	}

// creazione di un nuovo record per carrello (serve per aggiungere gli articoli scelti dall'utente dentro il suo carrello)
$rootCart = $docCart->documentElement;
$NewRecordCart = $docCart->createElement("record");

$NewIdClient= 	$docCart->createElement 	( "ID_CLIENTE",  	  	$_POST["id_client"]      	);
$NewIdArt 	= 	$docCart->createElement 	( "ID_ARTICOLO", 	  	$_POST["id_art"] 		   		);
$NewCodArt  = 	$docCart->createElement 	( "CODICE_ART", 	  	$_POST["cod_art"] 	   		);
$NewNomeArt = 	$docCart->createElement 	( "NOME_ARTICOLO",  	$_POST["Nome_art"]   	   	);
$NewBrand 	= 	$docCart->createElement 	( "NOME_BRAND",	  		$_POST["nome_Brand_art"] 	);
$NewMadeIn  = 	$docCart->createElement 	( "MADE_IN", 		  		$_POST["made_in_art"]    	);
$NewComp 		= 	$docCart->createElement 	( "COMPOSIZIONE",	 		$_POST["comp_art"]	   		);
$NewTaglia  = 	$docCart->createElement 	( "TAGLIA",		  			$_POST["taglia_art"]     	);
$NewPrezzo  = 	$docCart->createElement 	( "PREZZO_UNITARIO",	$_POST["Prezzo_uni_art"] 	);
$NewQuantita= $docCart->createElement 		( "QUANTITA",					$_POST["Prezzo_uni_art"] 	);

$NewRecordCart -> appendChild ($NewIdClient);
$NewRecordCart -> appendChild ($NewIdArt	 );
$NewRecordCart -> appendChild ($NewCodArt  );
$NewRecordCart -> appendChild ($NewNomeArt );
$NewRecordCart -> appendChild ($NewBrand	 ); 
$NewRecordCart -> appendChild ($NewMadeIn	 );
$NewRecordCart -> appendChild ($NewComp		 );
$NewRecordCart -> appendChild ($NewTaglia	 );
$NewRecordCart -> appendChild ($NewPrezzo	 );
$NewRecordCart -> appendChild ($NewQuantita);


/*
echo "\n<br />--- ... ecco fatto ";
echo "\n<br />--- il nuovo record: " . $NewRecordCart->firstChild->textContent;
echo "\n<br />--- " . $NewRecordCart->childNodes->item(1)->textContent;
echo "\n<br />--- " . $NewRecordCart->lastChild->textContent . " ---";
echo "\n</p>";

inserimento del record all'interno del file CARRELLO_DATA.XML
*/

$NewRecordCartCopy=$NewRecordCart->cloneNode(TRUE);
$rootCart->appendChild($NewRecordCartCopy);

//--------------------------------------------------------------------------------------------------------------------------------------
// modifiche nel documento xml
$XmlStringClient = "";

	foreach ( file("CARRELLO_DATA.xml") as $nodeClient ) {
																												$XmlStringClient .= trim($nodeClient);
	}

$docClient = new DOMDocument();

	if (!$docClient->loadXML($XmlStringClient)) {
	  																					die ("ERROR PARSING THIS DOCUMENT\n");
	}

// creazione di un nuovo <record> per Client (serve per salvare i dati forniti nella registrazione form)
$rootClient 		 = $docClient->documentElement;
$NewRecordClient = $docClient->createElement("record");

$NewIdClient  	= $docClient->createElement 	( "ID_CLIENTE",  			$_SESSION['cliente_id'] );
$NewNameClient	= $docClient->createElement 	( "NOME_CLIENTE",  		$_SESSION['Nome']   	);
$NewSurClient 	= $docClient->createElement 	( "COGNOME_CLIENTE",  $_SESSION['Cognome']    );
$NewUserClient	= $docClient->createElement 	( "USER_CLIENTE",  		$_SESSION['Username']   );
$NewPassClient	= $docClient->createElement 	( "PASS_CLIENTE",  		$_SESSION['Password']   );
$NewCFClient		= $docClient->createElement 	( "C_F_CLIENTE",  		$_SESSION['Password']   );	
$NewEmailClient	= $docClient->createElement 	( "EMAIL_CLIENTE ",  	$_SESSION['Password']   );															 



$NewRecordClient -> appendChild ($NewIdClient   );
$NewRecordClient -> appendChild ($NewNameClient );
$NewRecordClient -> appendChild ($NewUserClient );
$NewRecordClient -> appendChild ($NewPassClient );
$NewRecordClient -> appendChild ($NewCFClient   );
$NewRecordClient -> appendChild ($NewEmailClient);

/*inserimento del record all'interno del file CLIENTE_DATA.XML */

$NewRecordClientCopy=$NewRecordClient->cloneNode(TRUE);
$rootClient->appendChild($NewRecordClientCopy);
?>



<?php
	  	fuction ValidateFileDOM($namefile){
	  												if ($doc->schemaValidate($namefile)) {
														  																		echo "<p>This document is valid</p>\n";
														}else{
															echo "<p>This document is not valid</p>\n";
														}
	  	}



?>