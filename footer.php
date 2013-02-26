<hr>
            <footer class="row">
            <div class="span6">
                <p>ODTÜ Amatör Fotoğrafçılık Topluluğu 1984-<?php echo date("Y");?></p>
				<?php $dosya = "duyuru.html"; // Son güncelleme tarihine bakılacak dosya ?>
				<?php if(file_exists($dosya)) { // Dosyanın olup olmadığının kontrolü?>
				</div>
			<div class="span6">
                <p class="text-right pull-right">Son Güncelleme: <?php echo date("F d Y H:i:s.", filemtime($dosya)); // Dosyanın son düzenleme tarihini yazdır ?></p>
                <?php } // Son güncelleme tarihi yazdırma alanı sonu?></div>
            </footer>

        </div> <!-- /container -->
		<!-- Yükleniyor yazısı -->
		<div id="yukleniyor"><div style="display:table-cell;vertical-align:middle">Biraz sabret</div></div>
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/jquery.fancybox.pack.js"></script>
        <script src="js/main.js"></script>


		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-38796166-1']);
		  _gaq.push(['_setDomainName', 'metu.edu.tr']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
    </body>
</html>
