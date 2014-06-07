<?php
    include_once('core/CRUD.php');
    $id = $_GET['id'];
    $locations = new CRUD('locations');
    $locations_by_country_id = $locations->query("SELECT * FROM locations WHERE countries_fk =".$id);
    $locations_res = $locations_by_country_id->fetchAll();
?>
<select name="location_fk" id="location_select" class="dropdown_style">
	<?php foreach($locations_res as $location){ ?>
		<option value="<?php  echo $location['id']; ?>" class="selected" id="<?php  echo $location['id']; ?>"><?php  echo $location['title']; ?></option>
	<?php } ?>
</select>
