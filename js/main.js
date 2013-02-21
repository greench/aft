$(document).ready(function(){
	/* Galeri */
		galeriisim='';
		$('#galeri .isimler a').click(function(e){
			jQuery.ajax('galeri.php',{
				data:{
					"id":$(e.target).attr("id"),
					"type":1
				},
				success:function(data, textStatus, jqXHR){
					$("#galerikutu").html(data);
					$('.galeriklasor a').bind({
						click: function(e){
							jQuery.ajax('galeri.php',{
								data:{
									"id":$(e.target).attr("id"),
									"kutu":$(e.target).attr("class"),
									"type":2
								},
								
								success:function(data, textStatus, jqXHR){
									$("#galerikutu").html(data);
									//$('#galerikutu a.zoom').fancyZoom({width:$(window).width()/100*60,scaleImg:true});
									$("#galerikutu a.zoom").fancybox({padding:20,cyclic:true,overlayOpacity:0.4});
								}
						})
					}});
				}
			})
		});
	/* İletişim Formu */
	$("#iletisimform").submit(function(event){
		$.ajax("postala.php",{
			data:$(this).serialize(),
			success:function(data){$("#yukleniyor").hide();alert(data);},
			beforeSend:function(){$("#yukleniyor").show();}
			
		});
		return false;
	});
});
