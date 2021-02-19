<?php 

session_start();
require_once('Zone.php');

$_SESSION['err'] = 'prazno';
$zons = new Zone();

$id = $_SESSION['user_id'];
$month = $_POST['month'];


$zona1Cena = 38.89;
$zona2Cena = 29.47;
$zona3Cena = 82.10;
$zona4Cena = 20.42;


if(!empty($month) && $month > 0){

    unset($_SESSION['err']);

    $month = $_POST['month'];
    $id = $_SESSION['user_id'];
    $register_number = $_SESSION['register_number'];
    $zonaVal = 1;
    
    
    $zona1M = $zons->getZonaByMonthAndReg('zona1',$month,$zonaVal,$register_number);
    $zona2M = $zons->getZonaByMonthAndReg('zona2',$month,$zonaVal,$register_number);
    $zona3M = $zons->getZonaByMonthAndReg('zona3',$month,$zonaVal,$register_number);
    $zona4M = $zons->getZonaByMonthAndReg('zona4',$month,$zonaVal,$register_number);
    
    

    if($zona1M == 0 && $zona2M == 0 && $zona3M == 0 && $zona4M == 0){

        $_SESSION['err'] = 'Nema podataka';

    }else{

        
    }

}//! end of submit

?>
<script>


function  loadChart2() { 

let myCharts2 = document.getElementById('myChart2').getContext('2d');

let massPopChart2 = new Chart(myCharts2,{
    
    type:'pie',
    data:{
        labels:['Zona 1','Zona 2','Zona 3','Zona 4'],
        datasets:[{
            label:'Parking Zone',
            data:[
                <?php echo $zona1M * $zona1Cena ?> ,
                <?php echo $zona2M * $zona2Cena ?>  ,
                <?php echo $zona3M * $zona3Cena ?>  ,
                <?php echo $zona4M * $zona4Cena ?>,
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

        legend: {onClick:function(e, legendItem){
                var index = legendItem.index;
                var ci = this.chart;
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

            }}

    },

});



}

$(document).ready(function () {

    loadChart2();
  });

</script>




        <?php if(isset($_SESSION['err'])): ?>

        <h4>Nema Podataka</h4>

        <?php else: ?>
        

        <canvas id="myChart2"></canvas>

        <p>zona 1 = <?php echo $zona1Sum = $zona1M * $zona1Cena ?> din</p>
        <p>zona 2 = <?php echo $zona2Sum = $zona2M * $zona2Cena ?> din</p>
        <p>zona 3 = <?php echo $zona3Sum = $zona3M * $zona3Cena ?> din</p>
        <p>zona 4 = <?php echo $zona4Sum = $zona4M * $zona4Cena ?> din</p>
        <h6>Ukupno = <?php echo $zona1Sum + $zona2Sum + $zona3Sum + $zona4Sum ?> din</h6>

        <?php endif; ?>

      


