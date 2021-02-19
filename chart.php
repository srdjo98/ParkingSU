<?php

require_once('inc/header.php');
require_once('Zone.php');

if(isset($_SESSION['user_id'])){

    

}else{

    header('Location: index.php');

}


$zons = new Zone();

$id = $_SESSION['user_id']  ;
$zonaVal = 1;

$_SESSION['err'] = 'prazno';

$zona1 = $zons->getZonaById('zona1',$zonaVal,$id);
$zona2 = $zons->getZonaById('zona2',$zonaVal,$id);
$zona3 = $zons->getZonaById('zona3',$zonaVal,$id);
$zona4 = $zons->getZonaById('zona4',$zonaVal,$id);

$zona1Cena = 38.89;
$zona2Cena = 29.47;
$zona3Cena = 82.10;
$zona4Cena = 20.42;






?>


<script>

    function loadChart1(){

        
        let myChart = document.getElementById('myChart').getContext('2d');
    
        let massPopChart = new Chart(myChart,{
            
            type:'pie',
            data:{
                labels:['Zona 1','Zona 2','Zona 3','Zona 4'],
                datasets:[{
                    label:'Parking Zone  ',
                    data:[
                        <?php echo $zona1 * $zona1Cena; ?>,
                        <?php echo $zona2 * $zona2Cena; ?>,
                        <?php echo $zona3 * $zona3Cena; ?>,
                        <?php echo $zona4 * $zona4Cena; ?>,
                    ],
                    backgroundColor:[
                        '#ff4d4d',
                        '#ffff4d',
                        '#5cd65c',
                        '#5c85d6'
                    
                    ]
                }],
            },
            options:{
                legend: {
                    onClick:function(e, legendItem){
                var index = legendItem.index;
                var ci = massPopChart;
                var meta = ci.getDatasetMeta(0);
                var CurrentalreadyHidden = (meta.data[index].hidden==null) ? false : (meta.data[index].hidden);
                var allShown=true;
                $.each(meta.data,function(ind0,val0){
                    if(meta.data[ind0].hidden){
                        allShown=false;
                        return false; 
                    }else{
                        allShown=true;
                    }
                });
                if(allShown){
                    $.each(meta.data,function(ind,val){
                        if(meta.data[ind]._index===index){
                            meta.data[ind].hidden=false;
                        }else{
                            meta.data[ind].hidden=true;
                        }
                    });
                }else{
                    if(CurrentalreadyHidden){
                        $.each(meta.data,function(ind,val){
                            if(meta.data[ind]._index===index){
                                meta.data[ind].hidden=false;
                            }else{
                                meta.data[ind].hidden=true;
                            }
                        });
                    }else{
                        $.each(meta.data,function(ind,val){
                            meta.data[ind].hidden=false;
                        }); 
                     }
                 }
                ci.update();

            }


                }


            },

        });

        

    }


    function  sendMonth(){

            $('select').change(function(){
            
            var month = $(this).children("option:selected").val();
              
            $.ajax({

                url:'month.php',
                data:{month:month},
                type:'POST',
                success:function(data){

                    console.log(data);
                    $('#result').html(data);

                }


            });

                        
        });

    }


    function loadMore(){


        var dataCount = 4;
        $('#loadMore').click(function () { 
            
            dataCount = dataCount + 4;
                
            $.ajax({

                url:'loadTable.php',
                data:{dataNewCount:dataCount},
                type:'POST',
    
                success:function(data){

                    console.log(data);
                    $('#tbody').html(data);

                }


            });

            
        });

t
    }


   

    

    $(document).ready(function () { 

        loadChart1();
        sendMonth();
        loadMore();
        
        
    });

    


</script>


<div class="container">

    
    <div class="row ">
    <?php $allZones = $zons->getAllById($id); ?>
    
            <table class="table table-striped  register">
                
            <thead class="col-12">
                <tr>
                <th scope="col"></th>
                <th scope="col">Zona  </th>
                <th scope="col">Zona Cena </th>
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
            
            
            </tbody>
           
            </table>

                
            <button class="btn  btn-block logbutton" style="margin-top:-20px" id="loadMore">Ucitajte jos</button>
    </div>
    
    
    





    <div class="row">
    <div class="col-sm-12 col-md-6">
        <div style="text-align:center">

        <h5>Godišnja potrošnja</h5>
        <small>Kliknite na zonu da bi videli samo njen prikaz</small>
        <canvas id="myChart"></canvas>
        <p>zona 1 = <?php echo $zona1Sum = $zona1 * $zona1Cena ?> din</p>
        <p>zona 2 = <?php echo $zona2Sum = $zona2 * $zona2Cena ?> din</p>
        <p>zona 3 = <?php echo $zona3Sum = $zona3 * $zona3Cena ?> din</p>
        <p>zona 4 = <?php echo $zona4Sum = $zona4 * $zona4Cena ?> din</p>
        <h6>Ukupno = <?php echo $zona1Sum + $zona2Sum + $zona3Sum + $zona4Sum ?> din</h6>

        </div>
    </div>
    

    <div class="col-sm-12 col-md-6">
        <div style="text-align:center">

        <select class="form-control col-sm-4 " id="exampleFormControlSelect1 " name="month" style="margin-left:177px">
            
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

require_once ('inc/footer.php');

?>