<?php

    include_once('core/CRUD.php');

    $id = $_GET['id'];

?>
<div class="content">
<br/>
<center>
    <?php

		$locations = new CRUD('locations');
        $b = $locations->query("SELECT * FROM locations WHERE countries_fk =".$id);

        $b = $b->fetchAll();
        print_r($b);

    ?>
    <div class="left">
        <form action="" method="post" id="edit_form">
        <table>
            <tr>          
                <td>                   
                        <?php foreach($locations_res as $location){ ?>
							
								<?php //echo $location->title; ?><br/>
							
                        <?php } ?>               
                </td>
            </tr>        
        </table>
    </div>
</center>	
</div>

</body>
</html>
