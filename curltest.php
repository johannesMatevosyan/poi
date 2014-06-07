<?php
$_url = 'http://www.liceubarcelona.cat/en.html';

//$data = file_get_contents('http://www.bbc.co.uk/');
$data = file_get_contents('http://palauguell.cat/');

preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i',$data, $imgTags);

//echo $data;
echo "<pre>";
print_r($imgTags[1]);
echo "<pre>";

echo "<br/>";

foreach($imgTags[1] as $value)
{

    echo "value: ".$value."<br/>";

    $img_size = getimagesize($value);

    echo "<br/>img_size: ";
    echo "<pre>";
    print_r($img_size)."<br/>";
    echo "</pre>";
    echo "end of img size: <br/>";

    if(is_array($img_size))
    {
        $links_and_sum[$value] = ($img_size[0] + $img_size[1]);
    }
    //echo "<p><img src=".$value." alt='images'></p>";
}
//print_r($img_size);
echo "<br/>";

arsort($links_and_sum);

foreach($links_and_sum as $image_link => $image_size)
{
    echo "<p><img src=".$image_link." alt='images'></p>";
    echo "<input type='checkbox' class='iframe_checkbox'>";
}
