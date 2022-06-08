<?php
session_start();
include('../connexion/cn.php');
	
	$id   = $_GET["ID"] ;
	
	$sql = "delete from `delta_mode_paiement` WHERE id=".$id;
	$requete = mysql_query($sql) ;
	
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../tabs.php?suc=7" </SCRIPT>';
	
?>