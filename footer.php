	
	<?php if( $pagename=='Login' ){ ?>
		</main>
	<footer >
	<?php } ?>
		<div class="footer indigo darken-3">
            <div class="container">
                <div class="row marginbot0">
                    <div class="col-md-12">
                        <p class="copyright center-align small"> Todos los Derechos Reservados | Desarrollado por <a href="http://bitcodeweb.com/" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/img/logomini.png"></a></p>
                    </div>
                </div>
            </div>
        </div>
    <?php if( $pagename=='Login' ){ ?>
    </footer>
	<?php } ?>


	<?php wp_footer(); ?>
	
        <script>
             jQuery(document).ready(function(){
                jQuery(".button-collapse").sideNav();
                jQuery(".dropdown-button").dropdown({constrain_width: false,belowOrigin: false, alignment: 'left', inDuration: 150, outDuration: 225, });
				jQuery('.datepicker').pickadate({
					labelMonthNext: 'Siguiente mes',
					labelMonthPrev: 'Mes anterior',
					labelMonthSelect: 'Selecciona el mes',
					labelYearSelect: 'Selecciona el año',
					monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
					monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
					weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ],
					weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],
					weekdaysLetter: [ 'D', 'L', 'M', 'X', 'J', 'V', 'S' ],
					today: 'Hoy',
					clear: 'Borrar',
					close: 'Cerrar',
					format: 'dd/mm/yyyy'
				});
				jQuery('.modal-trigger').leanModal();
            });
        </script>
	</body>
</html>