<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $client   				= $_POST['client']; 
	$email					= $_POST['email']; 
	$tel				   	= $_POST['tel']; 
	
	$sql="INSERT INTO `delta_contacts_client`(`client`, `email`, `telephone`) VALUES";
	$sql=$sql." ('".$client."','".$email."','".$tel."')";
	
	$requete = mysql_query($sql) or die( mysql_error()) ;	
	
	$json = '{"client":"'.$client.'"}';
	json_encode($json);
	echo $json;		

?>