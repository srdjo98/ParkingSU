<?php 

require_once ('inc/header.php');


if(isset($_SESSION['user_id'])){
}else{

    header('Location: index.php');

}

?>


<div class="main-container ">
	      <div class="banner">
	          
	          <div class="row"> 
	              <div class="col-lg-6 banner-content ">
	                  <img src="img/rsz_1finito.jpg" class="img-fluid" alt="">
	              </div> 
	              <div class="col-lg-6 content">
	                <h1>Su Parking </h1>  
	                <h4>Besplatno i bez oglasa </h4>  
	                <p>Ova aplikacija je za plaćanje parkinga u Srbiji. Ima jednostavan i brz korisnički interfejs sa mogucnoscu pracenja vase potrosnje preko veb sajta , a istovremeno vam omogućava brzo plaćanje parkinga.</p>
	                <div class="butns col-xs-12" style="margin-top:-40px">
					<button style="margin-left: 0px;margin-top: 9px;" id="buttonT"  class="btn get-btn"><i class="fas fa-arrow-circle-down fa-2x" ></i>    <a href="app/Su_Parking1.apk" style="text-decoration:none;color:white;font-size:30px" download>Preuzmite</a>   </button>	                </div>
	              </div>    
	          </div>     
	      </div>  
	    </div> 



</div>

<script>

var button = document.querySelector('#buttonT');

       

button.addEventListener('click',function () { 

	var downIcon = document.querySelector('.fa-arrow-circle-down');

	downIcon.classList.add('downIcon');
	
	setTimeout(function(){ downIcon.classList.remove('downIcon'); }, 2999);



})




</script>

<?php 

require_once ('inc/footer.php');

?>