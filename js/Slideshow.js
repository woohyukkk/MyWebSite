var imageCount = 0;
var total =3;
var click = 0;
var inter;
var caption=["ENTER CAPTION","ENTER CAPTION"];

function photo(x) {
	var image = document.getElementById('img');
	imageCount = imageCount + x;
	
	if(imageCount >= total){imageCount = 0;}
	if(imageCount < 0){imageCount = total-1;}	
	
	image.src = "img/"+ imageCount  +".jpg";
	document.getElementById("cap").innerHTML =caption[imageCount]; 
	}
	


function play() {
	
	click=click+1;
	if(click%2==1){
	
		document.getElementById("play_btn").innerHTML ="Pause";
		
		inter=setInterval("photo(1)",3000);
		
		
	}
	else{
		clearInterval(inter);
		document.getElementById("play_btn").innerHTML ="Play";
		click=0;
	}
		
}	