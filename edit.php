<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title>POI</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<meta name="description" content="point of interest">
<meta name="keywords" content="websites, images, maps, links">
<meta name="author" content="Hovhannes Matevosyan, Hayk Kyureghyan">
<link rel="stylesheet" href="style.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
</head>
<body>
<header>
    scraper
    <div></div>
</header>
<div class="content">
<?php
    include_once('core/CRUD.php');
    $edit_poi = new CRUD('pois');
    $id = $_GET['id'];

// get data from countries table
$countries = new CRUD('countries');
// get data from locations table
$locations = new CRUD('locations');
// get data from images table
$send_images = new CRUD('images');


    if(!empty($_POST)){

        $a = explode(', ', $_POST['coords']);
        $edit_arr = $_POST;
        unset($edit_arr['coords']);
        $edit_arr['latitude'] = (string)$a[0];
        $edit_arr['longitude'] = (string)$a[1];

        $poi_by_id = $edit_poi->query("SELECT id FROM pois WHERE website='".$edit_arr['website']."'");
        $poi_id_res = $poi_by_id->fetchObject();

        $poi_fk = $edit_poi->query("DELETE FROM images WHERE poi_fk='".$poi_id_res->id."'");

        foreach($edit_arr as $post_keys => $post_values)
        {
            if(preg_match("/image/", $post_keys))
            {
                // Save images
                $src = $edit_arr[$post_keys];
                $dest = "images/".basename($src);

                file_put_contents($dest, file_get_contents($src));

                $array_with_images['poi_fk'] = $poi_id_res->id;
                $array_with_images['src_local'] = $dest;
                $array_with_images['src_original'] = $edit_arr[$post_keys];

                // Send image source links to 'images' table
                $create_images = $send_images->create($array_with_images);
            }
            else
            {
                $poi_array[$post_keys] = $edit_arr[$post_keys];
            }
        }
        //update poi table
        $update_res = $edit_poi->update($poi_array, $id);
    }
    $row_count = $edit_poi->findAll()->rowCount();
	$edit_res = $edit_poi->find($id);
	$res = $edit_res->fetchObject();
	
	// get data from countries table
    $all_countries = $countries->findAll();
    $countries_res = $all_countries->fetchAll();	
	$country_by_id = $countries->query("SELECT * FROM countries WHERE id =".$res->country_fk."");
	$c_res = $country_by_id->fetchAll();

	// get data from locations table
	$locations_by_country_id = $locations->query("SELECT * FROM locations WHERE countries_fk =".$res->country_fk."");
	$locations_res = $locations_by_country_id->fetchAll();
	
	// get data from category_section table
	$category_sections = new CRUD('category_sections');
	$category_section_all = $category_sections->findAll();
	$category_section_res = $category_section_all->fetchAll();
	
	// Call recorded image links from database
	$images_src_original = $send_images->findAll();
	$images = $images_src_original->fetchAll();
	/*
	foreach($images as $imgs)
	{
		echo $imgs['src_original'];
	}*/
	//echo "<br/>";
	//echo $imgs['src_original'];
