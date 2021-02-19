<?php

require_once('inc/header.php');
require_once('User.php');
require_once('Zone.php');


$numb = new Zone;


$registerNumber = $_GET['register_number'];

$zona1Cena = 38.89;
$zona2Cena = 29.47;
$zona3Cena = 82.10;
$zona4Cena = 20.42;


?>

<div class="row ">
    <?php $numberReg =$numb->getAllByRegisterNumber($registerNumber); ?>
    
            <table class="table table-striped  register">
                
            <thead class="col-12">
                <tr>
                <th scope="col"></th>
                <th scope="col">Zona</th>
                <th scope="col">Zona Cena</th>
                <th scope="col">Poslato dana</th>
                
            
                
                </tr>
            </thead>
            <tbody class="col-12" id="tbody">
            
            <?php foreach($numberReg as $key => $value ): ?>
                
                <tr >
                <th scope="row col-12" '></th>
                <input type="hidden" name="id" value="<?php echo $value->id_zone?>">
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

                    $zona1val = ($value->zona1) * $zona1Cena ;
                    echo $zona1val . ' dinara';

                }elseif($value->zona2 == 1){

                    $zona2val = ($value->zona2) * $zona2Cena ;
                    echo $zona2val . ' dinara';

                }elseif($value->zona3 == 1){

                    $zona3val = ($value->zona3) * $zona3Cena ;
                    echo $zona3val . ' dinara';

                }elseif($value->zona4 == 1){

                    $zona4val = ($value->zona4) * $zona4Cena ;
                    echo $zona4val . ' dinara';

                }

                ?></td>
              
                <td><?php $date = strtotime($value->sent_at); echo date('d-m-Y h:i:s',$date); ?></td>
                
                </th>
                </tr>
                
                
            <?php endforeach;  ?>
            
            </tbody>
           
            </table>

                
    </div>