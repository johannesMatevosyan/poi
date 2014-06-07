<?php
/* *******************************************************************************************************************
	Example of PHPExcel for Business
	Written by Maarten Balliauw
	More info: http://blog.maartenballiauw.be/post/2008/03/Reuse-Excel-business-logic-with-PHPExcel.aspx
   *******************************************************************************************************************/

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . './PHPExcel/Classes/');

/** Class requirements */
require_once('PHPExcel.php');
require_once('PHPExcel/Reader/Excel2007.php');

// Page variable
$_VIEWDATA = array(
	'totalPrice'	=> 0,
	'discount'		=> 0,
	'grandTotal'	=> 0
);

// Calculation needed?
if (isset($_REQUEST['calculateButton'])) {
	// Load price calculation spreadsheet
	$objReader = new PHPExcel_Reader_Excel2007();
	$objPHPExcel = $objReader->load("price_calculation.xlsx");
	
	// Set active sheet
	$objPHPExcel->setActiveSheetIndex(0);
	
	// Assign data
	$objPHPExcel->getActiveSheet()->setCellValue('automaticTransmission', $_REQUEST['automaticTransmission']);
	$objPHPExcel->getActiveSheet()->setCellValue('carColor', $_REQUEST['carColor']);
	$objPHPExcel->getActiveSheet()->setCellValue('leatherSeats', $_REQUEST['leatherSeats']);
	$objPHPExcel->getActiveSheet()->setCellValue('sportsSeats', $_REQUEST['sportsSeats']);
	
	// Perform calculations
	$_VIEWDATA['totalPrice'] = $objPHPExcel->getActiveSheet()->getCell('totalPrice')->getCalculatedValue();
	$_VIEWDATA['discount'] = $objPHPExcel->getActiveSheet()->getCell('discount')->getCalculatedValue();
	$_VIEWDATA['grandTotal'] = $objPHPExcel->getActiveSheet()->getCell('grandTotal')->getCalculatedValue();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>PHPExcel for Business</title>
    <style type="text/css">
    <!--
        html, body, p 
        {
    	    font-family: Arial, Helvetica, Sans-Serif;
    	    font-size: 10pt;
        }
        h1
        {
            font-size: 26pt;
            font-weight: bold;
            color: #333333;
        }
        #carPicture 
        {
        	position: relative;
        }
        #calculationForm 
        {
        	background-color: #EEEEEE;
        	margin: 0;
        	width: 100%;
        }
        table 
        {
            padding: 5px;
            width: 100%;
        }
        table th
        {
            width: 200px;
            text-align: left;
            font-weight: bold;
        }
    // -->
    </style>
</head>
<body>
    <h1><img id="carPicture" align="right" alt="Car picture" border="0" src="car.jpg" />Price calculation</h1>
    <p>This page is used as an example for <a href="http://www.phpexcel.net">PHPExcel</a>. Data represented is fictitious!</p>
    
    <form id="calculationForm" method="post" name="calculationForm" action="index.php">
        <table>
            <tr>
                <th>Automatic transmission:</th>
                <td>
                    <select id="automaticTransmission" name="automaticTransmission">
                    	<?php if(isset($_REQUEST['automaticTransmission'])) { ?>
                    	<option value="<?php echo $_REQUEST['automaticTransmission']; ?>" selected="selected"><?php echo $_REQUEST['automaticTransmission']; ?></option>
                    	<?php } ?>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Car color:</th>
                <td>
                    <select id="carColor" name="carColor">
                    	<?php if(isset($_REQUEST['carColor'])) { ?>
                    	<option value="<?php echo $_REQUEST['carColor']; ?>" selected="selected"><?php echo $_REQUEST['carColor']; ?></option>
                    	<?php } ?>
                        <option value="Black">Black</option>
                        <option value="Silver">Silver</option>
                        <option value="White">White</option>
                        <option value="Red">Red</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Leather seats:</th>
                <td>
                    <select id="leatherSeats" name="leatherSeats">
                    	<?php if(isset($_REQUEST['leatherSeats'])) { ?>
                    	<option value="<?php echo $_REQUEST['leatherSeats']; ?>" selected="selected"><?php echo $_REQUEST['leatherSeats']; ?></option>
                    	<?php } ?>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Sports seats and suspension:</th>
                <td>
                    <select id="sportsSeats" name="sportsSeats">
                    	<?php if(isset($_REQUEST['sportsSeats'])) { ?>
                    	<option value="<?php echo $_REQUEST['sportsSeats']; ?>" selected="selected"><?php echo $_REQUEST['sportsSeats']; ?></option>
                    	<?php } ?>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <td>
                    <input id="calculateButton" name="calculateButton" type="submit" value="Calculate" />
                </td>
            </tr>
        </table>
    </form>
    
    <?php if (isset($_REQUEST['calculateButton'])) { ?>
    
    <h2>Price details</h2>
    <p>Based on your chosen preferences, your car will cost <?php echo number_format($_VIEWDATA['grandTotal'], 2); ?> EUR.</p>
    <table>
        <tr>
            <th>Total price:</th>
            <td><?php echo number_format($_VIEWDATA['totalPrice'], 2); ?> EUR</td>
        </tr>
        <tr>
            <th>Discount:</th>
            <td><?php echo number_format($_VIEWDATA['discount'] * 100, 2); ?>%</td>
        </tr>
        <tr>
        	<td colspan="2"><hr noshade="noshade"></hr>
        </tr>
        <tr>
            <th>Grand total:</th>
            <td><?php echo number_format($_VIEWDATA['grandTotal'], 2); ?> EUR</td>
        </tr>
    </table>
    <p><a href="index.php">New price calculation</a></p>
    
    <?php } ?>
    
</body>
</html>
