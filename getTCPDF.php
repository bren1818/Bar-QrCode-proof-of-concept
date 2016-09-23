<?php
	/*
		QR Codes
	*/
	include "tcpdf/tcpdf.php";
	include "tcpdf/tcpdf_barcodes_2d.php";
	
	
	// Get pararameters that are passed in through $_GET or set to the default value
	$text = (isset($_GET["text"])?$_GET["text"]:"0");
	
	if($text == ""){ $text = "thisisatest"; }
	
						//text, path, correction level, pixel size, frame size
	//$image = QRcode::png($text,null,QR_ECLEVEL_Q,4,4);
	
	 
	header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', FALSE);
	header('Pragma: no-cache');
	header ('Content-type: image/png');
	//imagepng($image);
	//imagedestroy($image);
	
	// set the barcode content and type
	$barcodeobj = new TCPDF2DBarcode($text, 'DATAMATRIX');

	// output the barcode as PNG image
	$barcodeobj->getBarcodePNG(60, 6, array(0,0,0));
	
?>