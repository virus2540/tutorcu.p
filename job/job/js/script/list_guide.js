jQuery.noConflict();
jQuery(document).ready(function(){ 
	
	jQuery(".switch_list").click(function(){
	  	jQuery("#listgrid ul").removeClass("display thumb_view");
		jQuery("#listgrid ul").addClass("display");
		jQuery(".mapview").fadeOut("fast");
		jQuery("#listgrid").fadeIn("fast");
		jQuery(".switch_list").addClass("active");
		jQuery(".switch_grid").removeClass("active");
		jQuery(".switch_map").removeClass("active");
		jQuery("#listpagi").show();
		jQuery("ul.display").fadeOut("fast", function() {
			jQuery(this).fadeIn("fast").removeClass("thumb_view");
		 });
		jQuery.cookie("display_view", "list");
	});

	jQuery(".switch_grid").click(function(){
	    jQuery("#listgrid ul").removeClass("display");
		jQuery("#listgrid ul").addClass("display thumb_view");
		jQuery(".mapview").fadeOut("fast");
		jQuery("#listgrid").fadeIn("fast");
		jQuery(".switch_grid").addClass("active");
		jQuery(".switch_list").removeClass("active");
		jQuery(".switch_map").removeClass("active");
		jQuery("#listpagi").show();
		jQuery("ul.display").fadeOut("fast", function() {
			jQuery(this).fadeIn("fast").addClass("thumb_view"); 
		});
		jQuery.cookie("display_view", "grid");
	});

	jQuery(".switch_map").click(function(){
		jQuery("#listgrid").fadeOut("fast");
		jQuery(".mapview").fadeIn("slow",function(){
			jQuery(".mapview").css("visibility","visible");
			jQuery(".mapview").css("height","auto");
		});
		jQuery(".switch_map").addClass("active");
		jQuery(".switch_grid").removeClass("active");
		jQuery(".switch_list").removeClass("active");
		jQuery("#listpagi").hide();
		jQuery.cookie("display_view", "map");		
	});
})