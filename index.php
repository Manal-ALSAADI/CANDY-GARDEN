<?php include("header.php"); ?>




    
    <section id="banner">
        <div class="wrapper">
            <h1 class="animated zoomInDown">CANDY GARDEN</h1>
            <h2>Welcome</h2>
            <br>
            <p><a href="#about" class="button">Read more &raquo;</a></p>
        </div>
    </section>

    <section id="info-social"> 
        <div class="wrapper">
            <span><i class="fa fa-lg fa-phone"></i>&nbsp;&nbsp;0555555558</span>
            <span><i class="fa fa-lg fa-envelope-o"></i>&nbsp;&nbsp;email@gmail.com</span>
          

        </div>
       </section>
  
    <section id="product">
        <div class="wrapper">
            <h2>Pancakes & Cupcakes </h2>
            <?php viewProduct('SELECT * FROM product where categoryid=1'); ?>
    </div>
    </section>
         
    <article id="banner-two">
        <img src="img/na.png" width="100" height="100"  alt="LOGO"/>
        <h2>Enjoy cheesecake</h2>
    
    </article>
    
    
    <section id="product">
    <div class="wrapper">
    <h2>Enjoy cheesecake</h2>
    <?php viewProduct('SELECT * FROM product where categoryid=2'); ?>  	
    </section>


    
    <div id="info-social">
        <div class="wrapper">
            <span><i class="fa fa-lg fa-phone"></i>&nbsp;&nbsp;011.22.555.333</span>
            <span><i class="fa fa-lg fa-envelope-o"></i>&nbsp;&nbsp;email@gmail.com</span>
        </div>
    </div>



    <section id="about-CANDYGARDEN"><div id="about"></div>
    <div class="wrapper">
        <article class="CANDYGARDEN">
            <h3>About CANDY GARDEN</h3>
            <img src="img/na.png" width="100" height="100"  alt="LOGO"/>
            <p>Sweets are all that is treated with sugar or honey from food,
			and everything that is made from a solution of sugar in water.
			By adding flavors and dyes, it is a type of food that consists mainly of sugar
			And the sugary sweets were made in many colors and varieties,
			and it has a long history in popular culture,
			as it indicates some peoples, such as the ancient French people.</p>    
        </article>

        <article class="CANDYGARDEN-pic">
            <img src="https://5zznly.com/d/3REql_SHOP.jpeg" alt="CANDYG ARDEN">
        </article>
    </div>
    </section>

    <footer id="footer">
	   <div class="wrapper">
        
            <p><a href="#top" class="button">Back to top</a></p>
            <br>
           

        </div>
    </footer>

<section id="Reservation">

<div class="phone-canvas">
  <div class="top-bar">
    <a href="#" class="top-bar__back"><i class="ion-ios-arrow-back"></i></a>
    <a href="#" class="top-bar__search"><i class="ion-ios-search"></i></a>
  </div>
	<div class="header-img">
</div>
 
 <form method="post">
  <h2 class="heading">CANDY GARDEN</h2>
  <div class="table-count">
    <p class="table-count__label">Table For</p>
  
    <select class="t_code" name="t_code">
    <option value="0">Select a table code</option>
      <option value="100">100</option>
      <option value="200">200</option>
      <option value="300">300</option>
      <option value="400">400</option>
      <option value="500">500</option>
    </select>
    <div class="input-number">
          <input class="input-number__input" placeholder="number of people" name="p_number" type="number" maxlength="10"/>
        </div>
  </div>
     <div class="date-title">
       <p>pick a date &amp; time<p>
    </div>
    <div class="date-picker">
      <input type="date" placeholder="mm/dd/yyyy" name="d_request" style="text-align:center;">
      <input type="time" placeholder="00:00" name="t_request"/>
    </div>
		<div class="date-picker">
		
		<input  type="text" placeholder="Name" name="name">
	   </div>
		<br><br>
			<div class="date-picker">
			<input type="email" placeholder="MR@gmail.com" name="email">
			 </div>
    <div class="submit-btn">
      <button type="submit" name="submit1">Confirm</button>
    </div>
</form>
  <?php  
   if(isset($_POST["submit1"])){
      $t_code =$_POST['t_code'] ;
      $p_number =$_POST['p_number'];
      $t_request=$_POST['t_request'];
      $d_request=$_POST['d_request'];
      $name=$_POST['name'];
      $email=$_POST['email'];
      if($t_code =="0" || $t_code =="" || $name ==""|| $email =="" || $d_request =="" || $t_request =="")
      echo 'Pleae fill all fields !!!';
      else
    createRequest($p_number,$t_request,$d_request,$name,$email,$t_code);
   }
  
  ?>
  
</div>
 

</section>
    <section id="map">
            
            <iframe   
            src="https://maps.google.com/maps?q=%D9%88%D8%A7%D9%81%D9%84%20%D9%88%D8%A7%D9%83%D8%AB%D8%B1&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://embedgooglemap.net/136/">was</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas
            
             
    </section>



<?php include("footer.php"); ?>