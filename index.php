<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<?php
        include_once('core/CRUD.php');
	?>
	<title></title>
</head>
<body>
	<?php

    	require_once 'Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();
		// Set properties
		$objPHPExcel->getProperties()->setCreator("ThinkPHP")
						->setLastModifiedBy("Daniel Schlichtholz")
						->setTitle("Office 2007 XLSX Test Document")
						->setSubject("Office 2007 XLSX Test Document")
						->setDescription("Test doc for Office 2007 XLSX, generated by PHPExcel.")
						->setKeywords("office 2007 openxml php")
						->setCategory("Test result file");
		$objPHPExcel->getActiveSheet()->setTitle('Minimalistic demo');
	
		require_once 'Classes/PHPExcel/IOFactory.php';
		$objPHPExcel = PHPExcel_IOFactory::load("pois.xls");

        $sheet = $objPHPExcel->getSheetByName('POI\'s');

    echo "<br/>Title: ".$worksheetTitle = $sheet->getTitle()."<br/>";
    echo "<br/>Highest Row: ".$highestRow = $sheet->getHighestRow()."<br/>";
    echo "<br/>Highest Column: ".$highestColumn = $sheet->getHighestColumn()."<br/>";
    //echo "<br/>Highest Column Index: ".$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn)."<br/>";

    $nrColumns = ord($highestColumn) - 64;
    echo "<br/>The worksheet ".$worksheetTitle." has ";
    echo $nrColumns . ' columns (A-' . $highestColumn . ')';
    echo ' and ' . $highestRow . ' row.';

    echo "<br/>Display single field <br/>";
    $cell2 = $sheet->getCellByColumnAndRow(0, 3);
    $val2 = $cell2->getValue();
    echo '<hr/>Value: ' . $val2 .'<hr/>';

    // Display one row
    echo "<br/>Display single row <br/>";
    echo  "Value: ";

    // Display one column
    echo "<br/>";
    echo "<br/>Display single column <br/>";
    for ($row = 0; $row <= 31; ++$row) {
        $cell2 = $sheet->getCellByColumnAndRow(0, $row);
        $column_val2 = $cell2->getValue();
        echo $row.' Value: ' . $column_val2 .'<hr/>';
    }

    echo '<br>Data: <table border="1" style="color:blue; background:yellow;"><tr>';

    for ($row = 1; $row <= 31; ++ $row) {
        echo '<tr>';
        for ($col = 0; $col < 9; ++ $col) {
            $cell = $sheet->getCellByColumnAndRow($col, $row);
            $val = $cell->getValue();
            $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
            echo '<td>' . $val .'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

?>

</body>
</html>