	
		</main>
	<footer >
		<div class="footer indigo darken-3">
            <div class="container">
                <div class="row marginbot0">
                    <div class="col-md-12">
                        <p class="copyright center-align small"> Todos los Derechos Reservados | Desarrollado por <a href="http://bitcodeweb.com/" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/img/logomini.png"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


	<?php wp_footer(); ?>
	
        <script>
             jQuery(document).ready(function(){
                jQuery(".button-collapse").sideNav({ menuWidth: 250 });
                jQuery(".dropdown-button").dropdown({constrain_width: false,belowOrigin: false, alignment: 'left', inDuration: 150, outDuration: 225, });
            });
        </script>
	</body>
</html>