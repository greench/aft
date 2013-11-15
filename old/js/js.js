Modernizr.load([
	{
		test : Modernizr.rgba,
		nope : ['css/rgba.css']
	},
	{
		test : Modernizr.backgroundsize,
		nope : ['css/backgroundsize.css']
	},
	{
		test : Modernizr.inputtypes.range,
		nope : ['css/norange.css']
	},
	{
		test : Modernizr.borderradius,
		nope : ['css/borderradius.css']
	}
]);

	$(document).ready(function(){
		$("#yukleniyor").hide();
			jQuery.ajax('yazilar.php',{
				success:function(data, textStatus, jqXHR){
					$("#yazikutu").html(data);
					$('.yaziklasor a.zoom').bind({
						click: function(e){		
							$(".yaziklasor a.zoom").fancybox({type:"iframe"});
							return false;
						}
					});
				}
		});
		/* Tarayıcı boyutuna göre her pencereyi tekrar boyutlandır */
		function slayt_boyutlandir(){
			$(".slayt").css({"width":$(window).width()});
			$(".genislik").css({"margin":"0 auto","height":$(window).height()-140});
			$("body").css({"width":$(window).width()*6+500});
		}
		/* Kaçıncı slaytta olduğunu bul ve menüde bunu belirt */
		function hangi_slayt(){
		var kacinci_slaytta=1+Math.round(window.pageXOffset?window.pageXOffset:document.documentElement.scrollLeft/$(window).width());
		jQuery("#solkenar li").css({"box-shadow":"none"})
		$('#solkenar li:nth-child('+kacinci_slaytta+')').css({"box-shadow":"0 0 3px #999"});
		}
		slayt_boyutlandir();
		hangi_slayt();
		$(window).resize(slayt_boyutlandir);
		$(window).scroll(hangi_slayt);
		/* Büyüteç değiştiği zaman */
		$('#buyutec').change(function(){
			$(".genislik").css({"font-size":$('#buyutec').val()/50+"em"})
			$("#buyutec_deger").html($('#buyutec').val()+"mm");
		});
		
		/* Denklaşöre basıldığı zaman */
		$('#denklansor').click(function() {
				$("#perdeSesi").get(0).play();
				$('.genislik').hide();
				$('.genislik').fadeIn('slow', function() {
			});
		});
		/* Galeri */
		galeriisim='';
		$('#galeriisimler a').click(function(e){
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

		/* Menüler */
		$('#aft').click(function(){
			$('body').scrollTo( $('#slayt1'), 200 );
		});
		$('#afet').click(function(){
			$('body').scrollTo( $('#slayt2'), 200 );
		});
		$('#afiyet').click(function(){
			$('body').scrollTo( $('#slayt3'), 200 );
		});
		$('#iletisim').click(function(){
			$('body').scrollTo( $('#slayt4'), 200 );
		});
		$('#duyurular').click(function(){
			$('body').scrollTo( $('#slayt5'), 200 );
		});
		$('#galeri').click(function(){
			$('body').scrollTo( $('#slayt6'), 200 );
		});
		$('#solkenar li').click(function(){
			$('#solkenar li').each(function(index,element){jQuery(element).css({"box-shadow":"none"})})
			$(this).css({"box-shadow":"0 0 3px #999"})
		});
		
		/* Internet Explorer 8 için kodlar*/
		if($.browser.msie==true && $.browser.version<9){
			$("#solkenar li").css({"background-color":"#333 !important"});
		}
		/* Placeholder desteklemeyen tarayıcılar için varsayılan form değerleri (FF3.6 ve IE 8-9-10 için) */
		if($('#isim').attr("placeholder")==undefined){
		$('#isim').val('İsminiz').focus(function(){if($('#isim').val()=="İsminiz"){$('#isim').val("")}}).blur(function(){if($('#isim').val()==""){$('#isim').val("İsminiz")}});
		$('#eposta').val('E-postanız').focus(function(){if($('#eposta').val()=="E-postanız"){$('#eposta').val("")}}).blur(function(){if($('#eposta').val()==""){$('#eposta').val("E-postanız")}});
		}
	});