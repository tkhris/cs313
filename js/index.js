$("#about-button").click(function(){
	$("#info").slideToggle();
	$("#arrow").toggleClass('fa fa-chevron-down fa fa-chevron-up');
});

$("#fa-pic").click(function(){
	$("img").slideToggle();
	$("#notice").hide();
});