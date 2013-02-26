<hr>
            <footer>
                <p>ODTÜ Amatör Fotoğrafçılık Topluluğu 1984-<?php echo date("Y");?></p>
				<?php $dosya = "duyuru.html"; // Son güncelleme tarihine bakılacak dosya ?>
				<?php if(file_exists($dosya)) { // Dosyanın olup olmadığının kontrolü?>
                <p>Son Güncelleme: <?php echo date("F d Y H:i:s.", filemtime($dosya)); // Dosyanın son düzenleme tarihini yazdır ?></p>
                <?php } // Son güncelleme tarihi yazdırma alanı sonu?>
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


        <script>
            var _gaq=[['_setAccount','UA-38796166-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
