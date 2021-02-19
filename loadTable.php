<?php 
session_start();
require_once('Zone.php');

$dataNewCount = $_POST['dataNewCount'];
$id = $_SESSION['user_id'];

$zona1Cena = 38.89;
$zona2Cena = 29.47;
$zona3Cena = 82.10;
$zona4Cena = 20.42;


$zons = new Zone();

?>

<?php $allZones = $zons->getAllById($id,$dataNewCount); ?>
<?php foreach($allZones as $key => $value ): ?>
                
                <tr >
                <th scope="row col-12" '></th>
                
                    <td><?php if($value->zona1 == 1){

                    echo 'Crvena';

                    }elseif($value->zona2 == 1){

                    echo 'Zuta';

                    }elseif($value->zona3 == 1){

                    echo 'Zelena';

                    }elseif($value->zona4 == 1){

                    echo 'Plava';

                    }

                    ?></td>
                    <td><?php if($value->zona1 == 1){

                    echo($value->zona1) * $zona1Cena . ' dinara';

                    }elseif($value->zona2 == 1){

                    echo($value->zona2) * $zona2Cena . ' dinara';

                    }elseif($value->zona3 == 1){

                    echo($value->zona3) * $zona3Cena . ' dinara';

                    }elseif($value->zona4 == 1){

                    echo($value->zona4) * $zona4Cena . ' dinara';

                    }

                    ?></td>
                <td><?php print_r($value->register_number)?><a href="regNumber.php?register_number=<?php echo $value->register_number ?>" style="text-decoration:none"><button class="btn  btn-block logbutton" >Podatci na osnovu tablica</button></a></td>
                <td><?php print_r($value->location)?></td>
                <td><a href="map.php?id=<?php echo $value->id_zone ?>" style="text-decoration:none"><button class="btn  btn-block logbutton" >Mapa</button></a></td>
                <td><?php $date = strtotime($value->sent_at); echo date('d-m-Y h:i:s',$date); ?></td>
                </th>
                </tr>
               
            <?php endforeach;  ?>
            
    