?>
    <div class="left">
        <form action="" method="post" id="edit_form">
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" class="input_style" size="40" value="<?php echo $res->title; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" class="input_style" size="40" value="<?php echo $res->email; ?>"></td>
            </tr>
			<tr>
				<td>Website</td>
				<td><input type="text" name="website" class="input_style" size="40" value="<?php echo $res->website; ?>"></td>
            </tr>
            <tr>
                <td>Telephone</td>
                <td><input type="text" name="telephone" class="input_style" size="40" value="<?php echo $res->title; ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="address" class="textarea_style" rows="5" cols="32"><?php echo $res->address; ?></textarea></td>
            </tr>
            <tr>
                <td>Biography</td>
                <td><textarea name="biography" class="textarea_style" rows="5" cols="32"><?php echo $res->biography; ?></textarea></td>
            </tr>
            <tr>
                <td>Coords</td>
                <td><input type="text" name="coords" class="input_style" size="40" value="<?php echo $res->latitude.', '.$res->longitude; ?>"></td>
            </tr>
            <tr>
                <td>Admission</td>
                <td>
                    <select name="admission" class="dropdown_style">
                        <?php if($res->admission == 1){ ?>
                            <option value="1" selected="selected">Yes</option>
                            <option value="0" >No</option>
                        <?php } else{ ?>
                            <option value="1">Yes</option>
                            <option value="0" selected="selected">No</option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Category</td>
				<td>
                    <select name="category_fk" id="category_select" class="dropdown_style">							
                        <?php foreach($category_section_res as $cats){ ?>
                            <option value="<?php echo $cats['id']; ?>" class="single_country" id="<?php echo $cats['id']; ?>" <?php if($cats['id'] == $res->category_fk) echo "selected"; ?>>
								<?php echo $cats['title']; ?>
							</option>
                        <?php } ?>
                    </select>
                    <div class="message"></div>
                </td>
            </tr>
            <tr>
                <td>Country</td>
                <td>
                    <select name="country_fk" id="country_select" class="dropdown_style">							
                        <?php foreach($countries_res as $country){ ?>
                            <option value="<?php echo $country['id']; ?>" class="single_country" id="<?php echo $country['id']; ?>" <?php if($country['id'] == $res->country_fk) echo "selected"; ?>>
								<?php echo $country['title']; ?>
							</option>
                        <?php } ?>
                    </select>
                    <div class="message"></div>
                </td>
            </tr>
            <tr>
                <td>City</td>
                <td id="city_select">
                    <select name="location_fk"  id="locations_select" class="dropdown_style">
                        <?php foreach($locations_res as $location){ ?>
                            <option value="<?php  echo $location['id']; ?>" class="selected" id="<?php  echo $location['id']; ?>" <?php if($location['id'] == $res->location_fk) echo "selected"; ?>>
                                <?php  echo $location['title']; ?>
                            </option>
                        <?php  } ?>
                    </select>
                </td>
            </tr>
        </table>
    </div><!--left-->
    <div class="right">
        <div class="top-buttons">
            <button type="button" id= "call_bio" class="call_bio" value="1">Bio</button>
            <button type="button" id="call_images" class="call_image">Images</button>
            <button type="button" id="call_map" class="call_map">Map</button>
        </div>
        <!-- iFrame -->
        <div class="image-panel">
            <div class="call_iframe_div" id="call_iframe_div">
                <iframe id="iframe_div" class="iframe_div" src="<?php echo $res->website; ?>">
                    <p>Your browser does not support iframes.</p>
                </iframe>
            </div><!-- end of iFrame -->
            <div id="call_images_div" class="images_div">
                <?php
					$website_url = $res->website;
                    $data = file_get_contents($website_url);

                    // to filter <img> tags from website's content
                    preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i',$data, $imgTags);

                    foreach($imgTags[1] as $value)
                    {
                        if (!preg_match("|http:|", $value))  // to check the existence of relative path
                        {
                            $value = $website_url.$value;
                        }

                        @$img_size = getimagesize($value);  // to get the size of image
                        if(is_array($img_size))
                        {
                            $links_and_sum[$value] = ($img_size[0] + $img_size[1]);
                        }
                    }
                    // to sort array values
                    arsort($links_and_sum);
                    // to leave first 10 elements of an array
                    $links_and_sum = array_slice($links_and_sum, 0, 9);
                    $checkbox_id = 0;
					//echo "<pre>";
					//print_r($links_and_sum);
					//echo "</pre>";
					$checked = false;
                    foreach($links_and_sum as $image_link => $image_size)
                    {
						foreach($images as $imgs)
						{
							if($image_link == $imgs['src_original'])
							{
								$checked = true;
								
							}							
						}	
						
						if($checked)
						{
							echo "<img src=".$image_link." class='sorted_images' alt='images'/><br/>";
							echo "<input type='checkbox' name='image".$checkbox_id++."' class='iframe_checkbox' value=".$image_link." checked/>";
							echo "<span class='sorted_images_title'>Selected</span><br/>"; 
						}		
						else
						{
							echo "<img src=".$image_link." alt='images'/><br/>";
							echo "<input type='checkbox' name='image".$checkbox_id++."' class='iframe_checkbox' value=".$image_link." />";
							echo "<span class='sorted_images_title'>Ignored</span><br/>";
						}	
										
                    }
                ?>
            </div> 

            <div id="call_map_div" class="call_map_div map_div">
                <div id="googleMap" class="call_google_map_div" style="width:100%; height:100%;"></div>
            </div>
        </div><!--image-panel-->
			<div class="bottom-buttons">
                <a href="<?php echo "?id=".($id-1); ?>"><button type="button">Previous</button></a>
				<span><?php echo $id; ?>/ <?php  echo $row_count; ?></span>
                <a href="<?php echo "?id=".($id+1); ?>"><button type="button">Next</button></a>
				<input type="submit" id="submit" value="Save >>">
			</div>
        </form>
    </div><!--right-->
</div><!--content-->
<?php $latitude =  $res->latitude; $longitude = $res->longitude; ?>
<script>
    var myCenter=new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>);
    function initialize()
    {
        var mapProp = {
            center:myCenter,
            zoom:4,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        var marker=new google.maps.Marker({
            position:myCenter,
        });

        marker.setMap(map);
    }

    // get country id from dropdown list
    $( "#country_select" ).change(function () {
            country_id = $( this ).val(); // get country id from dropdown list
            send_countryid(country_id);
        })

    function send_countryid(country_id)
    {
        $.ajax({
            type: 'GET',
            crossDomain: true,
            url: 'http://localhost/poi/locations.php?id=' + country_id,
            success: function(data){
                $('#city_select').html(data);
            }
        });
    }
    $("div#call_images_div").hide();
    $("div.call_map_div").hide();
    // Switch divs for "Bio", "Images" and "Map" buttons
    $("#call_bio").click(function () {    // click bio button
        $("div#call_iframe_div").show();
        $("div#call_images_div").hide();
        $("div.call_map_div").hide();
    });
    $("#call_images").click(function (){   // click images button
        $("div#call_images_div").show();
        $("div#call_iframe_div").hide();
        $("div.call_map_div").hide();
    });
    $("#call_map").click(function () {  // click map button
        $("div#call_images_div").hide();
        $("div#call_iframe_div").hide();
        $("div.call_map_div").show();
        initialize();
    });

    $("input:checkbox").change(function(){
        if(this.checked) {
            $("input:checkbox:checked + .sorted_images_title").html("Selected");
            $("input:checkbox:checked").prev().prev().addClass("sorted_images");
        }
        else
        {
            $("input:checkbox + .sorted_images_title").html("Ignored");
            $("input:checkbox").prev().prev().removeClass("sorted_images");
        }
    })
</script>
</body>
</html>