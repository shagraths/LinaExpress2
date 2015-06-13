<?php

Class Excelcliente{
	function read_file($filename){
		/** Include PHPExcel_IOFactory */
		include 'PHPExcel/IOFactory.php';
		
		$data = array();
		//  Read your Excel workbook
		$inputFileName = './filesCliente/'.$filename;
		#$inputFileName = './filesCliente/test.xlsx';
		try {
		    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
		    $objPHPExcel = $objReader->load($inputFileName);
		} catch(Exception $e) {
		    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		//  Get worksheet dimensions
		$sheet = $objPHPExcel->getSheet(0); 		
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();

		//  Loop through each row of the worksheet in turn
		for ($row = 1; $row <= $highestRow; $row++){ 
		    //  Read a row of data into an array
		    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
		                                    NULL,
		                                    TRUE,
		                                    FALSE);
		    //  Insert row data array into your database of choice here		    
		    array_push($data, $rowData);		    
		}		
		return $data;
	}
}