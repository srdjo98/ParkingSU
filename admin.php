<?php

require_once('inc/header.php');
require_once('User.php');
require_once('Zone.php');

$user = new User();
$zone = new Zone();

?>

<div class="row ">
    <?php $Users = $user->getAllUsers(); ?>
    
            <table class="table table-striped  register">
                
            <thead class="col-12">
                <tr>
                <th scope="col"></th>
                <th scope="col">Id</th>
                <th scope="col">Ime</th>
                <th scope="col">Email</th>
                <th scope="col">Registracije 1</th>
                <th scope="col">Registracije 2</th>
                <th scope="col">Registracije 3</th>
                <th scope="col">Obrisi</th>
                
                
                </tr>
            </thead>
            <tbody class="col-12" id="tbody">
                    
            <?php foreach($Users as $key => $value ): ?>
                
                <tr >
                <th scope="row col-12" '></th>
               
                <td><?php print_r($value->id_user)?></td>
                <td><?php print_r($value->name)?></td>
                <td><?php print_r($value->email)?></td>
                <td><?php print_r($value->register_number)?><br><a href="registerNumberAdmin.php?register_number=<?php echo $value->register_number ?>" style="text-decoration:none"><button class="btn  btn-sm logbutton" >Podatci na osnovu tablica</button></a></td>
                <td><?php print_r($value->register_number1)?><br><a href="registerNumberAdmin.php?register_number=<?php echo $value->register_number1 ?>" style="text-decoration:none"><button class="btn  btn-sm logbutton" >Podatci na osnovu tablica</button></a></td>
                <td><?php print_r($value->register_number2)?><br><a href="registerNumberAdmin.php?register_number=<?php echo $value->register_number2 ?>" style="text-decoration:none"><button class="btn  btn-sm logbutton" >Podatci na osnovu tablica</button></a></td>
                <td><a href="deleteA.php?id=<?php echo $value->id_user ?>" style="text-decoration:none"><button class="btn  btn-sm btn-danger" >Obrisi</button></a></td>
                </th>
                </tr>
                
                
            <?php endforeach;  ?>
            
           
            </tbody>
           
            </table>

            
    </div>

    <div class="row">

        
        <?php $locations = $zone->getAllLocation(); ?>
        <table class="table table-striped  register">
                
                <thead class="col-12">
                    <tr>
                    <th scope="col"></th>
                
                    <th scope="col">Broj uplata</th>
                    <th scope="col">Lokacija</th>
                    <th scope="col">Sati</th>
                
                    
                    </tr>
                </thead>
                <tbody class="col-12" id="tbody">
                    
                <?php foreach($locations as $key => $value ): ?>
                    
                    <tr >
                    <th scope="row col-12" '></th>
                   
                    <td>
                    <?php $locationCount = $zone->locationCount($value->location);
                        echo $locationCount;
                    ?>
                    </td>

                    <td><?php echo $value->location; ?></td>
                    <td><a href="mapAdmin.php?location=<?php echo $value->location ?>" style="text-decoration:none"><button class="btn  btn-block logbutton" >Sati</button></a></td>

                    </th>
                    </tr>
                    
                   
                <?php endforeach;  ?>
                
                
                
          
                    
                
                ?>
               
                </tbody>
               
                </table>
    

    
    </div>
    
    <script>
    
    function  sendMonth(){

        $('select').change(function(){

        var month = $(this).children("option:selected").val();
        
        $.ajax({

            url:'monthAdmin.php',
            data:{month:month},
            type:'POST',
            success:function(data){

                console.log(data);
                $('#result').html(data);

            }


        });

                    
        });

        }


        $(document).ready(function () { 

            sendMonth();
    
        });
    
    </script>

    <div class="row">
    
    <div class="col-sm-12 col-md-6">
        <div style="text-align:center;width:100%; height:400px">
        
        

        <select class="form-control col-sm-12 col-xl-" id="exampleFormControlSelect1 " name="month" >
            
            <option value='0'>Izaberite mesec</option>
            <option value='1'>Januar</option>
            <option value='2'>Februar</option>
            <option value='3'>Mart</option>
            <option value='4'>April</option>
            <option value='5'>Maj</option>
            <option value='6'>Jun</option>
            <option value='7'>Jul</option>
            <option value='8'>Avgust</option>
            <option value='9'>Septembar</option>
            <option value='10'>Oktobar</option>
            <option value='11'>Novembar</option>
            <option value='12'>Decembar</option>

        </select>


        

        <div id="result">

        </div>


        </div>
    </div>
    
    </div>


    
















<?php

require_once('inc/header.php');


?>