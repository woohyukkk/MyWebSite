<!DOCTYPE HTML>  
<html>
<head> <link href="./css/bootstrap.min.css" rel="stylesheet" > <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>


<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo $details->city; // -> "Mountain View"
//print_r($details);

$country=$details->country;
$region=$details->region;
//$weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=419de9dc131865161b56b0e42a2f8394"));

$api_1 = 'https://ipapi.co/' . $ip . '/latlong/';
$location = file_get_contents($api_1);
$point = explode(",", $location);


$api_2 = 'http://api.openweathermap.org/data/2.5/weather?lat=' . $point[0] . '&lon=' . $point[1] . '&appid=419de9dc131865161b56b0e42a2f8394';
$data = json_decode(file_get_contents($api_2),true);



//Get current Temperature in Celsius
echo $data['main']['temp']."<br>";
//Get weather condition
$icon=$data['weather'][0]['icon'];
echo $icon."<br>";

//Get cloud percentage
echo $data['clouds']['all']."<br>";
//Get wind speed
echo $data['wind']['speed']."<br>";
?>
<img src="http://openweathermap.org/img/w/<?php echo $icon;?>.png"   alt="some_text" >
</body>
</html>