<?php get_header();
if(isset($_POST['btn'])){
	$my_post = array(
	    'post_title'    =>  $_POST['titulo'],
	    'post_content'  => 'This is my post.',
	    'post_status'   => 'publish',
	    'post_author'   => get_current_user_id()
	);
	wp_insert_post( $my_post );
} ?>
	<div class="container-fluid">
		<div class="card-panel hoverable">
			<?php
			 	$args=array('post_status' => 'publish', 'post_type'=> 'post',  'order' => 'ASC', 'posts_per_page' => -1 );
			 	$my_query = new WP_Query($args);
			    if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : 
						$my_query->the_post();
						$id = get_the_ID();
				        $fecha=get_the_date('d/m/Y');
				        $titulo=get_the_title();
				        echo "<h3>".$titulo."</h3>";
				        echo "<h4>".$fecha."</h4>";
				        echo "<h4>".$id."</h4>";
						
				    endwhile;
				}
			?>
		</div>
	</div>
	<div class="container">
		<div class="card-panel  hoverable">
			<form name="importa" method="post" >
		        <div class="input-field">
          			<i class="material-icons prefix">title</i>
		            <input id="titulo" name="titulo" type="text" class="validate">
		            <label for="titulo">Título</label>
		        </div>
		        <div class="input-field">
          			<i class="material-icons prefix">content_paste</i>
		            <input id="contenido" name="contenido" type="text" class="validate">
		            <label for="contenido">Contenido</label>
		        </div>
		        <div class="input-field">
		        	<i class="material-icons prefix">date_range</i>
		        	<input type="date" id="date" class="datepicker">
		            <label for="date">Fecha</label>
		        </div>
		        <a class="modal-trigger btn waves-effect waves-light green accent-4" href="#modal1">
		        	Registrar
				    <i class="material-icons left">add_shopping_cart</i>
				</a>
				<div id="modal1" class="modal modal-fixed-footer">
					<div class="modal-content">
						<h4>Modal Header</h4>
						<p>A bunch of text</p>
					</div>
					<div class="modal-footer">
						<button class="modal-action modal-close btn waves-effect waves-light green accent-4" type="submit" id="btn" name="btn">
							Registrar
							<i class="material-icons left">check</i>
						</button>
						<button class="modal-action modal-close btn waves-effect waves-light red accent-4" type="button">
							<i class="material-icons left">clear</i>
							Cancelar
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="container-fluid">
		<div class="card-panel  hoverable">
			<br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br>
		</div>
	</div>
	<div class="container">
		<div class="card-panel  hoverable">
			<br><br><br><br><br><br><br><br><br>
		</div>
	</div>
	<div class="container-fluid">
		<div class="card-panel  hoverable">
			<br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br>
		</div>
	</div>
	<div class="container">
		<div class="card-panel  hoverable">
			<br><br><br><br><br><br><br><br><br>
		</div>
	</div>
	<div class="container">
		<div class="card-panel  hoverable">
			<br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br>
		</div>
	</div>
	<div class="container">
		<div class="card-panel  hoverable">
			<br><br><br><br><br><br><br><br><br>
		</div>
	</div>
<?php get_footer(); ?>