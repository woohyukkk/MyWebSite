<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Video</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="./css/bootstrap.min.css" rel="stylesheet" >
        <link href="./css/layout3.css" rel="stylesheet" type="text/css">
        <link href="./css/colors3.css" rel="stylesheet" type="text/css">
		
    </head>
    <body >
        <div  style="height:54px;background-color:red; " >
		
		<ul class="nav nav-pills">
		<li > <a  href="index.php" id="home_link">Home</a> </li>
		<li >  <a  href="story.php" >Story</a> </li>
		<li class="active">  <a  href="video.php" >Video</a> </li>
		<li >  <a  href="slides.php">Gallery</a> </li>
		<li >  <a  href="list.php"  >List</a> </li>
		
		</ul>
		
		</div  >
        <div >
	    <!-- BANNER NEEDS TO BE SET -->
          <img alt="banner" class="banner img-responsive center-block" src="./images/banner1.png" style="width:500px;height:200px;" >
        
        </div>
        
     
        
        
        
        <div >
            <p>"Infinite in mystery is the gift of the Goddess<br>We seek it thus, and take to the sky<br>
                Ripples form on the water's surface<br>The wandering soul knows no rest."<br>                       - LOVELES</p>
            <video class="video center-block"  autoplay controls>
            <source src="./video/movie.mp4" type="video/mp4">
            <source src="./video/movie.ogg" type="video/ogg">
            
            
           
         </video>


        </div>
        
        <div id="Photo">
            
        </div>
        
        
        
    </body>
</html>
