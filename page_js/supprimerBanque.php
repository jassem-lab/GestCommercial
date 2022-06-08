<?php
session_start();
include('../connexion/cn.php');
	
	$id   = $_GET["ID"] ;
	
	$sql = "delete from `delta_banques` WHERE id=".$id;
	$requete = mysql_query($sql) ;

    $dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','7','3','".$id."')";
    $req=mysql_query($sql1);	
	
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../tabs.php?suc=8" </SCRIPT>';
	
?>