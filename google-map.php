<?php
include_once('core/CRUD.php');
$edit_poi = new CRUD('pois');
$id = $_GET['id'];

if(!empty($_POST)){

    $a = explode(', ', $_POST['coords']);

    $edit_arr = $_POST;
    unset($edit_arr['coords']);
    $edit_arr['latitude'] = $a[0];
    $edit_arr['longitude'] = $a[1];

    $update_res = $edit_poi->update($edit_arr, $id);
}
$row_count = $edit_poi->findAll()->rowCount();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>POI</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style.css">
    <style>
        .message {
            color: red;
        }
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
<header>
    scraper
    <div></div>
</header>
<div class="content">
    <h1>70% Complete []</h1>
<?php
$edit_res = $edit_poi->find($id);
$res = $edit_res->fetchObject();

// get data from countries table
$countries = new CRUD('countries');
$all_countries = $countries->findAll();
$countries_res = $all_countries->fetchAll();

// get datat from locations table
$locations = new CRUD('locations');
$locations_by_country_id = $locations->query("SELECT * FROM locations WHERE countries_fk = (SELECT MAX(countries_fk) AS countries_fk FROM locations )");
$locations_res = $locations_by_country_id->fetchAll();
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
            <td>Website</td>
            <td><input type="text" name="website" class="input_style" size="40" value="<?php echo $res->website; ?>"></td>
            </tr>
            <tr>
                <td>Telephone</td>
                <td><input type="text" name="telephone" class="input_style" size="40" value="<?php echo $res->title; ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea class="textarea_style" rows="5" cols="32"><?php echo $res->address; ?></textarea></td>
            </tr>
            <tr>
                <td>Biography</td>
                <td><textarea class="textarea_style" rows="5" cols="32"><?php echo $res->biography; ?></textarea></td>
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
                    <select class="dropdown_style">
                        <option value="category1">Category 1</option>
                        <option value="category2">Category 2</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Country</td>
                <td>
                    <select id="country_select" class="dropdown_style">
                        <?php foreach($countries_res as $country){ ?>
                            <option value="<?php echo $country['id']; ?>" class="single_country" id="<?php echo $country['id']; ?>"><?php echo $country['title']; ?></option>
                        <?php } ?>
                    </select>
                    <div class="message"></div>
                </td>
            </tr>
            <tr>
                <td>City</td>
                <td id="city_select">
                    <select class="dropdown_style">
                        <?php foreach($locations_res as $location){ ?>
                            <option value="<?php  echo $location['id']; ?>" class="selected" id="<?php  echo $location['id']; ?>">
                                <?php  echo $location['title']; ?>
                            </option>
                        <?php  } ?>
                    </select>
                </td>
            </tr>
        </table>
</div>
<?php
$latitude = "24.455872";
$longitude = "52.145678";
?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

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

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="top-buttons">
    <button type="button" id= "call_bio" class="call_bio" value =  "1">Bio</button>
    <button type="button" id="call_images" class="">Images</button>
    <button type="button" id="call_map" class="">Map</button>
</div>
<div class="call_iframe_div" id="call_iframe_div">
    <iframe id="" class="" src="http://www.bbc.co.uk/">
        <p>Your browser does not support iframes.</p>
    </iframe>
</div>
<div id="call_images_div" class="" style="display: none; background: yellowgreen; width: 766px; height: 464px; overflow: scroll;">
    <?php
    //$y = 'http://www.parapark.es/';
    $y = 'http://www.bbc.co.uk/';
    echo $y."<br/>";
    $data = file_get_contents($y);
    echo $y;
    preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i',$data, $imgTags);

    foreach($imgTags[1] as $value)
    {
        @$img_size = getimagesize($value);
        if(is_array($img_size))
        {
            $links_and_sum[$value] = ($img_size[0] + $img_size[1]);
        }

    }

    echo "<br/>";

    arsort($links_and_sum);

    foreach($links_and_sum as $image_link => $image_size)
    {
        echo "<img src=".$image_link." alt='images'><br/>";
        echo "<input type='checkbox' class='iframe_checkbox'>";
    }
    ?>
</div>
<div  class="call_map_div">
<div id="googleMap" style="width:500px;height:380px;"></div>
</div>
<script>
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
        $("div.call_map_div").show();
        $("div#call_images_div").hide();
        $("div#call_iframe_div").hide();
    });
</script>
</body>
</html>