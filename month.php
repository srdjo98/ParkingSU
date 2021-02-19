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
    $zonaVal = 1;
    
    
    $zona1M = $zons->getZonaByMonth('zona1',$month,$zonaVal,$id);
    $zona2M = $zons->getZonaByMonth('zona2',$month,$zonaVal,$id);
    $zona3M = $zons->getZonaByMonth('zona3',$month,$zonaVal,$id);
    $zona4M = $zons->getZonaByMonth('zona4',$month,$zonaVal,$id);
    
    

    if($zona1M == 0 && $zona2M == 0 && $zona3M == 0 && $zona4M == 0){

        $_SESSION['err'] = 'prazno';

    }else{

        
    }

}//! end of submit

?>
<script>

var popOut = document.querySelector('.popOut');
popOut.style.display = "none";

var div = document.querySelector('#result');

window.onclick = function(event) {
    
    if(event.target == div){

        popOut.style.display = "none";

    }
   
}

var p = document.querySelector('.zonaP');

function  loadChart2() { 

function getValue(value){

    

    if(value == 1){
        
        
        p.textContent = `zona 1 = <?php echo $zona1Sum = $zona1M * $zona1Cena ?> din`;
        popOut.style.display = "block";
        popOut.style.backgroundColor = "#ff4d4d";

    }

    if(value == 2){        
        
        p.textContent = `zona 2 = <?php echo $zona2Sum = $zona2M * $zona2Cena ?> din`;
        popOut.style.display = "block";
        popOut.style.backgroundColor = "#ffff4d";

    }

    if(value == 3){
       
        p.textContent = `zona 3 = <?php echo $zona3Sum = $zona3M * $zona3Cena ?> din`;
        popOut.style.display = "block";
        popOut.style.backgroundColor = "#5cd65c";

    }

    if(value == 4){

        p.textContent = `zona 4 = <?php echo $zona4Sum = $zona4M * $zona4Cena ?> di`;
        popOut.style.display = "block";
        popOut.style.backgroundColor = "#5c85d6";
        
    }
    
    

}


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

                getValue(legendItem.text[5]);

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


        <div class="popOut" style="background-color: #659dbd;width: 200px;border: 1px solid gray;border-radius: 5px;text-align: center;padding: 5px;margin-left:170px">
            <h3>Izabrana zona</h3>
            <p class="zonaP"></p>
        </div>

        

        <?php if(isset($_SESSION['err'])): ?>

        <h3>Nema Podataka</h3>

        <?php else: ?>
        

        <canvas id="myChart2"></canvas>
        
        <div id="sumMonth">
        <p>zona 1 = <?php echo $zona1Sum = $zona1M * $zona1Cena ?> din</p>
        <p>zona 2 = <?php echo $zona2Sum = $zona2M * $zona2Cena ?> din</p>
        <p>zona 3 = <?php echo $zona3Sum = $zona3M * $zona3Cena ?> din</p>
        <p>zona 4 = <?php echo $zona4Sum = $zona4M * $zona4Cena ?> din</p>
        <h6>Ukupno = <?php echo $zona1Sum + $zona2Sum + $zona3Sum + $zona4Sum ?> din</h6>
        </div>

        <?php endif; ?>

        

<script>




</script>

