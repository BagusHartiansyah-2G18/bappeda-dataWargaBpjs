<?php

function prep_pdf($orientation = 'landscape')
{
	$CI = & get_instance();
	$all = $CI->pdf->openObject();
	$CI->pdf->saveState();
	$CI->pdf->setStrokeColor(0,0,0,1);
	if($orientation == 'portrait') {
		$CI->pdf->ezSetMargins(50,70,50,50);
		$CI->pdf->ezStartPageNumbers(500,28,8,'','{PAGENUM}',1);
		$CI->pdf->line(20,40,578,40);
		$CI->pdf->addText(50,32,8,'Printed on ' . date('m/d/Y h:i:s a'));
		$CI->pdf->addText(50,22,8,'Copyright SKP Online PNS Kabupaten Sumedang');
		//$CI->pdf->addText(50,22,8,'Jl. Cik Di Tiro 34 Yogyakarta, Telp. +62 274 566160 ');
		//$CI->pdf->addText(50,22,8,'E-mail : info@gamatechno.com ');
	}
	else {
		$CI->pdf->ezStartPageNumbers(750,28,8,'','{PAGENUM}',1);
		$CI->pdf->line(20,40,800,40);
		$CI->pdf->addText(50,32,8,'Printed on ' . date('m/d/Y h:i:s a'));
		$CI->pdf->addText(50,22,8,'Copyright SKP Online PNS Kabupaten Sumedang');
	}
	$CI->pdf->restoreState();
	$CI->pdf->closeObject();
	$CI->pdf->addObject($all,'all');
}

?>