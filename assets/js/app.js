jQuery(document).ready(function($) {

	$(document).foundation();

	jQuery("img.change").click(function(){
		
		//console.log("Clicked:" + $(this).attr("data-change"));
		$("#"+$(this).attr("data-change")).html($(this).clone().removeClass("change"));

		//Scroll to the image (mainly for small screens)
		var topPos = $("#"+$(this).attr("data-change")).offset();
		window.scrollTo(0, topPos.top);
	});
});
