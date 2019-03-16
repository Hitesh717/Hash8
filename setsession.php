<?php
	
    session_start();
    // do any authentication first, then add POST variable to session
    if (isset($_POST['callRetrieve'])) {
    	$_SESSION['myselected'] = $_POST['callRetrieve'];
    	echo $_SESSION['myselected'];
    }
    if (isset($_POST['age'])) {
    	$_SESSION['age'] = $_POST['age'];
    	echo $_SESSION['age'];
    }
    if (isset($_POST['gender'])) {
    	$_SESSION['gender'] = $_POST['gender'];
    	echo $_SESSION['gender'];
    }
?>