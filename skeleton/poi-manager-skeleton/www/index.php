<?php
$map_key = "";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>POI Manager</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">		
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>		
		<header>
    		<h1>POI Manager</h1>    	
		</header>
				 
		<form action="" method="post" id="edit_form">
			<div id="content">		 
				<div class="left">        		
        			<table>
            			<tr>
                			<td>Title</td>
                			<td><input type="text" name="title" class="input_style" size="40" value=""></td>
            			</tr>
            			<tr>
                			<td>Email</td>
                			<td><input type="text" name="email" class="input_style" size="40" value=""></td>
            			</tr>
						<tr>
							<td>Website</td>
							<td><input type="text" name="website" class="input_style" size="40" value=""></td>
			            </tr>
			            <tr>
			                <td>Telephone</td>
			                <td><input type="text" name="telephone" class="input_style" size="40" value=""></td>
			            </tr>
			            <tr>
			                <td>Address</td>
			                <td><textarea name="address" class="textarea_style" rows="5" cols="32"></textarea></td>
			            </tr>
			            <tr>
			                <td>Biography</td>
			                <td><textarea name="biography" class="textarea_style" rows="5" cols="32"></textarea></td>
			            </tr>
			            <tr>
			                <td>Coords</td>
			                <td><input type="text" name="coords" class="input_style" size="40" value=""></td>
			            </tr>
			            <tr>
			                <td>Admission</td>
			                <td>
			                    <select name="admission" class="dropdown_style">
			                        <option value="1" >Yes</option>
			                        <option value="0" >No</option>
			                        
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
			   	</div><!--right-->    	
			</div><!--content-->
		</form>
	
	
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?php echo $map_key; ?>&amp;sensor=false"></script>		
		<script type="text/javascript" src="js/lib/jquery-2.0.3.min.js"></script>   	
		<script type="text/javascript" src="js/app.js"></script>	
	</body>
</html>
