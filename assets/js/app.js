jQuery(document).ready(function($) {

	$(document).foundation();

	jQuery("img.change").click(function(){
		console.log("Clicked:" + $(this).attr("data-change"));
		
		$("#"+$(this).attr("data-change")).html($(this).clone().removeClass("change"));
	});
});
