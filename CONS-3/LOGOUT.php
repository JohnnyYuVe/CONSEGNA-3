<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);// MI NOTIFICA DI TUTTI GLI ERRORI AVVENUTI IN RUNTIME 
session_start();//RIPRENDE LA SESSIONE IN CORSO O LO CREA SE NON NE TROVA UNA
unset($_SESSION);
session_destroy();
?>


<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
			<title>logout</title>
			<link rel="stylesheet" href="styleTest.css">
	</head>

<body>
	
<div class="Box_Container_Input">	

	
	<div class="text">  <p>ARRIVEDERCI </br></p>  </div>
	
	
	
<div class="BOX_BOTTONE">  <a href="LOGIN.php" alt="aa">torna a login</a>  </div>
	
</div>	

</body>

</html>