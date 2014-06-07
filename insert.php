<?php
    include_once('core/CRUD.php');
    require_once 'Classes/PHPExcel.php';
    require_once 'Classes/PHPExcel/IOFactory.php';

    $objPHPExcel = new PHPExcel();

    $objPHPExcel = PHPExcel_IOFactory::load("pois.xls");
    $sheet = $objPHPExcel->getSheetByName('POI\'s');

    $highestRow = $sheet->getHighestRow();
    $cell2 = $sheet->getCellByColumnAndRow(0, 3);

    $insert_poi = new CRUD('pois');

    $fields_array = array(
                'title',
                'address', '', '', '', '',
                'telephone',
                'email',
                'website'
            );

    for($j = 2; $j <= $highestRow; $j++) //311
    {
        if(!empty($sheet->getCellByColumnAndRow(0, $j)->getValue()))
        {
        //insert line
            for ($col = 0; $col <= 8; ++$col)
            {

                $cell2 = $sheet->getCellByColumnAndRow($col, $j);
                $row_val = htmlspecialchars($cell2->getValue(), ENT_QUOTES);

                    switch($col){
                        case 2:
                            $insert_array[$fields_array[$col - 1]] .= ', '.$row_val; // 1
                            break;
                        case 3:
                            $insert_array[$fields_array[$col - 2]] .= ', '.$row_val; // 1
                            break;
                        case 4:
                            break;
                        case 5:
                            break;
                        default:
                            $insert_array[$fields_array[$col]] = $row_val;
                    }

            }

            // INSERT INTO DB
            $insert_poi->create($insert_array);
        }
        // end insert line

    }

echo "Row inserted";
