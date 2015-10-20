var pie1,pie2,pie3,pie4;
var open_overlay_id = null;
function set_pies()
{	
	pie1 = document.getElementById("pie1");
	pie2 = document.getElementById("pie2");
	pie3 = document.getElementById("pie3");
	pie4 = document.getElementById("pie4");
	overlay_rr = document.getElementById("overlay");
	fade = document.getElementById("background_fade");
}
function set_default_position()
{
	pie1.style.left="0px";
	pie2.style.left="250px";
	pie3.style.left="250px";
	pie4.style.left="0px";
}


function move_pies()
{
	pie1.style.left="-200px";
	pie2.style.left="450px";
	pie3.style.left="450px";
	pie4.style.left="-200px";
		
}

function fade_screen(unfade)
{
	if(unfade==0)
	{
		fade.style.display="block";
		
	}
	else
	{
		
		fade.style.display="none";
	}
}
function onclick_pie1()
{
	move_pies();
	fade_screen(0);
	var overlay = document.getElementById("overlay_about");
	open_overlay_id = overlay;
	overlay.style.display="block";
	
}
function onclick_pie2()
{
	move_pies();
	fade_screen(0);
	var overlay = document.getElementById("overlay_rr");
	open_overlay_id = overlay;
	overlay.style.display="block";
	
}
function onclick_pie3()
{
	move_pies();
	fade_screen(0);
	var overlay = document.getElementById("overlay_upload");
	open_overlay_id = overlay;
	overlay.style.display="block";
	
}
function onclick_pie4()
{
	move_pies();
	fade_screen(0);
	var overlay = document.getElementById("overlay_jc");
	open_overlay_id = overlay;
	overlay.style.display="block";
	
}
/*
function pie1_close_overlay()
{
	set_default_position();
	var overlay = document.getElementById("overlay_rr");
	
	overlay.style.display="none";
	fade_screen(1);
}
function pie2_close_overlay()
{
	set_default_position();
	var overlay = document.getElementById("overlay_upload");


	overlay.style.display="none";
	fade_screen(1);
}
function pie3_close_overlay()
{
	set_default_position();
	var overlay = document.getElementById("overlay_jc");


	overlay.style.display="none";
	fade_screen(1);
}
function pie4_close_overlay()
{
	set_default_position();
	var overlay = document.getElementById("overlay_about");


	overlay.style.display="none";
	fade_screen(1);
}*/
function close_overlay()
{
	if(open_overlay_id != null)
	{
		set_default_position();
		open_overlay_id.style.display="none";
		fade_screen(1);
		open_overlay_id = null;
	}
	
}

