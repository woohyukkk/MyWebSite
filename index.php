<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
<style>
.error {color: #FF0000;}
</style>
        <title>Home</title>
        <meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./css/bootstrap.min.css" rel="stylesheet" >
        <link href="./css/layout.css" rel="stylesheet" type="text/css">
        <link href="./css/colors.css" rel="stylesheet" type="text/css">
	
	<script>
		$(document).ready(function(){
                 	 $("h1").fadeIn(3000);
        		 $("img").fadeIn(9000);
			$('#myModal').on('show.bs.modal',function(){
				$("h1").hide();

				 $("h1").fadeIn(5000);


				});
   
			});
	</script>

	
    </head>
    <body>
  <?php
$servername = "localhost";
$username = "admin";
$password = "******";
$dbname = "WebDB";

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
$msg="Message Unsend";
$state="warning";
$check=0;

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT count FROM countTB";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$row = $result->fetch_assoc();
	$n=$row[count];
	$n++;
	//echo "Welcome! You are the NO.".$row[count]. " visiter. <br>"  ;

} else {
    echo "0 results";
}

$sql = "UPDATE countTB SET count=$n WHERE id=1";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $conn->error;
}



$user_agent     =   $_SERVER['HTTP_USER_AGENT'];


$ip=get_client_ip();
$icon=getWeather();
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$location= $details->country."-".$details->region."-".$details->city;
$user_os        =   getOS();
$user_browser   =   getBrowser();

$sql = "insert into visitors(ip,browser,platform,location)
	values('$ip','$user_browser','$user_os','$location')";

if ($conn->query($sql) === TRUE) {
    


} else {
    
}


$conn->close();

function get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
    
    return 'Other';
}
//////////////







/////////////
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


?>
 <?php


function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Mobile Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}
function getWeather($ip){
$api_1 = 'https://ipapi.co/' . $ip . '/latlong/';
$location = file_get_contents($api_1);
$point = explode(",", $location);


$api_2 = 'http://api.openweathermap.org/data/2.5/weather?lat=' . $point[0] . '&lon=' . $point[1] . '&appid=419de9dc131865161b56b0e42a2f8394';
$data = json_decode(file_get_contents($api_2),true);

$icon=$data['weather'][0]['icon'];
return $icon;
}


//$device_details =   "<strong>Browser: </strong>".$user_browser."<br /><strong>Operating System: </strong>".$user_os."";

//print_r($device_details);

//echo("<br /><br /><br />".$_SERVER['HTTP_USER_AGENT']."");

?>  
<?php
// define variables and set to empty values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);$check++;
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);$check++;
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);$check++;
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
	
  if($check==3){
	save($name,$email,$comment);
	$state="success"; $msg= "Message Sent Successfully!";

	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function save($name,$email,$comment){
	

$servername = "localhost";
$username = "admin";
$password = "******";
$dbname = "WebDB";


// Create connection
	$conn = mysqli_connect($servername, $username, $password,$dbname);

	// Check connection
	if (!$conn) {
   	 die("Connection failed: " . mysqli_connect_error());
	}

$sql = "insert into messageInfo(Name,Email,Comment)
	values('$name','$email','$comment')";
$comment="";
if ($conn->query($sql) === TRUE) {
    $msg= "Message Sent Successfully!";



} else {
    $msg= "Error: " . $sql . "<br>" . $conn->error;echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();

}

?>



    <div  id="navbar1" class="navbar">
		<div class="container-fluid">
 
		<ul class="nav navbar-nav nav-pills navbar-fixed-top" >
		<img src="http://openweathermap.org/img/w/<?php echo $icon;?>.png"   alt="some_text"  style="float:right;width:70px;height:70px;">
		<li class="active"> <a  href="index.php" id="home_link">Home</a> </li>
		<li >  <a  href="story.php" >Story</a> </li>
		<li >  <a  href="video.php" >Video</a> </li>
		<li >  <a  href="slides.php">Gallery</a> </li>
		
		<li >  <a  id="msg" href="#myModal" data-toggle="modal" style= color:<?php if($state=="success"){echo "green";}else echo "black";?>;>@Msg Author</a> </li>
		</ul>
	     	<div class="nav navbar-nav navbar-fixed-bottom navbar-right" >
<audio autoplay controls >
  <source src="./sound/01-prelude.mp3" type="audio/ogg">
  <source src="./sound/01-prelude.mp3" type="audio/mpeg">
Not Support Audio
</audio>
      		    		</div>
		</div>
	   
    </div>


	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">

					<button class="close" data-dismiss="modal" ><span>&times</span></button>
				<h1 style=display:none; class="modal-title text-center">Leave Message</h1>
				</div>
			
				<div class="modal-body">
					

<form  class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text"  class="form-control" id="name" placeholder="Cloud Strife" style="width:100px;" name="name" value="<?php echo $name;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  Email: <input type="email"  class="form-control " style="width:200px;" name="email" placeholder="Cloud@7thHeaven.com" value="<?php echo $email;?>">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>
  
 <textarea id="comment" name="comment" rows="5" class="form-control input-lg" placeholder="You will be in memory......" style="width:100%;"><?php echo $comment;?></textarea>
<br>
<h4 type="text"   id="location"  name="location" style="color:black; text-align:right;"  >From:  <?php echo $location;?></h4>
 

  
<div class="modal-footer">
			
				
				Raven-Project
			<input type="<?php if($state!="success"){echo "submit";}else{echo "text";}?>" name="submit" value="<?php if($state!="success"){echo "submit";}else{echo "Thank You!";}?>" class="btn btn-default btn-lg" >


</div>				
				
<div class="alert alert-<?php echo $state ?> text-center">
  <strong><?php echo $msg;?></strong> 
</div>


				</div>
				
				
			</div>
			
		</div>
	</div>
        
	<div class="modal" id="myModal2">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button class="close" data-dismiss="modal" ><span>&times</span></button>
				<h1 style=display:none; class="modal-title text-center">Thank You</h1>
				</div>
							
				
			</div>
			
		</div>
	</div>
        <div id="banner">
		<!-- BANNER NEEDS TO BE SET -->
		<img class="img-rounded img-responsive center-block" src="./images/banner1.png" style="width:500px;height:200px;">
			
	</div>


			
			<div id="desc">
				<a href="#footer" class="text-center" > <h1 style=display:none;>Sephiroth</h1>  </a>
			<p class="text-center">I Will....never be a memory </p>
			<img href="#footer" style=display:none; alt="Home page" class="img-rounded img-responsive" src="./images/homePageImage.jpg">
			<a href="#navbar1" name="footer" class="text-center text-inline">   <p> <?php echo $email;?> Welcome! You are the NO. <?php echo "<strong style=color:red>$row[count]</strong>" ?> visitor. <br>Back to top</p>  </a>
        </div>



        <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
	

</script>
		
    </body>
</html>
