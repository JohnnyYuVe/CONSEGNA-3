<?php
//dichiarazioni informazioni innerente al server alla quale mi sono connesso
$Hostname="localhost:3307";
$UsernameDB="utente1";
$PasswordDB="utente1";
$NomeDB ="sito_web";

//tabelle utilizzata per la fare interazioni con il data base

//connessione con il server myphpadmin per poter accedere ai database;
$mysqliConnection = new mysqli($Hostname, $UsernameDB, $PasswordDB, $NomeDB);

//controllo della connessione se è andato a buon fine.
if ($mysqliConnection->connect_error) {
                        die("connection failed". $mysqliConnection->connect_error);
}else{
	echo "Connessione al server phpmyadmin avvenuta con successo";
}

?>