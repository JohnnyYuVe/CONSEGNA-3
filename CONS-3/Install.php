<?php
//questo file è un one-time-run ovvero è pensato come un "usa e getta" in quanto il database potrebbe non esistere / esistere ma non avere dati / esistere ma avere dati mancanti / perciò e struttutato in questo modo dove viene effettuato l'import avviene su tutte le tabelle.
$Hostname="localhost:3307";
$UsernameDB="utente1";
$PasswordDB="utente1";



//connessione con il server myphpadmin per poter accedere ai database;
$mysqliConnection = new mysqli($Hostname, $UsernameDB, $PasswordDB);


//controllo della connessione con il server se è andato a buon fine.
if ($mysqliConnection->connect_error) {
                        
                        die("connection failed". $mysqliConnection->connect_error);

}else{

	echo "<p>Connessione al server phpmyadmin per la creazione del BD avvenuta con successo</p>";
	
	$sql1 = "CREATE DATABASE IF NOT EXISTS sito_web";

	if ($mysqliConnection->query($sql1) === TRUE) {
  	

 	require("Connect_to_Server.php");   
    $sql = file_get_contents("sito_web.sql");
	$mysqliConnection->multi_query($sql);

	} else {	
 echo "Error creating database: " . $conn->error;
	}

	


	

}


?>