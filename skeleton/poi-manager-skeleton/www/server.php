<?php 
$dbhost = 'localhost';
$dbname = 'scraper_db';
$dbuser = 'root';
$dbpass = '';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname, $conn);

$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : "";
$response = array();
$response['meta'] = array('method' => $method);

switch($method) {
	case 'scraper.poi.getList':
		$response['output'] = getList();
		break;
		
	case 'scraper.poi.getDetails':
		$response['output'] = getDetails();
		break;
		
	case 'scraper.poi.saveDetails':		
		saveDetails();
		break;
		
	case 'scraper.poi.saveImage':
		saveImage();
		break;
		
	default:
		$response['meta']['error'] = "Method not recognised";
}

header('Content-type: application/json'); 
echo json_encode($response);

//=============================================================================

function getList() {
	return array(
		array('id' => 1, 'title' => 'Seaside Cafe'),
		array('id' => 2, 'title' => 'Hilltop Cafe'),
	);	
}

function getDetails() {
	$id = $_REQUEST['id'];
	
	return array('id' => 1, 
				'title' => 'Seaside Cafe',
				'biography' => '',
				'lat' => 1.9,
				'lng' => 2.1,
				'images' => array('images/poi-1/img1.jpg', 'images/poi-1/img2.jpg')
	);
}

function saveDetails() {
	$id = $_REQUEST['id'];
	$title = $_REQUEST['title'];
	$website = $_REQUEST['website'];
	$email = $_REQUEST['email'];
	$address = $_REQUEST['address'];
	$coords = $_REQUEST['coords'];
	
	return true;
}

function saveImage() {
	$id = $_REQUEST['id'];
	$src = $_REQUEST['src'];
	
	return true;
}
?>