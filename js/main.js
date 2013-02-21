(function ($, F) {
    F.transitions.resizeIn = function() {
        var previous = F.previous,
            current  = F.current,
            startPos = previous.wrap.stop(true).position(),
            endPos   = $.extend({opacity : 1}, current.pos);

        startPos.width  = previous.wrap.width();
        startPos.height = previous.wrap.height();

        previous.wrap.stop(true).trigger('onReset').remove();

        delete endPos.position;

        current.inner.hide();

        current.wrap.css(startPos).animate(endPos, {
            duration : current.nextSpeed,
            easing   : current.nextEasing,
            step     : F.transitions.step,
            complete : function() {
                F._afterZoomIn();

                current.inner.fadeIn("fast");
            }
        });
    };

}(jQuery, jQuery.fancybox));

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
									$("#galerikutu a.zoom").fancybox(
										{
									        nextMethod : 'resizeIn',
									        nextSpeed  : 100,
											padding:20,
											cyclic:true,
											overlayOpacity:0.4,
											helpers : {
												title: {
													type: 'outside'
												}
											}
										});
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
