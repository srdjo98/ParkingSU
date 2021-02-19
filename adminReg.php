<?php

require_once('inc/header.php');
require_once('Zone.php');

if(isset($_SESSION['user_id'])){

    

}else{

    header('Location: index.php');

}

$zons = new Zone();

$register_number = $_GET['register_number'];


?>

      
<div class="row ">
    <?php $allZones = $zons->getAllByRegisterNumber($register_number); ?>
    
            <table class="table table-striped  register">
                
            <thead class="col-12">
                <tr>
                <th scope="col"></th>
                <th scope="col">Zona 1</th>
                <th scope="col">Zona 2</th>
                <th scope="col">Zona 3</th>
                <th scope="col">Zona 4</th>
                <th scope="col">Registarske tablice</th>
                <th scope="col">Mesto</th>
                <th scope="col">Pogledajte na mapi</th>
                <th scope="col">Poslato dana</th>
            
                
                </tr>
            </thead>
            <tbody class="col-12" id="tbody">
            
            <?php foreach($allZones as $key => $value ): ?>
                
                <tr >
                <th scope="row col-12" '></th>
                <input type="hidden" name="id" value="<?php echo $value->id_zone?>">
                <td><?php print_r($value->zona1)?></td>
                <td><?php print_r($value->zona2)?></td>
                <td><?php print_r($value->zona3)?></td>
                <td><?php print_r($value->zona4)?></td>
                <td><?php print_r($value->register_number)?><a href="regNumber.php?register_number=<?php echo $value->register_number ?>" style="text-decoration:none"><button class="btn  btn-block logbutton" >Podatci na osnovu tablica</button></a></td>
                <td><?php print_r($value->location)?></td>
                <td><a href="map.php?id=<?php echo $value->id_zone ?>" style="text-decoration:none"><button class="btn  btn-block logbutton" >Mapa</button></a></td>
                <td><?php print_r($value->sent_at)?></td>
                </th>
                </tr>
                
                
            <?php endforeach;  ?>
            
            
            </tbody>
           
            </table>

                
            <button class="btn  btn-block logbutton" style="margin-top:-20px" id="loadMore">Ucitajte jos</button>
    </div>


<?php

require_once ('inc/footer.php');

?>