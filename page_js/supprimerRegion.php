<?php
session_start();
include('../connexion/cn.php');
	
	$id   = $_GET["ID"] ;
	
	$sql = "delete from `delta_regions` WHERE id=".$id;
	$requete = mysql_query($sql) ;
    $dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','11','3','".$id."')";
    $req=mysql_query($sql1);	
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../tabs.php?suc=11" </SCRIPT>';
	
?>