<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Gellery</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="./css/bootstrap.min.css" rel="stylesheet" >
        <link href="./css/layout4.css" rel="stylesheet" type="text/css">
        <link href="./css/colors4.css" rel="stylesheet" type="text/css">
        <script src="./js/Slideshow.js"></script> 
    </head>
    <body>
       
        <div >
	    <!-- BANNER NEEDS TO BE SET -->
           <img alt="banner" class="banner img-responsive center-block" src="./images/banner1.png" style="width:500px;height:200px;"></a>
        
        </div>
        
        <div id="navbar" style="height:55px;" >
		
		<ul class="nav nav-pills">
		<li > <a  href="index.php" id="home_link">Home</a> </li>
		<li >  <a  href="story.php" >Story</a> </li>
		<li >  <a  href="video.php" >Video</a> </li>
		<li class="active">  <a  href="slides.php">Gallery</a> </li>
		<li >  <a  href="list.php"  >List</a> </li>
		
		</ul>
        
        
        
        <div  >
            
        
            <div >
            
			<h1>Memories </h1>
			
			
			
            <img alt="show"   id="img"   class="img-reponsive center-block img-rounded" src="img/0.jpg"  style="padding:10px;" >
            </div>

            <h2 id="cap">  </h2>
            <script>
            document.getElementById("cap").innerHTML =caption[0]; 
            </script>


            <div  class="text-center">
                    
                    <button  type="button"

                    onClick="photo(-1)" >
                    < </button>
					<button  type="button"
                    onClick="play()" id="play_btn" class=" text-center">
                    Play</button>
                    <button type="button"
                    onClick="photo(1)" >
                    > </button>
            </div>
        
        
        
      
        </div>
        
        
    </body>
</html>
