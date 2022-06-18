<?php 
error_reporting(E_ALL);
include '../Classes/PHPExcel.php';
include '../Classes/PHPExcel/Writer/Excel2007.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Delta Web IT");
$objPHPExcel->getProperties()->setLastModifiedBy("Delta Web IT");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");


$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->SetCellValue('A1', ("Liste des Fournisseurs"));
$objPHPExcel->getActiveSheet()->SetCellValue('A2', ("Date"));
$objPHPExcel->getActiveSheet()->SetCellValue('A4', ("Code"));
$objPHPExcel->getActiveSheet()->SetCellValue('B4', ("Raison Sociale"));
$objPHPExcel->getActiveSheet()->SetCellValue('C4', ("Matricule Fiscale"));
$objPHPExcel->getActiveSheet()->SetCellValue('D4', ("R. de commerce"));
$objPHPExcel->getActiveSheet()->SetCellValue('E4', ("Email"));
$objPHPExcel->getActiveSheet()->SetCellValue('F4', ("Téléphone"));
$objPHPExcel->getActiveSheet()->SetCellValue('G4', ("region"));
$objPHPExcel->getActiveSheet()->SetCellValue('H4', ("Activité"));



$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);


$i = 5;

	session_start();
	include('../connexion/cn.php');

	$article="";
	$req="select * from delta_fournisseurs";
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$code					=	$enreg["code"] ;	
		$raison_social			=	$enreg["raison_social"] ;
		$mail					=	$enreg["mail"] ;
		$tel					=	$enreg["tel"] ;
		$adresse				=	$enreg["adresse"] ;
		$mf			        	=	$enreg["matricule_fiscale"] ;
		$rc				        =	$enreg["registre_commerce"] ;
		$pays			    	=	$enreg["pays"] ;
		$gouvenorat				=	$enreg["gouvernorat"] ;
        $region      		    =   $enreg["region"] ;
        $banque      		    =   $enreg["banque"] ;
        $activite      		    =   $enreg["activite"] ;
        $rib      		        =   $enreg["rib"] ;
        $dateheure              = date('d-m-y'); 
			$reqR = "select * from delta_regions where id=".$region ; 
            $queryR = mysql_query($reqR) ; 
            while($enregR = mysql_fetch_array($queryR)){
                $region = $enregR["designation"] ; 
            }
			

		
			$objPHPExcel->getActiveSheet()->SetCellValue('B2', ($dateheure));
			$objPHPExcel->getActiveSheet()
			->getStyle('A'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, ($code));
			$objPHPExcel->getActiveSheet()
			->getStyle('A'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	


			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, ($raison_social));
			$objPHPExcel->getActiveSheet()
			->getStyle('B'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	

			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, ($mf));
			$objPHPExcel->getActiveSheet()
			->getStyle('C'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	

			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, ($rc));
			$objPHPExcel->getActiveSheet()
			->getStyle('D'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);

			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, ($mail));
			$objPHPExcel->getActiveSheet()
			->getStyle('D'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);

			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, ($tel));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);

			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, ($region));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, ($activite));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			


		$i ++;
	}
	

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setTitle('Liste des Fournisseurs');


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Liste_fournisseurs"'.$dateheure.'".xls"');
header('Cache-Control: max-age=0');

// Do your stuff here

$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

$writer->save('php://output');
// Echo done
//echo date('H:i:s') . " Done writing file.\r\n";

?>