<?php

$src = "http://media2.fcbarcelona.com/media/asset_publics/resources/000/087/224/size_349x196/2013-12-14_CAMPNOUMKT_VIC_6805_2.v1392633389.jpg";
$dest = "images/".basename($src);
echo basename($src);
file_put_contents($dest, file_get_contents($src));
