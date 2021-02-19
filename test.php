<?php

require_once('inc/header.php');
require_once('Zone.php');


?>

<script>

    
    $(document).ready(function () { 

        let myChart = document.getElementById('myChart').getContext('2d');
    
        let massPopChart = new Chart(myChart,{

            type:'pie',
            data:{
                labels:['Zona 1','Zona 2','Zona 3','Zona 4'],
                datasets:[{
                    label:'Parking Zone  ',
                    data:[
                        <?php echo $zona1 ?>,
                        <?php echo $zona2; ?>,
                        <?php echo $zona3; ?>,
                        <?php echo $zona4; ?>,
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

            }

            },

        });


        $('select').change(function(){
        
            var month = $(this).children("option:selected").val();
            
            
            
            $.ajax({

                url:'chart.php',
                data:{month:month},
                type:'POST',
                success:function(data){

                    console.log(data);

                }


            });

                        
        });


        let myChart2 = document.getElementById('myChart2').getContext('2d');
        
        let massPopChart2 = new Chart(myChart2,{

            type:'pie',
            data:{
                labels:['Zona 1','Zona 2','Zona 3','Zona 4'],
                datasets:[{
                    label:'Parking Zone',
                    data:[
                        <?php echo $zona1M ?>,
                        <?php echo $zona2M; ?>,
                        <?php echo $zona3M; ?>,
                        <?php echo $zona4M; ?>,
                    ],
                    backgroundColor:[
                        '#ff4d4d',
                        '#ffff4d',
                        '#5cd65c',
                        '#5c85d6'
                    
                    ]
                }],
            },
            options:{},

        });
    

    });
        

</script>